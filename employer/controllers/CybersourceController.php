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
                    
                    //Process payment based on result here
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
     * Function to initiate payment
     * if no job provided, it is for credit
     * @param double $amount
     * @param int $jobId
     */
    public function actionPay($amount = 0, $jobId = false){
        $employer = Yii::$app->user->identity;
        
        $amount = 100.000;
        $jobId = false;
        
        $payment = new CybersourcePayment();
        $payment->initiatePayment($employer, $amount, $jobId);
        
        return $this->render('pay',[
            'payment' => $payment,
        ]);
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
     * @param integer $id the payment invoice id
     * @param integer $payId KNET Payment ID
     */
    public function actionJobPaymentError($id, $payId){
        $message = "";
        
        $knetPayment = KnetPayment::findOne($payId);
        if($knetPayment){
            $message = "<br/>KNET "
                    . "Track ID #".$knetPayment->payment_trackid."<br/>"
                    . "Reference ID #".$knetPayment->payment_ref."<br/>"
                    . "Result: ".$knetPayment->payment_result;
        } 
        
        Yii::$app->session->setFlash("error", 
                    Yii::t('employer',
                            "There was an issue processing your payment, please contact us if you require assistance").$message);

        return $this->redirect(['job/create-step4', 'id' => $id]);
    }
    
    
    /**
     * Error in knet payment for buying credit
     * Set flash error and redirect back to credit purchase page
     * @param integer $payId KNET Payment ID
     */
    public function actionCreditPaymentError($payId){
        $message = "";
        
        $knetPayment = KnetPayment::findOne($payId);
        if($knetPayment){
            $message = "<br/>KNET "
                    . "Track ID #".$knetPayment->payment_trackid."<br/>"
                    . "Reference ID #".$knetPayment->payment_ref."<br/>"
                    . "Result: ".$knetPayment->payment_result;
        } 
        
        Yii::$app->session->setFlash("error", 
                    Yii::t('employer',
                            "There was an issue processing your payment, please contact us if you require assistance").$message);

        return $this->redirect(['credit/index']);
    }

    

}