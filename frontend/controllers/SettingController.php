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
            /**
             * Change his notification preference as provided
             */
            
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
    

}
