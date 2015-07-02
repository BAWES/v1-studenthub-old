<?php

namespace employer\controllers;

use Yii;
use yii\filters\AccessControl;
use common\models\CybersourcePayment;
use yii\web\NotFoundHttpException;

class CybersourceController extends \yii\web\Controller {
    
    public $enableCsrfValidation = false;

    /**
     * @inheritdoc
     */
    public function behaviors() {
        return [
            'access' => [
                'class' => AccessControl::className(),
                'only' => ['pay'], //only for pay action
                'rules' => [
                    [
                        'allow' => true,
                        'actions' => ['pay'], //only for pay action
                        'roles' => ['@'], //only allow authenticated users to actions
                    ],
                ],
            ],
        ];
    }
    
    /**
     * Action that will accept the Cybersource response then determine if it was a success or failure
     * and what to do next
     * @throws NotFoundHttpException
     */
    public function actionPaymentResponse(){
        if(Yii::$app->request->post('signature')){
            $params = [];
            //Get all request params sent to us from Cybersource - use to check validity of signature
            foreach($_REQUEST as $name => $value) {
                $params[$name] = $value;
            }

            //Check if tampered by verifying signature
            if(CybersourcePayment::checkParamsValid($params)){
                //Signature is valid, proceed with processing if payment/etc is correct
                $payment = CybersourcePayment::findOne(['payment_track_uuid' => Yii::$app->request->post('req_reference_number')]);
                if($payment){
                    //Customer Details
                    $payment->payment_first_name = Yii::$app->request->post('req_bill_to_forename');
                    $payment->payment_last_name = Yii::$app->request->post('req_bill_to_surname');
                    $payment->payment_email = Yii::$app->request->post('req_bill_to_email');
                    $payment->payment_phone = Yii::$app->request->post('req_bill_to_phone');
                    $payment->payment_country = Yii::$app->request->post('req_bill_to_address_country');
                    
                    //Card Details
                    $cardType = "";
                    switch(Yii::$app->request->post('req_card_type')){
                        case "001":
                            $cardType = "Visa";
                            break;
                        case "002":
                            $cardType = "Mastercard";
                            break;
                        case "005":
                            $cardType = "Diners";
                            break;
                    }
                    $payment->payment_card_type = $cardType;
                    $payment->payment_card_number = Yii::$app->request->post('req_card_number');
                    $payment->payment_card_expiry = Yii::$app->request->post('req_card_expiry_date');
                    
                    //Response Details
                    $payment->payment_message = Yii::$app->request->post('message');
                    $payment->payment_decision = Yii::$app->request->post('decision');
                    $payment->payment_reason_code = Yii::$app->request->post('reason_code');
                    $payment->payment_auth_code = Yii::$app->request->post('auth_code');
                    $payment->payment_signature = Yii::$app->request->post('signature');
                    $payment->save();
                    
                    /**
                     * Check if transaction is approved by payment gateway
                     */
                    if($payment->payment_decision == "ACCEPT"){

                        $note = $payment->payment_card_type." \n"
                           . $payment->payment_card_number."\n"
                           . "Track ID #".$payment->payment_track_uuid;

                        /**
                         * IF PAYMENT IS FOR JOB, process the job
                         * If payment is for credit, process the credit
                         * He should always get an invoice for his purchase
                         */
                        if($payment->job_id){
                           $model = $payment->job->processPayment(\common\models\PaymentType::TYPE_CREDITCARD, $payment->payment_amount, $note);
                           return $this->redirect(['cybersource/success', 'id' => $model->payment_id]);
                        }else{
                           //Payment was made by this employer for credit
                           $model = $payment->employer->processCreditPurchase(\common\models\PaymentType::TYPE_CREDITCARD, $payment->payment_amount, $note);
                           return $this->redirect(['cybersource/credit-payment-success', 'id' => $model->payment_id]);
                        }
                    }else{
                       /**
                        * Transaction not approved by gateway
                        * If this payment is for a job, redirect to step 4 for them to re-attempt payment
                        * If this payment is for credit, redirect to credit purchase page
                        */
                       if($payment->job_id){
                           return $this->redirect(['cybersource/job-payment-error', 'id' => $payment->job_id, 'payId' => $payment->payment_id]);
                       }else return $this->redirect(['cybersource/credit-payment-error', 'payId' => $payment->payment_id]);
                    }
                }else{
                    Yii::error("Received valid signed response from Cybersource - no match found in payment database", __METHOD__);
                    throw new NotFoundHttpException('There was an issue processing your payment, please contact us if you require assistance.');
                }
            }
        }else{
            throw new NotFoundHttpException('There was an issue processing your payment, please contact us if you require assistance.');
        }
    }
    
    
    /**
     * Successful Payment
     * Renders Thank you page after payment
     * @param integer $id the payment invoice id
     */
    public function actionSuccess($id){
        return $this->redirect(['job/success', 'id' => $id]);
    }
    
    
    /**
     * Successful Payment for Credit
     * Renders Thank you message after payment
     * and sends to the invoice page
     * @param int $id the payment ID
     */
    public function actionCreditPaymentSuccess($id){
        Yii::$app->session->setFlash("success", 
                    Yii::t('employer',
                            "Thanks for purchasing credit! You may now use them for faster job posting"));
        
        return $this->redirect(['payment/view', 'id' => $id]);
    }
    
    /**
     * Error in creditcard payment for this job
     * Set flash error and redirect back to job step 4 for them to attempt payment again
     * @param integer $id the job id
     * @param integer $payId Cybersource Payment ID
     */
    public function actionJobPaymentError($id, $payId){
        $message = "";
        
        $payment = CybersourcePayment::findOne($payId);
        if($payment){
            $message = "<br/>"
                    . "Payment Track ID #".$payment->payment_track_uuid."<br/>"
                    . "Result: ".$payment->payment_message;
        } 
        
        Yii::$app->session->setFlash("error", 
                    Yii::t('employer',
                            "There was an issue processing your payment, please contact us if you require assistance").$message);

        return $this->redirect(['job/create-step4', 'id' => $id]);
    }
    
    
    /**
     * Error in knet payment for buying credit
     * Set flash error and redirect back to credit purchase page
     * @param integer $payId Cybersource Payment ID
     */
    public function actionCreditPaymentError($payId){
        $message = "";
        
        $payment = CybersourcePayment::findOne($payId);
        if($payment){
            $message = "<br/>"
                    . "Payment Track ID #".$payment->payment_track_uuid."<br/>"
                    . "Result: ".$payment->payment_message;
        } 
        
        Yii::$app->session->setFlash("error", 
                    Yii::t('employer',
                            "There was an issue processing your payment, please contact us if you require assistance").$message);

        return $this->redirect(['credit/index']);
    }

    

}