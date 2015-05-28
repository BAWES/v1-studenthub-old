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
    
    public $enableCsrfValidation = false;

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
                        'roles' => ['?'], //only allow unauthenticated users to register actions
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
     * Get the full major list for AJAX selection based on search input
     * @param type $q the search input
     */
    public function actionMajorList($q){
        \Yii::$app->response->format = \yii\web\Response::FORMAT_JSON;
        $majorList = [];
        
        if(strlen($q) < 2) return $majorList;
        
        $majors = \common\models\Major::find()->where(['like', 'major_name_en', $q])
                                              ->orWhere(['like', 'major_name_ar', $q])
                                              ->all();
               
        foreach($majors as $major){
            $majorList[] = [
                'majorId' => $major->major_id,
                'majorName' => Yii::$app->view->params['isArabic']?$major->major_name_ar:$major->major_name_en,
            ];
        }
        
        return $majorList;
    }

    /**
     * Email verification by clicking on link in email which includes the code that will verify
     * @param string $code Verification key that will verify your account
     * @param int $verify Student ID to verify
     * @throws NotFoundHttpException if the code is invalid
     */
    public function actionEmailVerify($code, $verify) {
        //Code is his auth key, check if code is valid
        $student = Student::findOne(['student_auth_key'=>$code, 'student_id' => (int) $verify]);
        if($student){
            if($student->student_email_verification == Student::EMAIL_NOT_VERIFIED){
                /**
                 * Verify this student email
                 */
                $student->verifyEmail();
                
                //Log him in (if his ID is verified)
                if($student->student_id_verification == Student::ID_VERIFIED){
                    Yii::$app->user->login($student, 0);
                }
            }
            
            if($student->student_id_verification == Student::ID_VERIFIED){
                return $this->render('verified', ['idVerified' => true]);
            } else {
                return $this->render('verified', ['idVerified' => false]);
            }
            
        } else {
            //inserted code is invalid
            throw new \yii\web\BadRequestHttpException(Yii::t('register', 'Invalid email verification code'));
        }
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
                [['uploadedFile'], 'file', 'skipOnEmpty' => false, 'extensions' => 'jpg, png, gif', 'maxSize' => 10000000,
                    'wrongExtension' => Yii::t('register', 'Only files with these extensions are allowed for ID: {extensions}')],
            ]);

            if ($model->hasErrors()) {
                // validation fails
                $response['errors'] = $model->errors;
            } else {
                //file upload is valid - Upload file to amazon S3
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
     * AJAX: Validates and uploads CV upload (10 MB size limit)
     */
    public function actionCvUpload() {
        \Yii::$app->response->format = \yii\web\Response::FORMAT_JSON;
        $response = [
            'valid' => false,
            'errors' => [],
            'file' => false,
        ];
        
        $uploadedFile = UploadedFile::getInstanceByName("cvUpload");
        
        if($uploadedFile){
            $model = DynamicModel::validateData(compact('uploadedFile'), [
                [['uploadedFile'], 'file', 'skipOnEmpty' => false, 'extensions' => 'pdf, doc, docx', 'maxSize' => 10000000,
                    'wrongExtension' => Yii::t('register', 'Only files with these extensions are allowed for CV: {extensions}')],
            ]);

            if ($model->hasErrors()) {
                // validation fails
                $response['errors'] = $model->errors;
            } else {
                //file upload is valid - Upload file to amazon S3
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
     * AJAX: Validates and uploads Photo upload (10 MB size limit)
     */
    public function actionPhotoUpload() {
        \Yii::$app->response->format = \yii\web\Response::FORMAT_JSON;
        $response = [
            'valid' => false,
            'errors' => [],
            'file' => false,
        ];
        
        $uploadedFile = UploadedFile::getInstanceByName("photoUpload");
        
        if($uploadedFile){
            $model = DynamicModel::validateData(compact('uploadedFile'), [
                [['uploadedFile'], 'file', 'skipOnEmpty' => false, 'extensions' => 'jpg, png, gif', 'maxSize' => 10000000,
                    'wrongExtension' => Yii::t('register', 'Only files with these extensions are allowed for your Photo: {extensions}')],
            ]);

            if ($model->hasErrors()) {
                // validation fails
                $response['errors'] = $model->errors;
            } else {
                //file upload is valid - Upload file to amazon S3
                $filename = Yii::$app->security->generateRandomString() . "." . $uploadedFile->extension;
                
                //Resize file using imagine
                $newTmpName = $uploadedFile->tempName . "." . $uploadedFile->extension;
                
                $imagine = new \Imagine\Gd\Imagine();
                $image = $imagine->open($uploadedFile->tempName);
                $image->resize($image->getSize()->widen(500));
                $image->save($newTmpName);
                
                //Overwrite old filename for S3 uploading
                $uploadedFile->tempName = $newTmpName;
                
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
                
                //Save Student Record and Send Verification Email
                $model->signup();
                
                
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
    
    /**
     * Registration Thank You Page
     */
    public function actionThanks(){
        
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
