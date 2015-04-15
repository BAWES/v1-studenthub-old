<?php

namespace frontend\controllers;

use yii\filters\AccessControl;
use yii\filters\VerbFilter;
use common\models\University;


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
    
    /**
     * Renders University Selection (Step 1);
     */
    public function actionIndex()
    {
        return $this->render('index');
    }
    
    
    /**
     * Renders Registration form + ID upload if this university requires
     * @param int $university University ID 
     */
    public function actionRegister($university)
    {
        $university = (int) $university;
        $university = University::findOne($university);
        
        
        return $this->render('register',[
            'university' => $university,
        ]);
    }
    
    
    /**
     * Renders Profile Form via AJAX (Step 3)
     */
    public function actionForm(){
        
        return $this->renderAjax('_form');
    }
    

}