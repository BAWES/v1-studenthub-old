<?php

namespace frontend\controllers;

use yii\filters\AccessControl;
use yii\filters\VerbFilter;
use common\models\University;
use yii\web\NotFoundHttpException;


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
        $university = $this->findUniversity($university);
        
        
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
    
    
    /**
     * Finds the University model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Major the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findUniversity($id)
    {
        if (($model = University::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
    

}