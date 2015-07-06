<?php

namespace backend\controllers;

use Yii;
use yii\filters\AccessControl;
use backend\models\Job;
use common\models\JobSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * JobController implements the CRUD actions for Job model.
 */
class JobController extends Controller
{
    public function behaviors()
    {
        return [
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'delete' => ['post'],
                ],
            ],
            'access' => [
                'class' => AccessControl::className(),
                'rules' => [
                    [//allow authenticated users only
                        'allow' => true,
                        'roles' => ['@'],
                    ],
                ],
            ],
        ];
    }

    /**
     * Lists all Job models.
     * @param string $jobStatus
     * @return mixed
     */
    public function actionIndex($jobStatus = "all")
    {
        $searchModel = new JobSearch();
        
        $filter = false;
        $title = "All Jobs";
        
        switch($jobStatus){
            case "draft":
                $filter = ['job_status' => Job::STATUS_DRAFT];
                $title = "Draft Jobs";
                break;
            case "pending":
                $filter = ['job_status' => Job::STATUS_PENDING];
                $title = "Pending Jobs - waiting for approval";
                break;
            case "open":
                $filter = ['job_status' => Job::STATUS_OPEN];
                $title = "Open Jobs";
                break;
            case "closed":
                $filter = ['job_status' => Job::STATUS_CLOSED];
                $title = "Closed Jobs";
                break;
        }
        
        
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams, $filter);

        return $this->render('index', [
            'title' => $title,
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single Job model.
     * @param integer $id
     * @return mixed
     */
    public function actionView($id)
    {
        return $this->render('view', [
            'model' => $this->findModel($id),
        ]);
    }
    
    /**
     * Force closes an Open job
     * @param integer $id
     * @return mixed
     */
    public function actionForceClose($id){
        $adminName = Yii::$app->user->identity->admin_name;
        $model = $this->findModel($id);
        
        if($model->job_status == Job::STATUS_OPEN){
            $model->close();
            
            $message = "[Job Force Close] ";
            $message .= "Job #".$model->job_id." force closed by $adminName";
            Yii::error($message, __METHOD__);
            
            Yii::$app->getSession()->setFlash('success', "<h2 style='margin:0;'>Job has been closed</h2>");
            
            /**
             * Email to Employer notifying that his job has been forcefully closed
             */
            if($model->employer->employer_language_pref == "en-US"){
                //Set language based on preference stored in DB
                Yii::$app->view->params['isArabic'] = false;

                //Send English Email
                Yii::$app->mailer->compose([
                        'html' => "employer/job-forceclosed-html",
                            ], [
                        'employer' => $model->employer,
                        'job' => $model,
                    ])
                    ->setFrom([\Yii::$app->params['supportEmail'] => \Yii::$app->name ])
                    ->setTo([$model->employer->employer_email])
                    ->setSubject("[StudentHub] Your job posting has been closed")
                    ->send();
            }else{
                //Set language based on preference stored in DB
                Yii::$app->view->params['isArabic'] = true;

                //Send Arabic Email
                Yii::$app->mailer->compose([
                        'html' => "employer/job-forceclosed-ar-html",
                            ], [
                        'employer' => $model->employer,
                        'job' => $model,
                    ])
                    ->setFrom([\Yii::$app->params['supportEmail'] => \Yii::$app->name ])
                    ->setTo([$model->employer->employer_email])
                    ->setSubject("[StudentHub] تم إغلاق فرصة عملك")
                    ->send();
            }
        }
        
        return $this->redirect(['view', 'id' => $model->job_id]);
    }
    
    /**
     * Edits an active jobs filter 
     * @param integer $id
     * @return mixed
     */
    public function actionEditJobFilter($id){
        $model = $this->findModel($id);
        
        /**
         * Editing of inactive jobs is not allowed
         */
        if($model->job_status == Job::STATUS_CLOSED || $model->job_status == Job::STATUS_DRAFT){
            throw new \yii\web\BadRequestHttpException("Not allowed to edit an inactive job");
        }
        
        /**
         * Load filter for this Job
         */
        $filter = \employer\models\Filter::findOne($model->filter_id);
        if(!$filter){
            throw new NotFoundHttpException('This job has no filter');
        }
        
        /**
         * On Form Submit
         */
        if ($filter->load(Yii::$app->request->post())) {
            $filter->numberOfApplicants = 100; //just to pass validation (not used)
            if ($filter->validate()) {
                /**
                 * Set job status to pending and broadcasted to false
                 * Job will need to be re-verified (which will drop it back into broadcast queue)
                 */
                $model->job_status = Job::STATUS_PENDING;
                $model->job_broadcasted = Job::BROADCASTED_NO;
                
                //Store previous price per applicant and warn us if the value changes
                $previousPricePerApplicant = $model->job_price_per_applicant;
                
                $filter->saveModelAndFilter($model);
                
                /**
                 * Check if price per applicant changed, and warn us on what happened
                 */
                $warningMsg = "";
                if($previousPricePerApplicant > $model->job_price_per_applicant){
                    //Price per applicant has decreased
                    Yii::$app->getSession()->setFlash('success', "<h2 style='margin:0;'>Filters updated. Please verify the job listing to broadcast.</h2>");
                    Yii::$app->getSession()->setFlash('error', "<h3 style='margin:0;'>Price per applicant decreased from <b>$previousPricePerApplicant KD</b> to <b>".number_format($model->job_price_per_applicant,3)
                                                                 ." KD</b>.<br/>This employer might require a refund.</h3>");
                    
                    $warningMsg = "Price per applicant decreased from $previousPricePerApplicant KD to ".number_format($model->job_price_per_applicant,3). " KD. This employer might require a refund.";
                }else if($previousPricePerApplicant < $model->job_price_per_applicant){
                    //Price per applicant has increased
                    Yii::$app->getSession()->setFlash('success', "<h2 style='margin:0;'>Filters updated. Please verify the job listing to broadcast.</h2>");
                    Yii::$app->getSession()->setFlash('error', "<h3 style='margin:0;'>Price per applicant increased from <b>$previousPricePerApplicant KD</b> to <b>".number_format($model->job_price_per_applicant,3)
                                                                 ." KD</b>.</h3>");
                    
                    $warningMsg = "Price per applicant increased from $previousPricePerApplicant KD to ".number_format($model->job_price_per_applicant,3). " KD";
                }else{
                    //Price did not change
                    Yii::$app->getSession()->setFlash('success', "<h2>Filters updated. Please verify the job listing to broadcast.</h2>");
                }
                
                
                /**
                 * Log changes
                 */
                Yii::warning("[Job #$id] Filter forcefully updated by ".Yii::$app->user->identity->admin_name.". Job needs to be verified. $warningMsg", __METHOD__);
                
                return $this->redirect(['view', 'id' => $id]);
            }else{
                Yii::error("Error Force-updating filter \n".print_r($filter->errors, true), __METHOD__);
            }
        }
        
        //Render The Filter Form
        return $this->render('editfilter', [
            'model' => $model,
            'filter' => $filter,
        ]);
    }
    
    /**
     * Displays the reach of a job
     * How many students will this job reach? (based on filters)
     * @param integer $id
     * @return mixed
     */
    public function actionDisplayReach($id)
    {
        $model = $this->findModel($id);
        
        /**
         * Editing of inactive jobs is not allowed
         */
        if($model->job_status == Job::STATUS_CLOSED || $model->job_status == Job::STATUS_DRAFT){
            throw new \yii\web\BadRequestHttpException("Not allowed to edit an inactive job");
        }
        
        return $this->render('reach', [
            'model' => $model,
        ]);
    }
    
    
    /**
     * Verifies a single Job model, sets status to Open.
     * @param integer $id
     * @return mixed
     */
    public function actionVerify($id){
        $model = $this->findModel($id);
        
        if(!$model->verify()){
            throw new NotFoundHttpException("Error during verification - contact Admin if job isn't already verified");
        }
        
        return $this->redirect(['view', 'id' => $id]);
    }


    /**
     * Finds the Job model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Job the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Job::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
}
