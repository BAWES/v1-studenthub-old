<?php

namespace frontend\controllers;

use Yii;
use yii\helpers\ArrayHelper;
use yii\filters\AccessControl;
use yii\filters\VerbFilter;
use yii\web\NotFoundHttpException;
use common\models\Job;
use yii\data\ActiveDataProvider;

class JobController extends \yii\web\Controller {
    
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
                        'actions' => ['share'],
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
                    'apply' => ['post'],
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
     * Loads shareable page including job details
     * @param integer $id
     * @return mixed
     */
    public function actionShare($id){
        $this->layout = "shareable";
        
        $model = \common\models\Job::find()
                ->with(['jobtype', 'employer', 'employer.industry'])
                ->where(['job_id' => $id])
                ->andWhere(['!=', 'job_status', Job::STATUS_DRAFT])
                ->one();
                
        if (!$model) {
            throw new NotFoundHttpException('The requested job does not exist.');
        }
        
        return $this->render('share',[
            'model' => $model,
        ]);
    }
    
    
    /**
     * Handles student application for job
     */
    public function actionApply(){
        \Yii::$app->response->format = \yii\web\Response::FORMAT_JSON;
        $response = [
            'valid' => false,
            'message' => "Default Message",
        ];
        
        $studentApplication = new \frontend\models\StudentJobApplication();
        $studentApplication->student_id = Yii::$app->user->identity->student_id;
        $studentApplication->job_id = Yii::$app->request->post('job');
        $studentApplication->application_answer_1 = Yii::$app->request->post('answer1');
        $studentApplication->application_answer_2 = Yii::$app->request->post('answer2');
        
        if($studentApplication->save()){
            $response['valid'] = true;
            $response['message'] = Yii::t("frontend", "You have applied!");
        }else{
            $response['valid'] = false;
            $response['message'] = $studentApplication->errors;
        }
        
        return $response;
    }
    
    /**
     * Render a list of jobs the student qualifies for
     * Ordered by publish date (newest jobs on top)
     */
    public function actionIndex() {
        $filter = new \frontend\models\FilterForm;
        
        $query = Yii::$app->user->identity->getActiveQualifiedJobs()->orderBy("job_created_datetime DESC");
        $jobsQuery = clone $query;
        
        /**
         * Take Params from GET and filter the query if the filter validates
         */
        if ($filter->load(Yii::$app->request->queryParams)) {
            if($filter->validate()){
                /**
                 * Filter
                 */
                $query->andFilterWhere([
                    'jobtype_id' => $filter->jobtype,
                    'job_pay' => $filter->payment,
                ]);
                
                if($filter->industry){
                    $query->joinWith('employer')
                        ->andWhere(['employer.industry_id' => $filter->industry]);
                }
            }
        }
        
        $dataProvider = new ActiveDataProvider([
            'query' => $query,
        ]);
        
        
        /**
         * Get List of available industries within filtered
         */
        
        $jobs = $jobsQuery->asArray()->all();
        
        $availableIndustries = ArrayHelper::map($jobs, "employer.industry.industry_id", Yii::$app->view->params['isArabic']?"employer.industry.industry_name_ar":"employer.industry.industry_name_en");
        $availableJobTypes = ArrayHelper::map(\common\models\Jobtype::find()->all(), "jobtype_id", Yii::$app->view->params['isArabic'] ? "jobtype_name_ar" : "jobtype_name_en");
        $availablePaymentOptions = [
            Job::PAY_PAID => Yii::t("frontend", "Paid Jobs"),
            Job::PAY_NOT_PAID => Yii::t("frontend", "Unpaid Jobs"),
        ];
        
        
        /**
         * Get list of Jobs this student has already applied for
         * So user is not allowed to apply on already applied-for jobs
         */
        $jobsApplied = \common\models\StudentJobApplication::find()
                            ->select('job_id')
                            ->where(['student_id' => Yii::$app->user->identity->student_id])
                            ->asArray()
                            ->all();
        
                
        return $this->render('index',[
            'filter' => $filter,
            'dataProvider' => $dataProvider,
            'jobsApplied' => $jobsApplied,
            'availableIndustries' => $availableIndustries,
            'availableJobTypes' => $availableJobTypes,
            'availablePaymentOptions' => $availablePaymentOptions,
        ]);
    }
    
    /**
     * Displays share dialog for a job via AJAX
     * @param integer $id job id
     * @return mixed
     */
    public function actionShareDialog($id) {
        header("Access-Control-Allow-Origin: *");
        
        return $this->renderPartial('_sharedialog', [
            'model' => $this->findJob($id),
        ]);
    }
    
    /**
     * Displays job details for student via AJAX
     * @param integer $id
     * @return mixed
     */
    public function actionDetail($id) {
        /**
         * Get if student already applied
         */
        $jobAlreadyApplied = \common\models\StudentJobApplication::find()->select('job_id')
                            ->where([
                                'student_id' => Yii::$app->user->identity->student_id,
                                'job_id' => $id
                                ])
                            ->one();
        
        return $this->renderPartial('_detail', [
            'model' => $this->findJob($id),
            'jobAlreadyApplied' => $jobAlreadyApplied,
        ]);
    }
    
    /**
     * Displays job interview questions for student via AJAX
     * @param integer $id
     * @return mixed
     */
    public function actionQuestions($id) {
        return $this->renderPartial('_questions', [
            'model' => $this->findJob($id),
        ]);
    }

    /**
     * Finds the Job model based on its primary key value.
     * Student must qualify for this job or it wont be found
     * If the job is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Job the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findJob($id)
    {
        $model = \common\models\StudentJobQualification::find()->where([
                'job_id' => $id,
                'student_id' => Yii::$app->user->identity->student_id,
            ])->with('job')->one();
                
        if ($model) {
            return $model->job;
        } else {
            throw new NotFoundHttpException('The requested job does not exist.');
        }
    }
    

}
