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
     * Edits an active jobs filter and 
     * @param integer $id
     * @return mixed
     */
    public function actionEditJobFilter($id){
        $model = $this->findModel($id);
        
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
            if ($filter->validate()) {
                $filter->saveModelAndFilter($model);
                Yii::warning("[Job #$id] Filter forcefully updated by ".Yii::$app->user->identity->admin_id, __METHOD__);
                
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
        return $this->render('reach', [
            'model' => $this->findModel($id),
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
