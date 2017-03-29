<?php

namespace studentapi\modules\v1\controllers;

use Yii;
use yii\rest\Controller;
use yii\helpers\ArrayHelper;
use yii\data\ActiveDataProvider;
use studentapi\models\Job;
use studentapi\models\Employer;
use common\models\JobOffice;
use common\models\JobQuestion;
use common\models\StudentJobApplication;
use common\models\StudentJobApplicationQuestion;

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
        $query = Job::find()
            ->select('
                {{%job}}.*, 
                {{%jobtype}}.jobtype_name_ar, 
                {{%jobtype}}.jobtype_name_en
            ')
            ->innerJoin('{{%jobtype}}', '{{%jobtype}}.jobtype_id = {{%job}}.jobtype_id')
            ->where([
                    'job_status' => Job::STATUS_OPEN,
                    'job_id' => $id
                ]);
            
        $job = $query->asArray()->one();

        $job['employer'] = Employer::find()
            ->where(['employer_id' => $job['employer_id']])
            ->one();

        //add office locations for jobs 

        $job['offices'] = JobOffice::find()
            ->select('office_name_ar, office_name_en, office_longitude, office_latitude, office_address, city_name_en, city_name_ar')
            ->innerJoin('{{%employer_office}}', '{{%employer_office}}.office_id = {{%job_office}}.office_id')
            ->innerJoin('{{%city}}', '{{%city}}.city_id = {{%employer_office}}.city_id')
            ->where(['job_id' => $id])
            ->asArray()
            ->all();

        //add job questions 

        $job['questions'] = JobQuestion::findAll(['job_id' => $id]);

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

    /**
     * Return job apply
     */
    public function actionApply($id)
    {
        $job = Job::findOne([
                'job_id' => $id,
                'job_status' => Job::STATUS_OPEN
            ]);

        if(!$job)
        {
            return [
                "operation" => "error",
                "message" => 'Job not found!'
            ];
        }

        // check if already applied 

        $application = StudentJobApplication::findOne([
                'job_id' => $id,
                'student_id' => Yii::$app->user->identity->student_id
            ]);

        if($application)
        {
            return [
                "operation" => "error",
                "message" => 'You have already applied to this job!'
            ];
        }

        $transaction = Yii::$app->db->beginTransaction();

        $application = new StudentJobApplication();
        $application->student_id = Yii::$app->user->identity->student_id;
        $application->job_id = $id;

        if(!$application->save())
        {
            return [
                "operation" => "error",
                "message" => $application->getErrors()
            ];
        }

        //save questions 

        $questions = Yii::$app->request->getBodyParam('questions');

        foreach ($questions as $key => $value) 
        {            
            $jq = JobQuestion::findOne($key); 

            if(!$jq)
            {
                $transaction->rollBack();

                return [
                    "operation" => "error",
                    "message" => 'Question #'.$key.' not found!'
                ];
            }

            $jaq = new StudentJobApplicationQuestion;
            $jaq->application_id = $application->application_id;
            $jaq->question_id = $key;
            $jaq->question = $jq->question;
            $jaq->answer = $value;
            
            if(!$jaq->save())
            {
                $transaction->rollBack();

                return [
                    "operation" => "error",
                    "message" => $jaq->getErrors()
                ];
            }
        }        

        $transaction->commit();

        return [
            "operation" => "success",
            "message" => 'Applied successfully'
        ];
    }
}