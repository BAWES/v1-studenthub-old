<?php

namespace employer\controllers;

use Yii;
use yii\filters\AccessControl;
use yii\web\UploadedFile;
use yii\base\DynamicModel;
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
     * List of settings + ability to change settings from a single page
     */
    public function actionIndex() {
        return $this->render('index');
    }
    
    /**
     * Allows user to change their company information
     */
    public function actionUpdateCompanyInfo(){
        $model = \employer\models\Employer::findOne(Yii::$app->user->identity->employer_id);
        
        if($model){
            $model->scenario = "updateCompanyInfo";
            
            if ($model->load(Yii::$app->request->post()) && $model->save()) {
                Yii::$app->getSession()->setFlash('success', Yii::t('register', 'Your company information has been updated'));
            }
        }
        
        return $this->render('updateCompanyInfo', [
            'model' => $model,
        ]);
    }
    
    /**
     * Allows user to change their personal information
     */
    public function actionUpdatePersonalInfo(){
        $model = \employer\models\Employer::findOne(Yii::$app->user->identity->employer_id);
        
        if($model){
            $model->scenario = "updatePersonalInfo";
            
            if ($model->load(Yii::$app->request->post()) && $model->save()) {
                Yii::$app->getSession()->setFlash('success', Yii::t('register', 'Your personal information has been updated'));
            }
        }
        
        return $this->render('updatePersonalInfo', [
            'model' => $model,
        ]);
    }
    
    /**
     * Allows user to change their social media details
     */
    public function actionUpdateSocialDetails(){
        $model = \employer\models\Employer::findOne(Yii::$app->user->identity->employer_id);
        
        if($model){
            $model->scenario = "updateSocialDetails";
            
            if ($model->load(Yii::$app->request->post()) && $model->save()) {
                Yii::$app->getSession()->setFlash('success', Yii::t('register', 'Your social media details have been updated'));
            }
        }
        
        return $this->render('updateSocialDetails', [
            'model' => $model,
        ]);
    }
    
    /**
     * Change users notification preference via AJAX
     * @param integer $preference
     * @return mixed
     */
    public function actionChangeNotificationPreference(){
        $model = \employer\models\Employer::findOne(Yii::$app->user->identity->employer_id);
                
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
    
    
    /**
     * Allows user to change their password
     */
    public function actionChangePassword(){
        $model = \employer\models\Employer::findOne(Yii::$app->user->identity->employer_id);
        
        if($model){
            $model->scenario = "changePassword";
            
            if ($model->load(Yii::$app->request->post())) {
                $model->setPassword($model->employer_password_hash);
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
     * Allows user to change their profile photo
     */
    public function actionUpdateLogo(){
        $hasErrors = false;
        $model = \common\models\Employer::findOne(Yii::$app->user->identity->employer_id);
        
        
        if($model){
            $model->scenario = "updateLogo";
            
            $oldLogo = $model->employer_logo;
            $oldLogoUrl = $model->logo;
            
            if ($model->load(Yii::$app->request->post())) {
                $model->employer_logo = UploadedFile::getInstance($model, 'employer_logo');
                $uploadedFile = $model->employer_logo;
                                
                /**
                 * Dynamic Model to validate filetype on the go
                 */
                $dynModel = DynamicModel::validateData(compact('uploadedFile'), [
                    [['uploadedFile'], 'file', 'skipOnEmpty' => false, 'extensions' => 'jpg, png, gif', 'maxSize' => 10000000,
                        'wrongExtension' => Yii::t('register', 'Only files with these extensions are allowed for your Logo: {extensions}')],
                ]);
                if ($dynModel->hasErrors()) {
                    // validation fails
                    $hasErrors = true;
                    foreach ($dynModel->errors as $error => $errorText) {
                        Yii::$app->getSession()->setFlash('error', $errorText);
                    }
                }

                if(!$hasErrors){
                    //file upload is valid - Upload file to amazon S3
                    $model->uploadLogo();
                    if($model->save()){
                        //Delete old logo if exists
                        if($oldLogo){
                            Yii::$app->resourceManager->delete("employer-logo/" . $oldLogo);
                        }

                        Yii::$app->user->identity->employer_logo = $model->employer_logo;
                        
                        Yii::$app->getSession()->setFlash('success', Yii::t('register', 'Your logo has been updated'));
                    }else{
                        $hasErrors = true;
                        foreach ($model->errors as $error => $errorText) {
                            Yii::$app->getSession()->setFlash('error', $errorText);
                        }
                    }
                }
            }
        }
        
        
        return $this->render('updateLogo', [
            'model' => $model,
            'hasErrors' => $hasErrors,
            'oldLogoUrl' => $oldLogoUrl,
        ]);
    }
    

}
