<?php

namespace common\models;

use Yii;
use yii\behaviors\TimestampBehavior;
use yii\db\Expression;

/**
 * This is the model class for table "transaction".
 *
 * @property integer $transaction_id
 * @property integer $job_id
 * @property integer $transaction_number_of_applicants
 * @property string $transaction_price_per_applicant
 * @property string $transaction_price_total
 * @property string $transaction_datetime
 *
 * @property Job $job
 */
class Transaction extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'transaction';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['job_id', 'transaction_number_of_applicants', 'transaction_price_per_applicant', 'transaction_price_total'], 'required'],
            [['job_id', 'transaction_number_of_applicants'], 'integer'],
            [['transaction_price_per_applicant', 'transaction_price_total'], 'number'],
            
            //Validate that employer has enough credit
            ['job_id', 'validateCredit'],
        ];
    }
    
    /**
     * Validate Job to check that employer has credit before proceeding
     * You are not allowed to create a transaction without having credit
     * @param type $attribute
     * @param type $params
     */
    public function validateCredit($attribute, $params)
    {
        $employer = $this->job->employer;        
        if($employer->employer_credit < $this->transaction_price_total){
            $this->addError($attribute, Yii::t('employer', 'Not enough credit to make the purchase'));
        }
    }
    
    public function behaviors() {
        return [
            [
                'class' => TimestampBehavior::className(),
                'createdAtAttribute' => 'transaction_datetime',
                'updatedAtAttribute' => false,
                'value' => new Expression('NOW()'),
            ],
        ];
    }
    
    public function afterSave($insert, $changedAttributes) {
        parent::afterSave($insert, $changedAttributes);
        
        if($insert){
            //Update Job created datetime - and set status to pending
            $job = $this->job;
            $job->job_created_datetime = new \yii\db\Expression("NOW()");
            $job->job_status = Job::STATUS_PENDING;
            $job->save(false);
            
            //Deduct the transaction price total from its Employer's Credit
            $employer = $job->employer;
            $employer->updateCounters(['employer_credit' => $this->transaction_price_total * -1]); 
            
        }
        
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'transaction_id' => Yii::t('app', 'Transaction ID'),
            'job_id' => Yii::t('app', 'Job ID'),
            'transaction_number_of_applicants' => Yii::t('app', 'Number Of Applicants'),
            'transaction_price_per_applicant' => Yii::t('app', 'Price Per Applicant'),
            'transaction_price_total' => Yii::t('app', 'Price Total'),
            'transaction_datetime' => Yii::t('app', 'Transaction Datetime'),
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getJob()
    {
        return $this->hasOne(Job::className(), ['job_id' => 'job_id']);
    }
    
    /**
     * @return real Sum of all transactions made
     */
    public static function total(){
        return static::find()->sum("transaction_price_total");
    }
}
