<?php

namespace employerapi\modules\v1\controllers;

use Yii;
use yii\rest\Controller;
use yii\helpers\ArrayHelper;
use yii\helpers\Url;
use yii\data\ActiveDataProvider;
use common\models\Job;
use common\models\JobOffice;
use common\models\JobQuestion;
use common\models\Payment;
use common\models\EmployerShortlist;
use common\models\StudentJobApplication;

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
		$user_id = Yii::$app->user->id;
		$query = \employerapi\models\Job::find();
		$query->where(['employer_id'=>$user_id]);
		$query->orderBy('job_id DESC');
		return new ActiveDataProvider([
			'query' => $query,
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

        $transaction = Yii::$app->db->beginTransaction();
        
        // Attempt to create new job
        $model = new Job();
        
        $model->employer_id = Yii::$app->user->getId();
        $model->jobtype_id = Yii::$app->request->getBodyParam("jobtype_id");
        $model->job_title = Yii::$app->request->getBodyParam("title");
        $model->job_startdate = Yii::$app->request->getBodyParam("startdate");
        $model->job_responsibilites = Yii::$app->request->getBodyParam("responsibilites");
        $model->job_desired_skill = Yii::$app->request->getBodyParam("desired_skill");
        $model->job_other_qualifications = Yii::$app->request->getBodyParam("other_qualifications");
        $model->job_compensation = Yii::$app->request->getBodyParam("compensation");
        $model->job_max_applicants = Yii::$app->request->getBodyParam("max_applicants");
        $model->salary = Yii::$app->request->getBodyParam("salary");
        $model->salary_currency = Yii::$app->request->getBodyParam("salary_currency");
        
        $model->job_status = Job::STATUS_DRAFT;

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

        $transaction->commit();

        return [
            "operation" => "success",
            "message" => "Job created successfully",
            "data" => $model
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
        $model->job_desired_skill = Yii::$app->request->getBodyParam("desired_skill");
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

    /**
     * List available payment to pay for job posting
     * @param  integer $id
     * @return array
     */
    public function actionPaymentMethods($id)
    {
        $job = Job::findOne([
                'job_id' => (int) $id,
                'employer_id' => Yii::$app->user->getId()
            ]);

        if(!$job) {
            return [
                "operation" => "error",
                "message" => "Job not found"
            ];
        }

        //check if job already paid 

        $payment = Payment::findOne(['job_id' => $id]);

        if($payment) 
        {
            return [
                "operation" => "error",
                "message" => "Job already paid"
            ];
        }

        $payment_methods = [];

        //check if client have sufficient credit 

        $employer_credit = Yii::$app->user->identity->employer_credit;

        $fee = Yii::$app->params['jobPostingFee'];

        if($employer_credit > $fee) 
        {
            $payment_methods['credits'] = Url::to(['payment/credits/33'], true);
        }

        return [
            "operation" => "success",
            "message" => $payment_methods
        ];
    }

    /**
     * Displays shotlist applicant
     * @return mixed
     */
    public function actionShotlistApplicant()
    {
        $application_id = Yii::$app->request->getBodyParam("application_id");

        //check if already shortlisted 

        $shortlist = EmployerShortlist::findOne([
                'employer_id' => Yii::$app->user->getId(),
                'application_id' => $application_id
            ]);        

        if($shortlist)
        {
            return [
                "operation" => "error",
                "message" => "Application already shortlisted!"
            ];
        }

        //check if employer own this job + application available 

        $application = StudentJobApplication::find()
            ->joinWith('job')
            ->where([
                    'employer_id' => Yii::$app->user->getId(),
                    'application_id' => $application_id
                ])
            ->one();

        if(!$application)
        {
            return [
                "operation" => "error",
                "message" => "Application not found!"
            ];
        }

        $shortlist = new EmployerShortlist;
        $shortlist->employer_id = Yii::$app->user->getId();
        $shortlist->application_id = $application_id;
        $shortlist->save();

        return [
            "operation" => "success",
            "message" => 'Application shortlisted successfully'
        ];
    }


    /**
     * Displays shotlisted applicants
     * @return mixed
     */
    public function actionShotlist()
    {
        $query = EmployerShortlist::find()
            ->select([
                "shortlist_id",
                "{{%employer_shortlist}}.application_id",
                "{{%student_job_application}}.student_id",
                "{{%student_job_application}}.job_id",
                "application_contacted",
                "application_hidden",
                "application_date_apply",
                "job_title",
                "job_startdate",
                "job_responsibilites",
                "job_desired_skill",
                "job_other_qualifications",
                "student_firstname",
                "student_lastname",
                "student_dob",
                "student_gender",
                "student_contact_number",
                "student_email"
            ])
            ->innerJoin('{{%student_job_application}}', '{{%student_job_application}}.application_id = {{%student_job_application}}.application_id')
            ->innerJoin('{{%student}}', '{{%student}}.student_id = {{%student_job_application}}.student_id')
            ->innerJoin('{{%job}}', '{{%job}}.job_id = {{%student_job_application}}.job_id')
            ->where(['{{%employer_shortlist}}.employer_id' => Yii::$app->user->getId()])
            ->asArray()
            ->groupBy('{{%employer_shortlist}}.shortlist_id');

        return new ActiveDataProvider([
            'query' => $query
        ]);
    }
    

    /**
     * Displays applicants for a single Job model.
     * @param integer $id
     * @return mixed
     */
    public function actionApplicants($id)
    {
        $model = Job::findOne([
            'job_id' => (int) $id,
            'employer_id' => Yii::$app->user->getId(),
        ]);

        if (!$model) {
            return [
                "operation" => "error",
                "message" => 'Job not found!'
            ];
        }

        $dataProvider = new ActiveDataProvider([
            'query' => $model->getStudentJobApplications()
                ->with(['student', 'student.university', 'student.degree', 'student.majors', 'student.country']),
        ]);

        $applications = [];
        
        foreach ($dataProvider->getModels() as $key => $application) 
        {
            $applications[$key]['meta'] = $application;
            $applications[$key]['firstname'] = $application->student->student_firstname;
            $applications[$key]['lastname'] = $application->student->student_lastname;
            $applications[$key]['photo'] = $application->student->photo;
            // $applications[$key]['university'] = $application->student->university->university_name_ar
            $applications[$key]['university'] = $application->student->university->university_name_en;
            // $applications[$key]['degree'] = $application->student->degree->degree_name_ar;
            $applications[$key]['degree'] = $application->student->degree->degree_name_en;
            $applications[$key]['enrolment'] = $application->student->student_enrolment_year;
            foreach ($application->student->majors as $key => $major) {
                // $applications[$key]['majors'][] = $major->major_name_ar;
                $applications[$key]['majors'][] = $major->major_name_en;
            }
            $applications[$key]['gpa'] = Yii::$app->formatter->asDecimal($application->student->student_gpa, 2);
            // $applications[$key]['country'] = $application->student->country->country_nationality_name_ar;
            $applications[$key]['country'] = $application->student->country->country_nationality_name_en;
            $applications[$key]['sport'] = $application->student->student_sport ? explode(",", $application->student->student_sport) : null;
            $applications[$key]['club'] = $application->student->student_club ? explode(",", $application->student->student_club) : null;
            $applications[$key]['hobby'] = $application->student->student_hobby ? explode(",", $application->student->student_hobby) : null;
        }

        return [
            "operation" => "success",
            "message" => $applications,
        ];
        
        return Yii::getLogger()->getDbProfiling();
    } 
}
