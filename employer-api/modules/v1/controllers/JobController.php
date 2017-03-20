<?php

namespace employerapi\modules\v1\controllers;

use Yii;
use yii\rest\Controller;
use yii\helpers\ArrayHelper;
use yii\data\ActiveDataProvider;
use common\models\Job;
use common\models\JobOffice;
use common\models\JobQuestion;
use common\models\JobSkill;

/**
 * Job controller - Manage job as Employer
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
     * Return a List of Job Accounts available.
     */
    public function actionList()
    {
        $query = Job::find()
            ->where(['employer_id' => Yii::$app->user->getId()]);

        return new ActiveDataProvider([
            'query' => $query
        ]);
    }

    /**
     * Create a job account
     */
    public function actionCreate()
    {
        $offices = Yii::$app->request->getBodyParam("offices");

        if(!$offices)
        {
            $offices = [];
        }

        $job_question = Yii::$app->request->getBodyParam("job_questions");

        if(!$job_question)
        {
            $job_question = [];
        }

        $job_skill = Yii::$app->request->getBodyParam("job_skills");

        if(!$job_skill)
        {
            $job_skill = [];
        }

        $transaction = Yii::$app->db->beginTransaction();
        
        // Attempt to create new job
        $model = new Job();
        
        $model->employer_id = Yii::$app->user->getId();
        $model->jobtype_id = Yii::$app->request->getBodyParam("jobtype_id");
        $model->job_title = Yii::$app->request->getBodyParam("title");
        $model->job_startdate = Yii::$app->request->getBodyParam("startdate");
        $model->job_responsibilites = Yii::$app->request->getBodyParam("responsibilites");
        $model->job_other_qualifications = Yii::$app->request->getBodyParam("other_qualifications");
        $model->job_compensation = Yii::$app->request->getBodyParam("compensation");
        $model->job_max_applicants = Yii::$app->request->getBodyParam("max_applicants");
        $model->job_status = Yii::$app->request->getBodyParam("status");
        $model->salary = Yii::$app->request->getBodyParam("salary");
        $model->salary_currency = Yii::$app->request->getBodyParam("salary_currency");

        if($model->salary > 0) 
        {
            $model->job_pay = 1;
        }
        else
        {
            $model->job_pay = 0;
        }

        //validation 

        if (!$model->save())
        {
            return [
                "operation" => "error",
                "message" => $model->errors
            ];
        }

        //job office 

        foreach ($offices as $key => $value) {
            $office = new JobOffice;
            $office->job_id = $model->job_id;
            $office->office_id = $value;
            
            if(!$office->save())
            {
                $transaction->rollBack();

                return [
                    "operation" => "error",
                    "message" => $office->errors
                ];
            }
        }

        //job question 

        foreach ($job_question as $key => $value) {
            $question = new JobQuestion;
            $question->job_id = $model->job_id;
            $question->question = $value;

            if(!$question->save())
            {
                $transaction->rollBack();

                return [
                    "operation" => "error",
                    "message" => $question->errors
                ];
            }
        }

        //job skill 

        foreach ($job_skill as $key => $value) {
            $job_skill = new JobSkill;
            $job_skill->job_id = $model->job_id;
            $job_skill->skill_id = $value;

            if(!$job_skill->save())
            {
                $transaction->rollBack();

                return [
                    "operation" => "error",
                    "message" => $job_skill->errors
                ];
            }
        }

        $transaction->commit();

        return [
            "operation" => "success",
            "message" => "Job created successfully "
        ];

        // Check SQL Query Count and Duration
        return Yii::getLogger()->getDbProfiling();
    }

    /**
     * Create a job account
     */
    public function actionUpdate($id)
    {
        $offices = Yii::$app->request->getBodyParam("offices");

        if(!$offices)
        {
            $offices = [];
        }

        $job_question = Yii::$app->request->getBodyParam("job_questions");

        if(!$job_question)
        {
            $job_question = [];
        }

        $job_skill = Yii::$app->request->getBodyParam("job_skills");

        if(!$job_skill)
        {
            $job_skill = [];
        }

        // Attempt to update job 
        $model = Job::findOne([
                'job_id' => (int) $id,
                'employer_id' => Yii::$app->user->getId()
            ]);

        if(!$model){
            return [
                    "operation" => "error",
                    "message" => "Job not found."
                ];
        }

        $transaction = Yii::$app->db->beginTransaction();
        
        $model->jobtype_id = Yii::$app->request->getBodyParam("jobtype_id");
        $model->job_title = Yii::$app->request->getBodyParam("title");
        $model->job_startdate = Yii::$app->request->getBodyParam("startdate");
        $model->job_responsibilites = Yii::$app->request->getBodyParam("responsibilites");
        $model->job_other_qualifications = Yii::$app->request->getBodyParam("other_qualifications");
        $model->job_compensation = Yii::$app->request->getBodyParam("compensation");
        $model->job_max_applicants = Yii::$app->request->getBodyParam("max_applicants");
        $model->job_status = Yii::$app->request->getBodyParam("status");
        $model->salary = Yii::$app->request->getBodyParam("salary");
        $model->salary_currency = Yii::$app->request->getBodyParam("salary_currency");

        if($model->salary > 0) 
        {
            $model->job_pay = 1;
        }
        else
        {
            $model->job_pay = 0;
        }

        //validation 

        if (!$model->save())
        {
            return [
                "operation" => "error",
                "message" => $model->errors
            ];
        }

        //job office 

        JobOffice::deleteAll(['job_id' => $model->job_id]);

        foreach ($offices as $key => $value) {
            $office = new JobOffice;
            $office->job_id = $model->job_id;
            $office->office_id = $value;
            
            if(!$office->save())
            {
                $transaction->rollBack();

                return [
                    "operation" => "error",
                    "message" => $office->errors
                ];
            }
        }

        //job question 

        JobQuestion::deleteAll(['job_id' => $model->job_id]);

        foreach ($job_question as $key => $value) {
            $question = new JobQuestion;
            $question->job_id = $model->job_id;
            $question->question = $value;

            if(!$question->save())
            {
                $transaction->rollBack();

                return [
                    "operation" => "error",
                    "message" => $question->errors
                ];
            }
        }

        //job skill 

        JobSkill::deleteAll(['job_id' => $model->job_id]);

        foreach ($job_skill as $key => $value) {
            $job_skill = new JobSkill;
            $job_skill->job_id = $model->job_id;
            $job_skill->skill_id = $value;

            if(!$job_skill->save())
            {
                $transaction->rollBack();

                return [
                    "operation" => "error",
                    "message" => $job_skill->errors
                ];
            }
        }

        $transaction->commit();

        return [
            "operation" => "success",
            "message" => "Job updated successfully "
        ];

        // Check SQL Query Count and Duration
        return Yii::getLogger()->getDbProfiling();
    }

    /**
     * Delete an account
     * @param  integer $id
     * @return array
     */
    public function actionDelete($id)
    {
        $job = Job::findOne([
                'job_id' => (int) $id,
                'employer_id' => Yii::$app->user->getId()
            ]);

        if(!$job) {
            return [
                "operation" => "error",
                "message" => "Job not found or already deleted"
            ];
        }

        JobOffice::deleteAll(['job_id' => $id]);
        JobQuestion::deleteAll(['job_id' => $id]);
        JobSkill::deleteAll(['job_id' => $id]);

        Yii::warning("[Job Deleted] ".$job->job_title, __METHOD__);

        // Delete job
        $job->delete();

        return [
            "operation" => "success",
            "message" => "Job deleted successfully"
        ];
   
        // Check SQL Query Count and Duration
        return Yii::getLogger()->getDbProfiling();
    }
}
