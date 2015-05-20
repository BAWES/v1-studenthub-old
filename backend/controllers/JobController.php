<?php

namespace backend\controllers;

use Yii;
use yii\filters\AccessControl;
use common\models\Job;
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
     * Updates an existing Job model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->job_id]);
        } else {
            return $this->render('update', [
                'model' => $model,
            ]);
        }
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
