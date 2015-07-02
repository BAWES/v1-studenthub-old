<?php

namespace employer\controllers;

use Yii;
use yii\filters\AccessControl;
use yii\data\ArrayDataProvider;
use yii\helpers\Url;
use common\models\KnetPayment;

class CreditController extends \yii\web\Controller {

    /**
     * @inheritdoc
     */
    public function behaviors() {
        return [
            'access' => [
                'class' => AccessControl::className(),
                'rules' => [
                    [
                        'allow' => true,
                        'roles' => ['@'], //only allow authenticated users to actions
                    ],
                ],
            ],
        ];
    }

    /**
     * @inheritdoc
     */
    public function actions() {
        return [
            'error' => [
                'class' => 'yii\web\ErrorAction',
            ],
        ];
    }
    
    /**
     * Renders Employer Dashboard containing all jobs posted + link to create a new job
     */
    public function actionIndex() {
        
        if(Yii::$app->request->post("creditPurchase")){
            $creditPurchaseAmount = (int) Yii::$app->request->post("creditPurchase");
            $paymentMethod = (int) Yii::$app->request->post("paymentOption");
            $termsAgreed = Yii::$app->request->post("terms", 0);
            
            
            if(!$termsAgreed){
                Yii::$app->session->setFlash('error', Yii::t("frontend", "Please agree to the terms and conditions"));
            }else if($creditPurchaseAmount >= 10){
                /**
                 * Process credit purchase
                 */
                if($paymentMethod == \common\models\PaymentType::TYPE_KNET){
                    /**
                     * Purchase Credit Using KNET
                     */
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
                    $pipe->setResponseURL(Url::to(['knet/payment-response'], 'https'));
                    $pipe->setErrorURL(Url::to(['knet/payment-error'], 'https'));

                    //Set User Defined Fields for Easier Searching
                    $pipe->setUdf3("Employer-".Yii::$app->user->identity->employer_id);
                    //Details sent to Bank Report va UDF5
                    $pipe->setUdf5("ptlf employer-".Yii::$app->user->identity->employer_id);

                    //Payment Amount
                    $pipe->setAmt($creditPurchaseAmount);

                    //Initialize the payment with KNET
                    if($pipe->performPaymentInitialization()!=$pipe->SUCCESS){
                        //Log error and return error message
                        $message = "Result=".$pipe->SUCCESS."\n\n";
                        $message .= "Error=".$pipe->getErrorMsg()."\n\n";
                        $message .= "Debug=".$pipe->getDebugMsg();
                        Yii::error($message);

                        Yii::$app->session->setFlash("error", $pipe->getErrorMsg());
                    }else{
                        /**
                         * Successfully initiated KNET payment
                         */
                        $payId = $pipe->getPaymentId();
                        $payUrl = $pipe->getPaymentPage();
                        //echo $pipe->getDebugMsg();


                        //Save initial transaction details into DB 
                        $payment = new KnetPayment();
                        $payment->payment_id = $payId;
                        $payment->employer_id = Yii::$app->user->identity->employer_id;
                        $payment->payment_trackid = $pipe->getTrackId();
                        $payment->payment_result = "ATTEMPT";
                        $payment->payment_amount = $pipe->getAmt();
                        $payment->save();



                        //Redirect to KNET payment page
                        return $this->redirect("$payUrl?PaymentID=$payId");
                    }
                    
                    
                }else{
                    Yii::$app->session->setFlash('error', Yii::t("frontend", "Invalid payment method"));
                }
                
                
            }
        }
        
        return $this->render('index');
    }

    

}
