<?php

namespace studentapi\modules\v1\controllers;

use Yii;
use yii\rest\Controller;
use yii\helpers\ArrayHelper;
use yii\data\ActiveDataProvider;
use studentapi\models\Job;

/**
 * Job controller - Search Cities 
 */
class JobController extends Controller
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
     * Return a List of Jobs by job_title
     */
    public function actionFilter()
    {
        $job_title = Yii::$app->request->getBodyParam("job_title");

        // list all open job where not applied 

        $query = Job::find()
            ->select('{{%job}}.*, {{%jobtype}}.jobtype_name_ar, {{%jobtype}}.jobtype_name_en')
            ->innerJoin('{{%jobtype}}', '{{%jobtype}}.jobtype_id = {{%job}}.jobtype_id')
            ->where('job_status = '.Job::STATUS_OPEN.' AND job_id NOT IN (select job_id from student_job_application where student_id = "'.Yii::$app->user->getId().'")');

        if($job_title) {
            $query->andWhere(['job_title', 'university_name_ar', $job_title]);
        }

        return new ActiveDataProvider([
            'query' => $query->asArray()
        ]);
    }

    /**
     * Return job detail 
     */
    public function actionView($id)
    {
        $job_title = Yii::$app->request->getBodyParam("job_title");

        // list all open job where not applied 

        $query = Job::find()
            ->select('
                {{%job}}.*, 
                {{%jobtype}}.jobtype_name_ar, 
                {{%jobtype}}.jobtype_name_en, 
                {{%employer}}.employer_company_name,
                {{%employer}}.employer_logo,
                {{%employer}}.employer_website,
                {{%employer}}.employer_company_desc,
                {{%employer}}.employer_num_employees,
                {{%employer}}.employer_contact_firstname,
                {{%employer}}.employer_contact_lastname,
                {{%employer}}.employer_contact_number,
                {{%employer}}.employer_credit,
                {{%employer}}.employer_email_preference,
                {{%employer}}.employer_email,
                {{%employer}}.employer_social_twitter,
                {{%employer}}.employer_social_facebook,
                {{%employer}}.employer_social_instagram
            ')
            ->innerJoin('{{%jobtype}}', '{{%jobtype}}.jobtype_id = {{%job}}.jobtype_id')
            ->innerJoin('{{%employer}}', '{{%employer}}.employer_id = {{%job}}.employer_id')
            ->where('job_status = '.Job::STATUS_OPEN);
            
        $job = $query->asArray()->one();

        if($job)
        {
            return [
                "operation" => "success",
                "message" => $job
            ];
        }
        else
        {
            return [
                "operation" => "error",
                "message" => 'Job not found!'
            ];
        }
    }
}