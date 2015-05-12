<?php

namespace employer\controllers;

use Yii;
use yii\filters\AccessControl;
use yii\web\NotFoundHttpException;
use employer\models\Job;
use yii\data\ArrayDataProvider;

class DashboardController extends \yii\web\Controller {

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
                        'roles' => ['@'], //only allow unauthenticated users to job actions
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
        $jobs = Yii::$app->user->identity->jobs;
        
        $openJobs = $closedJobs = $pendingJobs = $draftJobs = [];
        
        foreach($jobs as $job){
            switch($job->job_status){
                case Job::STATUS_OPEN:
                    $openJobs[] = $job;
                    break;
                case Job::STATUS_CLOSED:
                    $closedJobs[] = $job;
                    break;
                case Job::STATUS_PENDING:
                    $pendingJobs[] = $job;
                    break;
                case Job::STATUS_DRAFT:
                    $draftJobs[] = $job;
                    break;
            }
        }
        
        $openJobsDataProvider = new ArrayDataProvider([
            'allModels' => $openJobs,
        ]);
        $closedJobsDataProvider = new ArrayDataProvider([
            'allModels' => $closedJobs,
        ]);
        $pendingJobsDataProvider = new ArrayDataProvider([
            'allModels' => $pendingJobs,
        ]);
        $draftJobsDataProvider = new ArrayDataProvider([
            'allModels' => $draftJobs,
        ]);
                
        return $this->render('index',[
            'openJobsDataProvider' => $openJobsDataProvider,
            'closedJobsDataProvider' => $closedJobsDataProvider,
            'pendingJobsDataProvider' => $pendingJobsDataProvider,
            'draftJobsDataProvider' => $draftJobsDataProvider,
        ]);
    }

    

}
