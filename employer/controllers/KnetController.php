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
    public function actionJobPaymentResponse(){
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
            
            if($result == "CAPTURED"){
                /**
                 * Transaction is approved by bank
                 * Store into db and give url to redirect to
                 */


                /**
                 * IF PAYMENT IS FOR JOB, process the job, otherwise no need
                 */


                //process job from model, need to get jobid from udf2/3

                $redirectLink = Url::to(['knet/success'], true);
            }else{
                /**
                 * Transaction not approved by bank
                 * Store updated status/details into db and give url to redirect to
                 */



                /**
                 * If this payment is for a job, redirect to step 4 for them to re-attempt payment
                 */
                if($payment->job_id){
                    $redirectLink = Url::to(['knet/job-payment-error', 'id' => $payment->job_id], true);
                }
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
     * @throws NotFoundHttpException
     */
    public function actionJobPaymentError($id){
        Yii::$app->session->setFlash("error", 
                    Yii::t('employer',
                            "There was an issue processing your payment, please contact us if you require assistance"));

        return $this->redirect(['job/create-step4', 'id' => $id]);
    }
    
    /**
     * Generic Error in KNET payment
     * @throws NotFoundHttpException
     */
    public function actionError(){
        throw new NotFoundHttpException('There was an issue processing your payment, please contact us if you require assistance.');
    }

}
