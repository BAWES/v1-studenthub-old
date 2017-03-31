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
     * Removes a student application and qualification to a job
     * Refunds the application spot that was taken by that application
     * Re-opens the job if closed
     * @param integer $id
     * @return mixed
     */
    public function actionRemoveApplication($id){
        $jobApplication = \common\models\StudentJobApplication::find()->with('job')->where(['application_id'=>$id])->one();
        
        $job = $jobApplication->job;
        $jobId = $jobApplication->job_id;
        $studentId = $jobApplication->student_id;
        
        //Delete the application
        $jobApplication->delete();
        
        //Delete the qualification
        \common\models\StudentJobQualification::deleteAll([
            'student_id' => $studentId,
            'job_id' => $jobId,
        ]);
        
        
        //Update counter for number of applicants for that job -1
        $job->updateCounters(['job_current_num_applicants' => -1]);
        
        
        //Check if job closed, re-open
        if($job->job_status == Job::STATUS_CLOSED){
            $job->job_status = Job::STATUS_OPEN;
            $job->save(false);
        }
        
        
        return $this->redirect(['view', 'id' => $jobId]);
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
