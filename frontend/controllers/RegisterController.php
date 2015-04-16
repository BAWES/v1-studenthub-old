<?php

namespace frontend\controllers;

use Yii;
use yii\filters\AccessControl;
use yii\filters\VerbFilter;
use common\models\University;
use yii\web\NotFoundHttpException;
use frontend\models\RegisterForm;
use yii\web\UploadedFile;
use yii\base\DynamicModel;

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
        $university = (int) $university;
        $university = $this->findUniversity($university);


        return $this->render('register', [
                    'university' => $university,
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
                $awsResult = Yii::$app->resourceManager->save($uploadedFile, "temporary/".$filename);
                $response['valid'] = true;
                $response['errors'] = false;
                $response['file'] = $awsResult;
                
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
        ];
        
        
        $model = new RegisterForm;
        $model->attributes = Yii::$app->request->post();
        
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
            
            /*
             * Make sure to move item from temporary to student-identification folder
             */
        }
        
        return $response;
        
        /*If step is 1, there will be a scenario to only validate attributes related to step 1
         * If Step is 2, all attributes will be validated
         * Form will not create a student record UNLESS step is 2. Dont allow users to manually change to step 1
         * to ignore rest of validation
         */
    }

    /**
     * Renders Profile Form via AJAX (Step 3)
     */
    public function actionForm() {

        return $this->renderAjax('_form');
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
