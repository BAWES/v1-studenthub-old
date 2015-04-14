<?php

namespace frontend\controllers;

use yii\filters\AccessControl;
use yii\filters\VerbFilter;


class RegisterController extends \yii\web\Controller
{
    /**
     * @inheritdoc
     */
    public function behaviors()
    {
        return [
            'access' => [
                'class' => AccessControl::className(),
                'rules' => [
                    [
                        'allow' => true,
                        'roles' => ['?'], //only allow unauthenticated users to register
                    ],
                ],
            ],
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'logout' => ['post'],
                ],
            ],
        ];
    }

    /**
     * @inheritdoc
     */
    public function actions()
    {
        return [
            'error' => [
                'class' => 'yii\web\ErrorAction',
            ],
        ];
    }
    
    //returns the profile form
    public function actionForm(){
        
        return $this->renderAjax('_form');
    }
    
    
    public function actionIndex()
    {
        return $this->render('index');
    }
    
    
    //Renders the previous form backup for testing
    public function actionBackup()
    {
        return $this->render('backup');
    }

}