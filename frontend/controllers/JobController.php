<?php

namespace frontend\controllers;

use Yii;
use yii\filters\AccessControl;
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
                        'roles' => ['@'], //only allow authenticated users to job actions
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
     * Render a list of jobs the student qualifies for
     * Ordered by publish date (newest jobs on top)
     */
    public function actionIndex() {
        $query = Yii::$app->user->identity->getActiveQualifiedJobs();
        
        //Allow searching and filtering on this dataprovider + possibly pagination?
        
        $dataProvider = new ActiveDataProvider([
            'query' => $query,
        ]);
                
        return $this->render('index',[
            'dataProvider' => $dataProvider,
        ]);
    }
    
    /**
     * Displays job details for employer via AJAX
     * @param integer $id
     * @return mixed
     */
    public function actionDetail($id) {
        return $this->renderPartial('_detail', [
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
            ])->one();
                
        if ($model) {
            return $model->job;
        } else {
            throw new NotFoundHttpException('The requested job does not exist.');
        }
    }
    

}
