<?php

namespace employer\controllers;

use Yii;
use yii\filters\AccessControl;
use yii\data\ArrayDataProvider;

class CreditController extends \yii\web\Controller {

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
                        'roles' => ['@'], //only allow authenticated users to actions
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
        
        
                
        return $this->render('index',[
        ]);
    }

    

}
