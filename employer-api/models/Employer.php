<?php

namespace employerapi\models;

use Yii;
use yii\db\Expression;

/**
 * This is the model class for table "employer".
 * It extends from \common\models\Employer but with custom functionality for Employer application module
 * 
 */
class Employer extends \common\models\Employer {
    
    /**
     * @inheritdoc
     */
    public function fields()
    {
        $fields = parent::fields();

        // remove fields that contain sensitive information
        unset($fields['employer_auth_key'],
        $fields['employer_password_hash'],
        $fields['employer_password_reset_token']);

        return $fields;
    }

    /**
     * Scenarios for validation and massive assignment
     */
    public function scenarios() {
        $scenarios = parent::scenarios();
        
        $scenarios['changePassword'] = ['employer_password_hash'];

        $scenarios['update'] = ['city_id', 'industry_id', 'company_name', 'website', 'company_desc', 'num_employees', 'contact_firstname', 'contact_lastname', 'contact_number', 'email_preference','email', 'language_pref', 'support_field', 'social_twitter', 'social_facebook', 'social_instagram', 'logo'];

        return $scenarios;
    }
    
    /**
     * Process a credit purchase that this employer made
     * @param int $paymentType
     * @param real $amountPaid
     * @param string $note
     * @return \common\models\Payment
     */
    public function processCreditPurchase($paymentType = \common\models\PaymentType::TYPE_KNET, $amountPaid = 0, $note = ""){
        $payment = new \common\models\Payment();
        $payment->employer_id = $this->employer_id;
        
        $payment->payment_type_id = $paymentType;
        $payment->payment_total = $amountPaid;
        $payment->payment_employer_credit_change = $amountPaid;
        $payment->payment_note = $note;
        
        if(!$payment->save()){
            Yii::error(print_r($payment->errors, true), __METHOD__);
        }        
        
        return $payment;
    }

    /**
     * Signs user up.
     * @param boolean $validate - whether to validate before Signing up
     * @return static|null the saved model or null if saving fails
     */
    public function signup($validate = false) {
        $this->setPassword($this->employer_password_hash);
        $this->generateAuthKey();
        
        //Set Language preference to current language
        $this->employer_language_pref = Yii::$app->language;
        
        if ($this->save($validate)) {
            $this->sendVerificationEmail();
            
            /**
             * Send email here to Admins notifying that a new employer has signed up
             */
            Yii::$app->mailer->compose([
                    'html' => "admin/new-employer-html",
                        ], [
                    'employer' => $this,
                ])
                ->setFrom([\Yii::$app->params['supportEmail'] => \Yii::$app->name ])
                ->setTo([\Yii::$app->params['supportEmail']])
                ->setSubject('[StudentHub] New Employer - '.$this->employer_company_name)
                ->send();
            
            //Log employer signup
            Yii::info("[New Employer Signup - ".$this->employer_company_name."] ".$this->employer_company_desc, __METHOD__);
            
            return $this;
        }

        return null;
    }

    
    /**
     * Sends an email requesting a user to verify his email address
     * @return boolean whether the email was sent
     */
    public function sendVerificationEmail() {

        //Update employer last email limit timestamp
        $this->employer_limit_email = new Expression('NOW()');
        $this->save(false);
            
        if($this->employer_new_email)
        {
            $email = $this->employer_new_email;
        }
        else
        {
            $email = $this->employer_email;
        }        

        if($this->employer_language_pref == "en-US"){
            //Set language based on preference stored in DB
            Yii::$app->view->params['isArabic'] = false;
            
            //Send English Email
            return Yii::$app->mailer->compose([
                'html' => 'employer-api/verificationEmail-html',
                'text' => 'employer-api/verificationEmail-text',
                    ], [
                'employer' => $this
            ])
            ->setFrom([\Yii::$app->params['supportEmail'] => \Yii::$app->name ])
            ->setTo($email)
            ->setSubject('[StudentHub] Email Verification')
            ->send();
        }else{

            //Set language based on preference stored in DB
            Yii::$app->view->params['isArabic'] = true;
            
            //Send Arabic Email
            return Yii::$app->mailer->compose([
                'html' => 'employer-api/verificationEmail-ar-html',
                'text' => 'employer-api/verificationEmail-ar-text',
                    ], [
                'employer' => $this
            ])
            ->setFrom([\Yii::$app->params['supportEmail'] => \Yii::$app->name ])
            ->setTo($email)
            ->setSubject('[StudentHub] التحقق من البريد الإلكتروني')
            ->send();
        }
    }
}
