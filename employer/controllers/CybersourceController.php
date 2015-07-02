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
            //Get all request params sent to us from Cybersource
            foreach($_REQUEST as $name => $value) {
                $params[$name] = $value;
                echo "<span>" . $name . "</span><input type=\"text\" name=\"" . $name . "\" size=\"50\" value=\"" . $value . "\" readonly=\"true\"/><br/>";
            }

            //Check if tampered by verifying signature
            if(CybersourcePayment::checkParamsValid($params)){
                //Signature is valid, proceed with processing if payment/etc is correct
                /*$payment = CybersourcePayment::findOne(['payment_track_uuid' => Yii::$app->request->post('signature')]);
                if($payment){
                    echo "Transaction source by ".$payment->employer->employer_company_name;
                    //Update transaction details here, and see if payment made or not
                    
                }else{
                    Yii::error("Received valid signed response from Cybersource - no match found in payment database", __METHOD__);
                    throw new NotFoundHttpException('There was an issue processing your payment, please contact us if you require assistance.');
                }*/
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