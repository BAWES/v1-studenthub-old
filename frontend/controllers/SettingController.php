<?php

namespace frontend\controllers;

use Yii;
use yii\filters\AccessControl;
use yii\web\NotFoundHttpException;

class SettingController extends \yii\web\Controller {
    
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
                        'roles' => ['@'], //only allow authenticated users to all actions
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
     * Change users notification preference via AJAX
     * @param integer $preference
     * @return mixed
     */
    public function actionChangeNotificationPreference(){
        $model = \frontend\models\Student::findOne(Yii::$app->user->identity->student_id);
                
        if ($model) {            
            $model->scenario = "changeEmailPreference";
            if ($model->load(Yii::$app->request->post()) && $model->save()) {
                /**
                 * Set Flash that new email preferences have been set
                 */
                Yii::$app->getSession()->setFlash('success', Yii::t('frontend', 'Your email notification preferences have been updated'));
            }
        }
        
        //return to previous page 
        return $this->redirect(Yii::$app->request->referrer);
    }
    
    
    /**
     * Allows user to change their password
     */
    public function actionChangePassword(){
        $model = \frontend\models\Student::findOne(Yii::$app->user->identity->student_id);
        
        if($model){
            $model->scenario = "changePassword";
            
            if ($model->load(Yii::$app->request->post())) {
                $model->setPassword($model->student_password_hash);
                if($model->save()){
                    Yii::$app->getSession()->setFlash('success', Yii::t('student', 'New password was saved.'));
                }
            }
        }
        
        return $this->render('changePassword', [
            'model' => $model,
        ]);
    }
    
    
    /**
     * Allows user to change their personal information
     */
    public function actionUpdatePersonalInfo(){
        $model = \frontend\models\Student::findOne(Yii::$app->user->identity->student_id);
        
        if($model){
            $model->scenario = "updatePersonalInfo";
            
            if ($model->load(Yii::$app->request->post()) && $model->save()) {
                Yii::$app->getSession()->setFlash('success', Yii::t('register', 'Updated your personal information'));
            }
        }
        
        return $this->render('updatePersonalInfo', [
            'model' => $model,
        ]);
    }
    
    /**
     * Allows user to change their personal information
     */
    public function actionUpdateEducationInfo(){
        $model = \frontend\models\Student::findOne(Yii::$app->user->identity->student_id);
        
        if($model){
            $model->scenario = "updateEducationInfo";
            
            if ($model->load(Yii::$app->request->post()) && $model->save()) {
                Yii::$app->getSession()->setFlash('success', Yii::t('register', 'Updated your education information'));
            }
        }
        
        return $this->render('updateEducationInfo', [
            'model' => $model,
        ]);
    }
    

}
