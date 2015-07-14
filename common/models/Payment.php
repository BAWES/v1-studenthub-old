<?php

namespace common\models;

use Yii;
use yii\behaviors\TimestampBehavior;
use yii\db\Expression;

/**
 * This is the model class for table "payment".
 *
 * @property integer $payment_id
 * @property integer $payment_type_id
 * @property integer $employer_id
 * @property integer $job_id
 * @property integer $payment_job_num_applicants
 * @property integer $payment_job_num_filters
 * @property string $payment_job_initial_price_per_applicant
 * @property string $payment_job_filter_price_per_applicant
 * @property string $payment_job_total_price_per_applicant
 * @property string $payment_total
 * @property string $payment_note
 * @property string $payment_employer_credit_before
 * @property string $payment_employer_credit_change
 * @property string $payment_employer_credit_after
 * @property string $payment_datetime
 *
 * @property Employer $employer
 * @property PaymentType $paymentType
 * @property Job $job
 */
class Payment extends \yii\db\ActiveRecord {

    /**
     * @inheritdoc
     */
    public static function tableName() {
        return 'payment';
    }

    /**
     * @inheritdoc
     */
    public function rules() {
        return [
            [['payment_type_id', 'employer_id'], 'required'],
            
            [['payment_type_id', 'employer_id', 'job_id', 'payment_job_num_applicants', 'payment_job_num_filters'], 'integer'],
            [['payment_job_initial_price_per_applicant', 'payment_job_filter_price_per_applicant', 'payment_job_total_price_per_applicant', 'payment_total', 'payment_employer_credit_before', 'payment_employer_credit_change', 'payment_employer_credit_after'], 'number'],
            
            //Default values
            ['payment_employer_credit_change', 'default', 'value' => 0],
            
            //Minimum value to Gift
            ['payment_employer_credit_change', 'number', 'min' => 1, 'on' => 'giveaway'],
            [['payment_note', 'payment_employer_credit_change'], 'required', 'on' => 'giveaway'],
            
            //Validate credit change
            //If this payment will deduct credit, make sure that this employer has enough credit to deduct from
            ['payment_employer_credit_change', 'validateCredit'],
        ];
    }

    /**
     * Validate credit change to check that employer has credit when deducting
     * You are not allowed to create a credit deduction if you dont have enough credit
     * @param type $attribute
     * @param type $params
     */
    public function validateCredit($attribute, $params) {
        /**
         * If we are deducting credit from employer, validate that he has enough credit
         */
        if ($this->payment_employer_credit_change < 0) {
            $employer = $this->employer;
            if ($employer->employer_credit < $this->payment_employer_credit_change) {
                $this->addError($attribute, Yii::t('employer', 'Not enough credit to make the purchase'));
                Yii::error("[Employer #" . $this->employer_id . "] Attempted to make a purchase on credit but didn't have enough", __METHOD__);
            }
        }
    }

    public function behaviors() {
        return [
            [
                'class' => TimestampBehavior::className(),
                'createdAtAttribute' => 'payment_datetime',
                'updatedAtAttribute' => false,
                'value' => new Expression('NOW()'),
            ],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels() {
        return [
            'payment_id' => Yii::t('app', 'Payment ID'),
            'payment_type_id' => Yii::t('app', 'Payment Type ID'),
            'employer_id' => Yii::t('app', 'Employer ID'),
            'job_id' => Yii::t('app', 'Job ID'),
            'payment_job_num_applicants' => Yii::t('app', 'Job Num Applicants'),
            'payment_job_num_filters' => Yii::t('app', 'Job Num Filters'),
            'payment_job_initial_price_per_applicant' => Yii::t('app', 'Job Initial Price Per Applicant'),
            'payment_job_filter_price_per_applicant' => Yii::t('app', 'Job Filter Price Per Applicant'),
            'payment_job_total_price_per_applicant' => Yii::t('app', 'Job Total Price Per Applicant'),
            'payment_total' => Yii::t('app', 'Payment Total'),
            'payment_note' => Yii::t('app', 'Note'),
            'payment_employer_credit_before' => Yii::t('app', 'Credit Before'),
            'payment_employer_credit_change' => Yii::t('app', 'Credit Change'),
            'payment_employer_credit_after' => Yii::t('app', 'Credit After'),
            'payment_datetime' => Yii::t('app', 'Payment Datetime'),
        ];
    }

    public function beforeSave($insert) {
        if (parent::beforeSave($insert)) {
            if($insert){
                /**
                 * Save the employers credit values before and after the change
                 */
                $this->payment_employer_credit_before = $this->employer->employer_credit;
                $this->payment_employer_credit_after = $this->payment_employer_credit_before + $this->payment_employer_credit_change;
            }
            return true;
        } else {
            return false;
        }
    }

    public function afterSave($insert, $changedAttributes) {
        parent::afterSave($insert, $changedAttributes);

        if ($insert) {
            /**
             * If this is a payment for a job
             * Update Job created datetime - and set status to pending
             */
            if ($this->job) {
                $job = $this->job;
                $job->job_created_datetime = new \yii\db\Expression("NOW()");
                $job->job_status = Job::STATUS_PENDING;
                $job->save(false);
            }

            /**
             * If this payment has a credit-change, update this employers credit
             */
            if ($this->payment_employer_credit_change != 0) {
                $this->employer->updateCounters(['employer_credit' => $this->payment_employer_credit_change]);
            }
            
            /**
             * If there is a payment [either job exists or payment amount]
             * Log Message related to this payment
             */
            if($this->payment_total || $this->job_id){
                $paidAmount = $this->payment_total?Yii::$app->formatter->asCurrency($this->payment_total):"KWD 0";
                
                $message = "[Payment #".$this->payment_id."] ";
                $message .= "$paidAmount spent by ".$this->employer->employer_company_name;
                if($this->payment_employer_credit_change != 0){
                    $message .= " and their credit changed by ".Yii::$app->formatter->asCurrency($this->payment_employer_credit_change);
                }
                Yii::info($message, __METHOD__);
            }
            
            /**
             * Send the Invoice by Email
             */
            $this->emailInvoice();
        }
    }
    
    /**
     * Sends an invoice by email to the employer it belongs to
     * Different invoice based on whether its for a job or not
     * In the Employers current language preference
     */
    public function emailInvoice(){        
        $employer = $this->employer;
        
        /**
         * If Payment is for a job, show a different type of invoice
         */
        $invoiceType = "reg-invoice";
        if($this->job_id){
            $invoiceType = "job-invoice";
        }
        
        
        if($employer->employer_language_pref == "en-US"){
            //Set language based on preference stored in DB
            Yii::$app->view->params['isArabic'] = false;
            
            //Send English Email
            return Yii::$app->mailer->compose([
                    'html' => "employer/$invoiceType-html",
                        ], [
                    'employer' => $employer,
                    'payment' => static::findOne($this->payment_id),
                ])
                ->setFrom([\Yii::$app->params['supportEmail'] => \Yii::$app->name ])
                ->setTo([$employer->employer_email, \Yii::$app->params['supportEmail']])
                ->setSubject('[StudentHub] Invoice #'.$this->payment_id)
                ->send();
        }else{
            //Set language based on preference stored in DB
            Yii::$app->view->params['isArabic'] = true;
            
            //Send Arabic Email
            return Yii::$app->mailer->compose([
                    'html' => "employer/$invoiceType-ar-html",
                        ], [
                    'employer' => $employer,
                    'payment' => static::findOne($this->payment_id),
                ])
                ->setFrom([\Yii::$app->params['supportEmail'] => \Yii::$app->name ])
                ->setTo([$employer->employer_email, \Yii::$app->params['supportEmail']])
                ->setSubject('[StudentHub] فاتورة #'.Yii::$app->formatter->asInteger($this->payment_id))
                ->send();
        }
        
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getEmployer() {
        return $this->hasOne(Employer::className(), ['employer_id' => 'employer_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getPaymentType() {
        return $this->hasOne(PaymentType::className(), ['payment_type_id' => 'payment_type_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getJob() {
        return $this->hasOne(Job::className(), ['job_id' => 'job_id']);
    }
    
    
    /**
     * @param type $paymentType
     * @param type $sinceNumDays
     * @return real Sum of all payments made
     */
    public static function total($paymentType, $sinceNumDays = false) {
        $totalQuery = static::find()->where(['payment_type_id' => $paymentType]);
        
        if($sinceNumDays){
            $sinceNumDays = (int) $sinceNumDays;
            $expression = new Expression("DATE(payment_datetime) > DATE_SUB(CURDATE(), INTERVAL $sinceNumDays DAY)");
            
            $totalQuery->andWhere($expression);
        }
        
        switch($paymentType){
            case PaymentType::TYPE_KNET:
                return $totalQuery->sum("payment_total");
            case PaymentType::TYPE_CREDITCARD:
                return $totalQuery->sum("payment_total");
            case PaymentType::TYPE_CREDIT:
                return $totalQuery->sum("payment_employer_credit_change")*-1;
            case PaymentType::TYPE_CREDIT_GIVEAWAY:
                return $totalQuery->sum("payment_employer_credit_change");
            case PaymentType::TYPE_CREDIT_REFUND:
                return $totalQuery->sum("payment_employer_credit_change");
            
        }
        
        
    }

}
