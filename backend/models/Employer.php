<?php

namespace backend\models;

use Yii;

/**
 * This is the model class for table "employer".
 * It extends from \common\models\Employer but with custom functionality for Backend application module
 * 
 */
class Employer extends \common\models\Employer {

    /**
     * Allows Admin to give employer a refund
     * @param real $amount the amount to refund
     * @param string $reason the reason for refund
     * @return \common\models\Payment
     */
    public function giveRefund($amount, $reason) {
        $adminName = Yii::$app->user->identity->admin_name;
        
        $payment = new \common\models\Payment();
        $payment->scenario = "giveaway"; //To validate that change can be no less than 1
        $payment->employer_id = $this->employer_id;
        $payment->payment_type_id = \common\models\PaymentType::TYPE_CREDIT_REFUND;
        $payment->payment_note = "Refund from $adminName - Reason: $reason";
        $payment->payment_employer_credit_change = $amount;
        
        //Validate before saving to make sure the credit-change is not zero or negative
        if($payment->save()){
            $message = "[Refund] ".Yii::$app->formatter->asCurrency($payment->payment_employer_credit_change)." to Employer #".$payment->employer_id;
            $message .= " from $adminName";
            $message .= " - their new credit amount is ".Yii::$app->formatter->asCurrency($payment->payment_employer_credit_after);
            Yii::warning($message, __METHOD__);
        }else{
            Yii::error(print_r($payment->errors, true), __METHOD__);
        }        
        
        return $payment;
    }
    
    /**
     * Allows admin to give employer a gift
     * @param real $amount the amount to refund
     * @return \common\models\Payment
     */
    public function giveGift($amount) {
        $adminName = Yii::$app->user->identity->admin_name;
        
        $payment = new \common\models\Payment();
        $payment->scenario = "giveaway"; //To validate that change can be no less than 1
        $payment->employer_id = $this->employer_id;
        $payment->payment_type_id = \common\models\PaymentType::TYPE_CREDIT_GIVEAWAY;
        $payment->payment_note = "Gift from $adminName";
        $payment->payment_employer_credit_change = $amount;
        
        //Validate before saving to make sure the credit-change is not zero or negative
        if($payment->save()){
            $message = "[Gift] ".Yii::$app->formatter->asCurrency($payment->payment_employer_credit_change)." to Employer #".$payment->employer_id;
            $message .= " from $adminName";
            $message .= " - their new credit amount is ".Yii::$app->formatter->asCurrency($payment->payment_employer_credit_after);
            Yii::warning($message, __METHOD__);
        }else{
            Yii::error(print_r($payment->errors, true), __METHOD__);
        }        
        
        return $payment;
    }

}