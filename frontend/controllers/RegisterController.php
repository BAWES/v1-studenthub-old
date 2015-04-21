<?php

namespace frontend\controllers;

use Yii;
use yii\filters\AccessControl;
use yii\filters\VerbFilter;
use common\models\University;
use yii\web\NotFoundHttpException;
use yii\web\UploadedFile;
use yii\base\DynamicModel;
use frontend\models\Student;
use DateTime;

class RegisterController extends \yii\web\Controller {

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
                        'roles' => ['?'], //only allow unauthenticated users to register
                    ],
                ],
            ],
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'validate' => ['post'],
                    'id-upload' => ['post'],
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
     * Renders University Selection (Step 1);
     */
    public function actionIndex() {
        return $this->render('index');
    }
    
    

    /**
     * Renders Registration form + ID upload if this university requires
     * @param int $university University ID 
     */
    public function actionRegister($university) {
        $universityID = (int) $university;
        $universityModel = $this->findUniversity($universityID);


        return $this->render('register', [
                    'university' => $universityModel,
        ]);
    }
    
    /**
     * AJAX: Validates and uploads ID card image
     */
    public function actionIdUpload() {
        \Yii::$app->response->format = \yii\web\Response::FORMAT_JSON;
        $response = [
            'valid' => false,
            'errors' => [],
            'file' => false,
        ];
        
        $uploadedFile = UploadedFile::getInstanceByName("idUpload");
        
        if($uploadedFile){
            $model = DynamicModel::validateData(compact('uploadedFile'), [
                [['uploadedFile'], 'file', 'skipOnEmpty' => false, 'extensions' => 'jpg, png, gif, pdf', 'maxSize' => 10000000],
            ]);

            if ($model->hasErrors()) {
                // validation fails
                $response['errors'] = $model->errors;
            } else {
                //file upload is valid
                
                //Upload file to amazon S3
                $filename = Yii::$app->security->generateRandomString() . "." . $uploadedFile->extension;
                
                //Save to S3 Temporary folder
                if($awsResult = Yii::$app->resourceManager->save($uploadedFile, "temporary/".$filename)){
                    $response['valid'] = true;
                    $response['errors'] = false;
                    $response['file'] = $filename;
                }
                
            }
            
        }
        
        return $response;
    }

    /**
     * AJAX-based validation for student registration
     */
    public function actionValidate() {
        \Yii::$app->response->format = \yii\web\Response::FORMAT_JSON;
        $response = [
            'valid' => false,
            'errors' => [],
            'goToNextStep' => false,
            'complete' => false,
        ];
        
        
        $model = new Student();
        $model->attributes = Yii::$app->request->post();
        
        //Date of birth format adjustment
        if($model->student_dob){
            $date = new DateTime($model->student_dob);
            $formattedDate = $date->format('Y/m/d');
            $model->student_dob = $formattedDate;
        }
        
        //Set Scenario based on current step
        if(!$model->step) $model->step = 1;
        if($model->step == 1){
            $model->scenario = "registrationFirstStep";
        }else if($model->step == 2){
            $model->scenario = "default";
        }
        
                
        if (!$model->validate()) {
            //Errors available in submitted data
            $response['errors'] = $model->errors;
            
        }else{
            //All data is valid
            $response['valid'] = true;
            $response['errors'] = false;
            
            //If step 1, tell to go next step
            if($model->step == 1){
                $response['goToNextStep'] = true;
            }
            
            if($model->step == 2){
                $response['complete'] = true;
                
                //Save Student Record (method within frontend student model)
                //Make sure to move item from temporary to student-identification folder on beforeSave if new record
                $model->signup();
                
                //Send Verification Email for account activation (also within the model as part of signup()
                
                
                //Student creation complete -> redirect to thank you page / Tell them to verify email
                return $this->redirect(["register/thanks"]);
            }
        }
        
        return $response;
    }

    /**
     * Renders Profile Form via AJAX (Step 3)
     */
    public function actionForm($id) {
        $id = (int) $id;
        $university = $this->findUniversity($id);
        
        return $this->renderAjax('_form',['university'=>$university]);
    }
    
    public function actionThanks(){
        //Maybe render different thank you page based on university
        return $this->render('thanks');
    }

    /**
     * Finds the University model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Major the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findUniversity($id) {
        if (($model = University::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }

}
