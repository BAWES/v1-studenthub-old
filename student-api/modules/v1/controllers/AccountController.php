<?php

namespace studentapi\modules\v1\controllers;

use Yii;
use yii\rest\Controller;
use yii\helpers\ArrayHelper;
use common\models\Student;

/**
 * Account controller will return the actual Instagram Accounts and all controls associated
 */
class AccountController extends Controller
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
     * Return account details
     */ 
    public function actionDetail()
    {
        return Student::findOne(Yii::$app->user->getId());
    }

    /**
     * Update student account info
     */
    public function actionUpdate()
    {
        $student = Student::findOne(Yii::$app->user->getId());

        if ($student) {
            $student->scenario = 'updatePersonalInfo';
            // $student->populateLanguagesSelected();
            $data = [
                'student_firstname' => Yii::$app->request->getBodyParam('firstname'),
                'student_lastname' => Yii::$app->request->getBodyParam('lastname'),
                'student_dob' => Yii::$app->request->getBodyParam('dob'),
                'student_club' => Yii::$app->request->getBodyParam('club'),
                'student_contact_number' => Yii::$app->request->getBodyParam('contact_number'),
                'student_interestingfacts' => Yii::$app->request->getBodyParam('interestingfacts'),
                'student_skill' => Yii::$app->request->getBodyParam('skill'),
                'student_hobby' => Yii::$app->request->getBodyParam('hobby'),
                'student_sport' => Yii::$app->request->getBodyParam('sport'),
                'student_experience_company' => Yii::$app->request->getBodyParam('experience_company'),
                'student_experience_position' => Yii::$app->request->getBodyParam('experience_position'),
                // 'languagesSelected' => Yii::$app->request->getBodyParam('languagesSelected'),
                // 'country_id' => Yii::$app->request->getBodyParam('country_id'),
                'student_english_level' => Yii::$app->request->getBodyParam('english_level'),
                'student_gender' => Yii::$app->request->getBodyParam('gender'),
                'student_transportation' => Yii::$app->request->getBodyParam('transportation'),
            ];
            $student->setAttributes($data);
                

            if(!$student->save()) 
            {
                return [
                    "operation" => "error",
                    "message" => $student->errors
                ];
            }

            Yii::info("[Student Account Info Updated] ".$student->student_email, __METHOD__);

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
     * Return a List of Accounts Managed by User
     */
    public function actionList()
    {
        // Get cached managed accounts list from account manager component
        $managedAccounts = Yii::$app->accountManager->managedAccounts;

        return $managedAccounts;
    }

    /**
     * Return stats records for account with $accountId
     */
    public function actionStats($accountId)
    {
        // Get Instagram account from Account Manager component
        $instagramAccount = Yii::$app->accountManager->getManagedAccount($accountId);

        $records = $instagramAccount->records;
        return $records;

        // Check SQL Query Count and Duration
        return Yii::getLogger()->getDbProfiling();
    }
}
