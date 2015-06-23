<?php

namespace employer\controllers;

use Yii;
use yii\helpers\Url;
use employer\models\Job;
use common\models\KnetPayment;
use yii\web\Controller;
use yii\web\NotFoundHttpException;

/**
 * KnetController includes actions for payment processing using KNET
 * There is no accesscontrol for this controller, it is available for the public to access
 */
class KnetController extends Controller {
    
    public $enableCsrfValidation = false;
    
    /**
     * Once KNET processes the users card, it will send us the transaction result via a post request
     * Action that will accept the KNET response then determine if it was a success or failure
     */
    public function actionPaymentResponse(){
        $paymentId = Yii::$app->request->post('paymentid');
        $result = Yii::$app->request->post('result');
        $postdate = Yii::$app->request->post('postdate');
        $tranid = Yii::$app->request->post('tranid');
        $auth = Yii::$app->request->post('auth');
        $ref = Yii::$app->request->post('ref');
        $trackid = Yii::$app->request->post('trackid');
        $udf1 = Yii::$app->request->post('udf1');
        $udf2 = Yii::$app->request->post('udf2');
        $udf3 = Yii::$app->request->post('udf3');
        $udf4 = Yii::$app->request->post('udf4');
        $udf5 = Yii::$app->request->post('udf5');
        
        /**
         * THROW EXCEPTION IF THIS PAYMENT ID DOESN'T EXIST IN OUR DB
         * OR IF ITS RECORD HAS DIFFERENT TRACK ID FROM OURS
         */
        $payment = KnetPayment::findOne(['payment_id' => $paymentId, 'payment_trackid' => $trackid]);
        if($payment){
            $payment->payment_result = $result;
            $payment->payment_postdate = $postdate;
            $payment->payment_tranid = $tranid;
            $payment->payment_auth = $auth;
            $payment->payment_ref = $ref;
            $payment->payment_udf1 = $udf1;
            $payment->payment_udf2 = $udf2;
            $payment->payment_udf3 = $udf3;
            $payment->payment_udf4 = $udf4;
            $payment->payment_udf5 = $udf5;
            $payment->save();
            
            /**
             * Check if transaction is approved by bank
             */
            if($result == "CAPTURED"){
                
                $redirectLink = Url::to(['knet/success'], true);
                
                $note = "KNET \n"
                    . "Track ID #".$payment->payment_trackid."\n"
                    . "Reference ID #".$payment->payment_ref."\n"
                    . "Result ".$payment->payment_result;
                
                /**
                 * IF PAYMENT IS FOR JOB, process the job
                 * If payment is for credit, process the credit
                 * He should always get an invoice for his purchase
                 */
                if($payment->job_id){
                    $payment->job->processPayment(\common\models\PaymentType::TYPE_KNET, $payment->payment_amount, $note);
                }else{
                    //Payment was made by this employer for credit
                    $payment->employer->processCreditPurchase(\common\models\PaymentType::TYPE_KNET, $payment->payment_amount, $note);
                    $redirectLink = Url::to(['knet/credit-payment-success'], true);
                }

                
            }else{
                /**
                 * Transaction not approved by bank
                 */
                $redirectLink = Url::to(['knet/payment-error'], true);

                /**
                 * If this payment is for a job, redirect to step 4 for them to re-attempt payment
                 * If this payment is for credit, redirect to credit purchase page
                 */
                if($payment->job_id){
                    $redirectLink = Url::to(['knet/job-payment-error', 'id' => $payment->job_id], true);
                }else $redirectLink = Url::to(['knet/credit-payment-error'], true);
            }

            //Tell KNET where to redirect the user to now
            echo "REDIRECT=".$redirectLink;
        }
    }
    
    /**
     * Successful Payment
     * Renders Thank you page after payment
     */
    public function actionSuccess(){
        return $this->redirect(['job/success']);
    }
    
    
    /**
     * Error in knet payment for this job
     * Set flash error and redirect back to job step 4 for them to attempt payment again
     * @param int $id
     */
    public function actionJobPaymentError($id){
        Yii::$app->session->setFlash("error", 
                    Yii::t('employer',
                            "There was an issue processing your payment, please contact us if you require assistance"));

        return $this->redirect(['job/create-step4', 'id' => $id]);
    }
    
    /**
     * Successful Payment for Credit
     * Renders Thank you page after payment
     */
    public function actionCreditPaymentSuccess(){
        Yii::$app->session->setFlash("success", 
                    Yii::t('employer',
                            "Thanks for purchasing credit! You may now use them for faster job posting"));
        
        return $this->redirect(['credit/index']);
    }
    
    /**
     * Error in knet payment for buying credit
     * Set flash error and redirect back to credit purchase page
     */
    public function actionCreditPaymentError(){
        Yii::$app->session->setFlash("error", 
                    Yii::t('employer',
                            "There was an issue processing your payment, please contact us if you require assistance"));

        return $this->redirect(['credit/index']);
    }
    
    /**
     * Generic Error in KNET payment
     * @throws NotFoundHttpException
     */
    public function actionPaymentError(){
        throw new NotFoundHttpException('There was an issue processing your payment, please contact us if you require assistance.');
    }

}
