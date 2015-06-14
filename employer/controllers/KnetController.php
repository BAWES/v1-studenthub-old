<?php

namespace employer\controllers;

use Yii;
use yii\helpers\Url;
use employer\models\Job;
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
    public function actionResponse(){
        $paymentId = Yii::$app->request->post('paymentid');
        $presult = Yii::$app->request->post('result');
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


        if($presult == "CAPTURED"){
            /**
             * Transaction is approved by bank
             * Store into db and give url to redirect to
             */


            //process job from model, need to get jobid from udf2/3

            $redirectLink = Url::to(['knet/success'], true);
        }else{
            /**
             * Transaction not approved by bank
             * Store updated status/details into db and give url to redirect to
             */


            //Get Job ID from UDF2
            $redirectJobId = (int) str_replace("Job-", "", $udf2);
            $redirectLink = Url::to(['knet/error', 'id' => $redirectJobId], true);
        }

        //Tell KNET where to redirect the user to now
        echo "REDIRECT=".$redirectLink;
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
     */
    public function actionError(){
        /**
         * If there is no job id sent via get param, get the job id from UDF2 of the payment gateway
         */
        if(isset($_POST['UDF2'])){
            $udf2 = $_POST['UDF2'];
            $id = (int) str_replace("Job-", "", $udf2);
            
            Yii::$app->session->setFlash("error", 
                        Yii::t('employer',
                                "There was an issue processing your payment, please contact us if you require assistance"));
            
            return $this->redirect(['create-step4', 'id' => $id]);
        }else throw new NotFoundHttpException('There was an issue processing your payment, please contact us if you require assistance.');
    }

}
