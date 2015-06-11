<?php

namespace employer\models;

use Yii;
use yii\helpers\Url;
use yii\db\Expression;

/**
 * This is the model class for table "job".
 * It extends from \common\models\Job but with custom functionality for Employer application module
 * 
 */
class Job extends \common\models\Job {
    
    /**
     * Scenarios for validation, we have a scenario for each step in the job creation process
     */
    public function scenarios() {
        $scenarios = parent::scenarios();
        $scenarios['step1'] = ['job_title', 'jobtype_id', 'job_pay', 'job_responsibilites', 'job_desired_skill',
            'job_other_qualifications', 'job_startdate', 'job_compensation'];
        $scenarios['step2'] = ['job_question_1','job_question_2'];
        $scenarios['step3'] = ['!job_max_applicants'];

        return $scenarios;
    }
    
    
    /**
     * @inheritdoc
     */
    public function beforeSave($insert) {
        if(parent::beforeSave($insert)){
            if(!$insert){
                //When an Active job is updated by employer, status must go back to pending
                if(($this->job_status != self::STATUS_DRAFT) && ($this->job_status != self::STATUS_CLOSED)){
                    $this->job_status = self::STATUS_PENDING;
                }
            }
            return true;
        }
    }
    
    /**
     * @inheritdoc
     */
    public function afterFind() {
        parent::afterFind();
        
        //Adjust format of the date for validation purposes (when editing)
        if($this->job_startdate){
            $startDate = new \DateTime($this->job_startdate);
            $this->job_startdate = $startDate->format("Y/m/d");
        }
    }
    
    /**
     * Initiate payment for this job using KNET
     * Returns instance of the pipe when intitiation is successful, otherwise returns error message
     * 
     * @return mixed
     */
    public function initiateKNETPayment(){
        $amountDue = $this->amountDue;
        
        $pipe = new \common\components\knet\e24PaymentPipe;
        $pipe->setAction(1);
        $pipe->setCurrency(414);
        $pipe->setAlias("bawes");
        $pipe->setResourcePath(Yii::$app->params['KNETResourcePath']);
        $pipe->setLanguage(Yii::$app->view->params['isArabic']?"ARA":"ENG");
        
        //Random ID to track this order
        $trackID = date('YmdHis') . rand(5, 15);
        $pipe->setTrackId($trackID);
        
        //Response and Error Urls
        $pipe->setResponseURL(Url::to(['job/knet-response'], true));
        $pipe->setErrorURL(Url::to(['job/payment-error', 'id' => $this->job_id], true));
        
        //Set User Defined Fields for Easier Searching
        $pipe->setUdf2("Job-".$this->job_id);
        $pipe->setUdf3("Employer-".$this->employer_id);
        $pipe->setUdf5("ptlf employer-".$this->employer_id."-job-".$this->job_id); //Details sent to Bank Report va UDF5
        
        //Payment Amount
        $pipe->setAmt($amountDue);
        
        //Initialize the payment with KNET
        if($pipe->performPaymentInitialization()!=$pipe->SUCCESS){
            //Log error and return error message
            $message = "Result=".$pipe->SUCCESS."\n\n";
            $message .= "Error=".$pipe->getErrorMsg()."\n\n";
            $message .= "Debug=".$pipe->getDebugMsg();
            Yii::error($message);
            
            return $pipe->getErrorMsg();
        }else{
            //Return the actual payment pipe for further processing
            return $pipe;
        }
    }
    
    /**
     * Process payment for this job
     * @param string $paymentType eg:\common\models\PaymentType::TYPE_CREDIT
     * @return boolean whether the payment processed successfully or not
     */
    public function processPayment($paymentType){
        $payment = new \common\models\Payment();
        $payment->employer_id = $this->employer_id;
        $payment->job_id = $this->job_id;
        $payment->payment_job_num_applicants = $this->job_max_applicants;
        $payment->payment_job_num_filters = $this->filter->premiumFilterCount;
        $payment->payment_job_initial_price_per_applicant = \common\models\Note::findOne(["note_name" => "pricePerApplicant"])->note_value;
        $payment->payment_job_filter_price_per_applicant = \common\models\Note::findOne(["note_name" => "pricePerPremiumFilter"])->note_value;
        $payment->payment_job_total_price_per_applicant = $payment->payment_job_initial_price_per_applicant + 
                                                            ($payment->payment_job_filter_price_per_applicant * $payment->payment_job_num_filters);
        
        /**
         * The amount that needs to be paid for this job (whether by credit or by gateway)
         */
        $listingCost = $payment->payment_job_total_price_per_applicant * $payment->payment_job_num_applicants;
        
        /*
         * If there is no amount due for this job, process it as a credit payment
         */
        if(!$this->amountDue){
            $payment->payment_type_id = \common\models\PaymentType::TYPE_CREDIT;
            $payment->payment_employer_credit_change = $listingCost * -1; //subtract credit
            
            if($payment->save()){
                return true;
            }else{
                Yii::error(print_r($payment->errors, true), __METHOD__);
            }
        }else{
            /**
             * Check if payment has been processed for payment gateway payment type
             * Make sure payment is for amount due only, and do credit change for partial
             */
            if($paymentType == \common\models\PaymentType::TYPE_KNET){
                
            }
            
            
            /**
             * Make sure to divide Amount due between credit_change and payment_total
             * To see how much of it was paid by credit, and how much was paid by gateway
             */
            
        }
        
        return false;
    }
    
    
    /**
     * Returns the amount due for payment from employer
     * @return real the amount due
     */
    public function getAmountDue(){
        $totalCredit = Yii::$app->user->identity->employer_credit;
        $amountDue = $this->listingCost - $totalCredit;
        if ($amountDue < 0){
            $amountDue = 0;
        }
        
        return $amountDue;
    }
    
    /**
     * Returns the current listing cost based on current price per applicant + filter price
     * @return real the current cost
     */
    public function getListingCost(){
        $listingCost = $this->costPerApplicant * $this->job_max_applicants;
        return $listingCost; 
    }
    
    /**
     * Returns the current cost per applicant (with filters selected)
     * @return real the current cost per applicant
     */
    public function getCostPerApplicant(){
        $pricePerApplicant = \common\models\Note::findOne(["note_name" => "pricePerApplicant"])->note_value;
        $pricePerPremiumFilter = \common\models\Note::findOne(["note_name" => "pricePerPremiumFilter"])->note_value;
        $costPerApplicant = $pricePerApplicant + ($pricePerPremiumFilter *  $this->filter->premiumFilterCount);
        return $costPerApplicant; 
    }
    
    /**
     * @return \yii\db\ActiveQuery
     */
    public function getFilter()
    {
        return $this->hasOne(\employer\models\Filter::className(), ['filter_id' => 'filter_id']);
    }
    

}
