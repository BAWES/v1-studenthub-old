<?php

namespace frontend\controllers;

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
            $model->populateLanguagesSelected();
            
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
            $model->populateMajorsSelected();
            
            if ($model->load(Yii::$app->request->post()) && $model->save()) {
                Yii::$app->getSession()->setFlash('success', Yii::t('register', 'Updated your education information'));
            }
        }
        
        return $this->render('updateEducationInfo', [
            'model' => $model,
        ]);
    }
    
    /**
     * Allows user to change their profile photo
     */
    public function actionChangeProfilePhoto(){
        $hasErrors = false;
        $model = \common\models\Student::findOne(Yii::$app->user->identity->student_id);
        
        
        if($model){
            $model->scenario = "changeProfilePhoto";
            $oldPhoto = $model->student_photo;
            $oldPhotoUrl = $model->photo;
            
            if ($model->load(Yii::$app->request->post())) {
                $model->student_photo = UploadedFile::getInstance($model, 'student_photo');
                $uploadedFile = $model->student_photo;
                                
                /**
                 * Dynamic Model to validate filetype on the go
                 */
                $dynModel = DynamicModel::validateData(compact('uploadedFile'), [
                    [['uploadedFile'], 'file', 'skipOnEmpty' => false, 'extensions' => 'jpg, png, gif', 'maxSize' => 10000000,
                        'wrongExtension' => Yii::t('register', 'Only files with these extensions are allowed for your Photo: {extensions}')],
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
                    $model->uploadPhoto();
                    if($model->save()){
                        //Delete old photo if exists
                        if($oldPhoto){
                            Yii::$app->resourceManager->delete("student-photo/" . $oldPhoto);
                        }

                        Yii::$app->user->identity->student_photo = $model->student_photo;
                        
                        Yii::$app->getSession()->setFlash('success', Yii::t('register', 'Updated your profile photo'));
                    }else{
                        $hasErrors = true;
                        foreach ($model->errors as $error => $errorText) {
                            Yii::$app->getSession()->setFlash('error', $errorText);
                        }
                    }
                }
            }
        }
        
        
        return $this->render('changeProfilePhoto', [
            'model' => $model,
            'hasErrors' => $hasErrors,
            'oldPhotoUrl' => $oldPhotoUrl,
        ]);
    }
    
    
    
    /**
     * Allows user to change their uploaded CV
     */
    public function actionUpdateCv(){
        $hasErrors = false;
        $model = \common\models\Student::findOne(Yii::$app->user->identity->student_id);
        
        
        if($model){
            $model->scenario = "updateCv";
            $oldCv = $model->student_cv;
            $oldCvUrl = $model->cv;
            
            if ($model->load(Yii::$app->request->post())) {
                $model->student_cv = UploadedFile::getInstance($model, 'student_cv');
                $uploadedFile = $model->student_cv;
                                
                /**
                 * Dynamic Model to validate filetype on the go
                 */
                $dynModel = DynamicModel::validateData(compact('uploadedFile'), [
                    [['uploadedFile'], 'file', 'skipOnEmpty' => false, 'extensions' => 'pdf, doc, docx', 'maxSize' => 10000000,
                    'wrongExtension' => Yii::t('register', 'Only files with these extensions are allowed for CV: {extensions}')],
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
                    $model->uploadCv();
                    if($model->save()){
                        //Delete old cv if exists
                        if($oldCv){
                            Yii::$app->resourceManager->delete("student-cv/" . $oldCv);
                        }

                        Yii::$app->getSession()->setFlash('success', Yii::t('register', 'Your CV has been updated'));
                    }else{
                        $hasErrors = true;
                        foreach ($model->errors as $error => $errorText) {
                            Yii::$app->getSession()->setFlash('error', $errorText);
                        }
                    }
                }
            }
        }
        
        
        return $this->render('updateCv', [
            'model' => $model,
            'hasErrors' => $hasErrors,
            'oldCvUrl' => $oldCvUrl,
        ]);
    }
    

}
