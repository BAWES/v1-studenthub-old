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
