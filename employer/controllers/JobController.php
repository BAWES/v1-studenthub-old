<?php

namespace employer\controllers;

use Yii;
use yii\filters\AccessControl;
use yii\web\NotFoundHttpException;

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
     * First Step of Job Posting -> Select a Job Type
     */
    public function actionIndex() {
        return $this->render('index');
    }

    

}
