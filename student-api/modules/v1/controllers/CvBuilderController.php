<?php

namespace studentapi\modules\v1\controllers;

use Yii;
use yii\rest\Controller;
use yii\helpers\ArrayHelper;
use yii\helpers\Url;
use yii\web\UploadedFile;
use yii\base\DynamicModel;
use studentapi\models\Student;
use common\models\StudentLanguage;
use common\models\StudentMajor;

/**
 * Cvbuilder 
 */
class CvBuilderController extends Controller
{
    public function behaviors()
    {
        $behaviors = parent::behaviors();

        // remove authentication filter for cors to work
        unset($behaviors['authenticator']);

        // Allow XHR Requests from our different subdomains and dev machines
        $behaviors['corsFilter'] = [
            'class' => \yii\filters\Cors::className(),
            'cors' => [
                'Origin' => Yii::$app->params['allowedOrigins'],
                'Access-Control-Request-Method' => ['GET', 'POST', 'PUT', 'PATCH', 'DELETE', 'HEAD', 'OPTIONS'],
                'Access-Control-Request-Headers' => ['*'],
                'Access-Control-Allow-Credentials' => null,
                'Access-Control-Max-Age' => 86400,
                'Access-Control-Expose-Headers' => [],
            ],
        ];

        // Bearer Auth checks for Authorize: Bearer <Token> header to login the user
        $behaviors['authenticator'] = [
            'class' => \yii\filters\auth\HttpBearerAuth::className(),
        ];
        // avoid authentication on CORS-pre-flight requests (HTTP OPTIONS method)
        $behaviors['authenticator']['except'] = ['options'];

        return $behaviors;
    }

    /**
     * @inheritdoc
     */
    public function actions()
    {
        $actions = parent::actions();
        $actions['options'] = [
            'class' => 'yii\rest\OptionsAction',
            // optional:
            'collectionOptions' => ['GET', 'POST', 'HEAD', 'OPTIONS'],
            'resourceOptions' => ['GET', 'PUT', 'PATCH', 'DELETE', 'HEAD', 'OPTIONS'],
        ];
        return $actions;
    }

    /** 
     * Return student details
     */ 
    public function actionView()
    {
        $student = Student::find()
            ->where(['student_id' => Yii::$app->user->getId()])
            ->one();

        $result['student'] = $student;

        $result['country'] = $student->country;            

        $result['university'] = $student->university;            

        $result['languages'] = StudentLanguage::find()
                ->select('{{%language}}.*')
                ->innerJoin('{{%language}}', '{{%language}}.language_id = {{%student_language}}.language_id')
                ->where(['student_id' => $student->student_id])
                ->asArray()
                ->all();

        $result['majors'] = StudentMajor::find()
                ->select('{{%major}}.*')
                ->innerJoin('{{%major}}', '{{%major}}.major_id = {{%student_major}}.major_id')
                ->where(['student_id' => $student->student_id])
                ->asArray()
                ->all();

        return $result;
    }

    /**
     * Update student account info
     */
    public function actionUpdate()
    {
        $student = Student::findOne(Yii::$app->user->getId());

        if ($student) {

            $data = [
                'student_firstname' => Yii::$app->request->getBodyParam('firstname'),
                'student_lastname' => Yii::$app->request->getBodyParam('lastname'),
                'student_dob' => Yii::$app->request->getBodyParam('dob'),
                'student_enrolment_year' => Yii::$app->request->getBodyParam('enrolment_year'),
                'student_graduating_year' => Yii::$app->request->getBodyParam('graduating_year'),
                'student_gpa' => Yii::$app->request->getBodyParam('gpa'),
                'student_english_level' => Yii::$app->request->getBodyParam('english_level'),
                'student_gender' => Yii::$app->request->getBodyParam('gender'),
                'student_transportation' => Yii::$app->request->getBodyParam('transportation'),
                'student_contact_number' => Yii::$app->request->getBodyParam('contact_number'),
                'student_interestingfacts' => Yii::$app->request->getBodyParam('interestingfacts'),
                'student_skill' => Yii::$app->request->getBodyParam('skill'),
                'student_hobby' => Yii::$app->request->getBodyParam('hobby'),
                'student_club' => Yii::$app->request->getBodyParam('club'),
                'student_sport' => Yii::$app->request->getBodyParam('sport'),                
                'student_experience_company' => Yii::$app->request->getBodyParam('experience_company'),
                'student_experience_position' => Yii::$app->request->getBodyParam('experience_position'),
                'country_id' => Yii::$app->request->getBodyParam('country_id'),
                'university_id' => Yii::$app->request->getBodyParam('university_id')
            ];

            $student->setAttributes($data);
                
            $new_email = Yii::$app->request->getBodyParam("email");
            
            if($new_email != $student->student_email) 
            {
                $student->student_new_email = $new_email;
            }else{
                $student->student_new_email = null;
            }

            if(!$student->save()) 
            {
                return [
                    "operation" => "error",
                    "message" => $student->errors
                ];
            }

            //save languages

            $languages = Yii::$app->request->getBodyParam('languages');

            if(!$languages)
                $languages = [];

            StudentLanguage::deleteAll(['student_id' => $student->student_id]);

            foreach ($languages as $key => $value) {
                $l = new StudentLanguage;
                $l->student_id = $student->student_id;
                $l->language_id = $value;
                $l->save();
            }
            
            //save majors 

            $majors = Yii::$app->request->getBodyParam('majors');

            if(!$majors)
                $majors = [];

            StudentMajor::deleteAll(['student_id' => $student->student_id]);
            
            foreach ($majors as $key => $value) {
                $l = new StudentMajor;
                $l->student_id = $student->student_id;
                $l->major_id = $value;
                $l->save();
            }

            Yii::info("[Student Account Info Updated] ".$student->student_email, __METHOD__);

            if($student->student_new_email)
            {
                $student->generateAuthKey();

                $student->sendVerificationEmail();   

                return [
                    "operation" => "success",
                    "message" => "Student Account Info Updated Successfully, please check email to verify new email address"
                ]; 
            }     

            return [
                "operation" => "success",
                "message" => "Student Account Info Updated Successfully"
            ];

        } else {
            return [
                "operation" => "error",
                "message" => 'Student Account not found'
            ];
        }
    }


    /**
     * Allows user to change their uploaded CV
     */
    public function actionUploadCv(){
        $hasErrors = false;
        $model = Yii::$app->user->identity;
    
        $model->scenario = "updateCv";
        $oldCv = $model->student_cv;
        $oldCvUrl = $model->cv;

        if (Yii::$app->params['isDemo']) 
        {
            return [
                'operation' => 'error',
                'message' => 'Disable for demo version'
            ];
        }

        //$model->student_cv = Yii::$app->request->getBodyParam('student_cv');

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
            return [
                'operation' => 'error',
                'message' => $dynModel->errors
            ];
        }

        if(!$hasErrors){
            //file upload is valid - Upload file to amazon S3
            $model->uploadCv();
            if($model->save()){
                //Delete old cv if exists
                if($oldCv){
                    Yii::$app->resourceManager->delete("student-cv/" . $oldCv);
                }

                return [
                    'operation' => 'success',
                    'url' => Url::to("@student-cv/" . $model->student_cv),
                    'message' => 'Resume Uploaded Successfully'
                ];
            }else{
                return [
                    'operation' => 'error',
                    'message' => $model->errors
                ];
            }
        }
    }
}