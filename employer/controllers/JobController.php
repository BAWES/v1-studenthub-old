<?php

namespace employer\controllers;

use Yii;
use yii\helpers\Url;
use employer\models\Job;
use yii\data\ActiveDataProvider;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\AccessControl;
use yii\filters\VerbFilter;

/**
 * JobController implements the CRUD actions for Job model.
 */
class JobController extends Controller {

    public function behaviors() {
        return [
            'access' => [
                'class' => AccessControl::className(),
                'rules' => [
                    [
                        'allow' => true,
                        'actions' => ['success', 'payment-error', 'knet-response'],
                    ],
                    [
                        'allow' => true,
                        'roles' => ['@'], //only allow authenticated users to job actions
                    ],
                ],
            ],
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'delete' => ['post'],
                ],
            ],
        ];
    }

    /**
     * Lists all Job models.
     * @return mixed
     */
    public function actionIndex() {
        $dataProvider = new ActiveDataProvider([
            'query' => Job::find(),
        ]);

        return $this->render('index', [
                    'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single Job model.
     * @param integer $id
     * @return mixed
     */
    public function actionView($id) {
        return $this->render('view', [
                    'model' => $this->findModel($id),
        ]);
    }
    
    /**
     * Displays job details for employer via AJAX
     * @param integer $id
     * @return mixed
     */
    public function actionDetail($id) {
        return $this->renderPartial('_detail', [
                    'model' => $this->findModel($id),
        ]);
    }
    
    /**
     * Updates an existing Job model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     * @throws \yii\web\BadRequestHttpException
     */
    public function actionUpdate($id) {
        $model = $this->findModel($id);
        $model->scenario = "step1";
        
        //Check if editing is allowed, you can edit step 1 at any point as long as job not closed
        if($model->job_status == Job::STATUS_CLOSED){
            throw new \yii\web\BadRequestHttpException(Yii::t("employer", "You are not allowed to edit closed jobs"));
        }
        
        //Published jobs are limited to Step 1 - not allowed to move further and edit anything else
        $published = $model->job_status != Job::STATUS_DRAFT? true : false;

        if ($model->load(Yii::$app->request->post())) {
            //If draft, save without validation and redirect to dashboard
            if(Yii::$app->request->post('draft') && (Yii::$app->request->post('draft') == 'yes') && !$published){
                $model->save(false);
                return $this->redirect(['dashboard/index', '#' => 'tab_draftJobs']);
            }

            if ($model->save()) {
                if(!$published){
                    return $this->redirect(['create-step2', 'id' => $model->job_id]);
                }else{
                    //Set flash that it was saved then redirect to dashboard
                    Yii::$app->session->setFlash("warning", 
                        Yii::t('employer',
                                "Your job details have been updated and will go live as soon as they are verified."));
                    return $this->redirect(['dashboard/index', '#' => 'tab_pendingJobs']);
                }
            }
        }
        
        return $this->render('step1', [
            'model' => $model,
            'published' => $published,
        ]);
    }

    /**
     * Creates a new Job model. (First Step)
     * If everything is valid, save and move to next step
     * 
     * Should user save it as draft, it will save without validation and 
     * take him back to dashboard
     * @return mixed
     */
    public function actionCreate() {
        $model = new Job();
        $model->scenario = "step1";

        //Set default values
        $model->employer_id = Yii::$app->user->identity->employer_id;
        $model->job_status = Job::STATUS_DRAFT;
        $model->job_pay = Job::PAY_PAID;
        
        if ($model->load(Yii::$app->request->post())) {
            //If draft, save without validation and redirect to dashboard
            if(Yii::$app->request->post('draft') && (Yii::$app->request->post('draft') == 'yes')){
                $model->save(false);
                return $this->redirect(['dashboard/index', '#' => 'tab_draftJobs']);
            }

            //Save and go to second step
            if ($model->save()) {
                return $this->redirect(['create-step2', 'id' => $model->job_id]);
            }
        }

        return $this->render('step1', [
            'model' => $model,
            'published' => false,
        ]);
    }

    /**
     * Second Step of Job Creation
     * If everything is valid, save and move to next step
     * 
     * Should user save it as draft, it will save without validation and 
     * take him back to the dashboard
     * @param integer $id
     * @return mixed
     */
    public function actionCreateStep2($id) {
        $model = $this->findModel($id);
        $model->scenario = "step2";
        
        //Check if editing is allowed
        $this->checkJobEditAllowed($model);

        if ($model->load(Yii::$app->request->post())) {
            //If draft, save without validation and redirect to dashboard
            if(Yii::$app->request->post('draft') && (Yii::$app->request->post('draft') == 'yes')){
                $model->save(false);
                return $this->redirect(['dashboard/index', '#' => 'tab_draftJobs']);
            }

            //Save and go to third step
            if ($model->save()) {
                return $this->redirect(['create-step3', 'id' => $model->job_id]);
            }
        }

        return $this->render('step2', [
            'model' => $model,
        ]);
    }
    
    /**
     * Third Step of Job Creation - Selecting filters to add to your Job posting
     * If everything is valid, save and move to next step
     * 
     * Should user save it as draft, it will save without validation and 
     * take him back to the dashboard
     * @param integer $id
     * @return mixed
     */
    public function actionCreateStep3($id) {
        $model = $this->findModel($id);
        $model->scenario = "step3";
        
        //Check if editing is allowed
        $this->checkJobEditAllowed($model);
        
        
        //Load filter for this Job already if defined. Otherwise use new
        $filter = new \employer\models\Filter();
        if($model->filter){
            $filter = $model->filter;
        }
        $filter->numberOfApplicants = $model->job_max_applicants;
        
        //On Form Submit
        if ($filter->load(Yii::$app->request->post())) {
            $model->job_max_applicants = $filter->numberOfApplicants;
            
            //If draft, save without validation and redirect to dashboard
            if(Yii::$app->request->post('draft') && (Yii::$app->request->post('draft') == 'yes')){
                
                $filter->saveModelAndFilter($model);
                                
                return $this->redirect(['dashboard/index', '#' => 'tab_draftJobs']);
            }

            //Validate, Save, then go to fourth step
            if ($filter->validate()) {
                $filter->saveModelAndFilter($model);
                
                return $this->redirect(['create-step4', 'id' => $model->job_id]);
            }
        }

        return $this->render('step3', [
            'model' => $model,
            'filter' => $filter,
        ]);
    }
    
    /**
     * Fourth Step of Job Creation - Payment / Price Summary
     * If everything is valid, save and move to next step
     * 
     * @param integer $id
     * @return mixed
     */
    public function actionCreateStep4($id) {
        $model = $this->findModel($id);
        
        //Check if editing is allowed
        $this->checkJobEditAllowed($model);
        
        //Validate all the Job fields before proceeding
        //If there are validation issues, redirect back to first step
        if(!$model->validate()){
            return $this->redirect(['update', 'id' => $model->job_id]);
        }
        
        
        /*
         * Requested to make payment
         * Accept form input and process payment here
         * On success, thank you page (with link back to dashboard)
         * On Failure, send back to previous step with (setFlash error message)
         * Create transaction for successful payment + deduct from credit
         */
        if(Yii::$app->request->post()){
            $paymentOption = Yii::$app->request->post('paymentOption');
            
            /**
             * Process Payment for this Job
             */
            if($paymentOption == \common\models\PaymentType::TYPE_KNET){
                /**
                 * START KNET PAYMENT PROCESSING
                 */
                $pipe = $model->initiateKNETPayment();
                
                
                if($pipe instanceof \common\components\knet\e24PaymentPipe){
                    //Successfully initiated KNET payment
                    $payId = $pipe->getPaymentId();
                    $payUrl = $pipe->getPaymentPage();
                    
                    //Save transaction details into DB here
                    //echo $pipe->getDebugMsg();
                    
                    
                    //Redirect to KNET payment page
                    return $this->redirect("$payUrl?PaymentID=$payId");
                    
                }else{
                    //Error initiating transaction, output error as flash
                    Yii::$app->session->setFlash("error", $pipe);
                }
                
                /**
                 * END KNET PAYMENT PROCESSING
                 */
            }else if($model->processPayment(\common\models\PaymentType::TYPE_CREDIT)){
                //Redirect to thank you page
                return $this->redirect(['success']);
            }else{
                /**
                 * Error in processing payment
                 */
                Yii::$app->session->setFlash("error", 
                        Yii::t('employer',
                                "There was an issue processing your payment, please contact us if you require assistance"));
            }
        }
        
        
        return $this->render('step4', [
            'model' => $model,
        ]);
    }
    
    /**
     * Once KNET processes the users creditcard, it will send us the transaction result via a post request
     * Action that will accept the KNET response then determine if it was a success or failure
     */
    public function actionKnetResponse(){
        if(Yii::$app->request->isPost){
            $PaymentID = $_POST['paymentid'];
            $presult = $_POST['result'];
            $postdate = $_POST['postdate'];
            $tranid = $_POST['tranid'];
            $auth = $_POST['auth'];
            $ref = $_POST['ref'];
            $trackid = $_POST['trackid'];
            $udf1 = $_POST['udf1'];
            $udf2 = $_POST['udf2'];
            $udf3 = $_POST['udf3'];
            $udf4 = $_POST['udf4'];
            $udf5 = $_POST['udf5'];

            if($presult == "CAPTURED"){
                /**
                 * Transaction is approved by bank
                 * Store into db and give url to redirect to
                 */
                

                //process job from model, need to get jobid from udf2/3
                
                $redirectLink = Url::to(['job/success'], true);
            }else{
                /**
                 * Transaction not approved by bank
                 * Store updated status/details into db and give url to redirect to
                 */

                
                //Get Job ID from UDF2
                $redirectJobId = (int) str_replace("Job-", "", $udf2);
                $redirectLink = Url::to(['job/payment-error', 'id' => $redirectJobId], true);
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
        return $this->render('thanks');
    }
    
    /**
     * Error in Payment
     */
    /**
     * Error in payment for this job
     * @param int $id the job id linked to the payment error
     */
    public function actionPaymentError($id = null){
        
        Yii::$app->session->setFlash("error", 
                        Yii::t('employer',
                                "There was an issue processing your payment, please contact us if you require assistance"));
        
        /**
         * If there is no job id sent via get param, get the job id from UDF2 of the payment gateway
         */
        if(!$id && isset($_GET['UDF2'])){
            $udf2 = $_GET['UDF2'];
            $id = (int) str_replace("Job-", "", $udf2);
        }
        
        if($id){
            return $this->redirect(['create-step4', 'id' => $id]);
        }else throw new NotFoundHttpException('There was an issue processing your payment, please contact us if you require assistance".');
    }
    
    

    /**
     * Allows employer to delete his own drafts
     * If deletion is successful, the browser will be redirected to the 'index' draft page.
     * @param integer $id
     * @return mixed
     */
    public function actionDelete($id) {
        //Check if its a draft & owned by this employer before deleting
        $model = $this->findModel($id);
        
        if($model->job_status == Job::STATUS_DRAFT){
            $model->delete();
        }else throw new \yii\web\BadRequestHttpException("You are only allowed to delete drafts");
        
        return $this->redirect(['dashboard/index', '#' => 'tab_draftJobs']);
    }

    
    /**
     * Checks if editing a job is allowed
     * @param Job $job
     */
    public function checkJobEditAllowed($job){
        if($job->job_status != Job::STATUS_DRAFT){
            throw new \yii\web\BadRequestHttpException(Yii::t("employer", "You are only allowed to edit drafts"));
        }
    }
    
    /**
     * Finds the Job model based on its primary key value.
     * Job must belong to this employer for it to be found
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Job the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id) {
        $condition = [
            'job_id' => (int) $id,
            'employer_id' => Yii::$app->user->identity->employer_id,
        ];
        
        if (($model = Job::findOne($condition)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }

}
