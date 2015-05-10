<?php

namespace employer\controllers;

use Yii;
use yii\filters\AccessControl;
use yii\web\NotFoundHttpException;

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
        //Maybe replace this controller with Job Controller
        return $this->render('index');
    }

    

}
