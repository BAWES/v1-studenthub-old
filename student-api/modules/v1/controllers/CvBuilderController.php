<?php

namespace studentapi\modules\v1\controllers;

use Yii;
use yii\rest\Controller;
use yii\helpers\ArrayHelper;
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
}