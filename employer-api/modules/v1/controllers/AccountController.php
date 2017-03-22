<?php

namespace employerapi\modules\v1\controllers;

use Yii;
use yii\rest\Controller;
use yii\helpers\ArrayHelper;
use employerapi\models\Employer;

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
        return Employer::findOne(Yii::$app->user->getId());
    }

    /**
     * Update employer account info
     */
    public function actionUpdate()
    {
        $employer = Employer::findOne(Yii::$app->user->getId());
        
        $employer->scenario = 'update';
        $employer->city_id = Yii::$app->request->getBodyParam("city_id");
        $employer->industry_id = Yii::$app->request->getBodyParam("industry_id");
        $employer->employer_company_name = Yii::$app->request->getBodyParam("company_name");
        $employer->employer_website = Yii::$app->request->getBodyParam("website");
        $employer->employer_company_desc = Yii::$app->request->getBodyParam("company_desc");
        $employer->employer_num_employees = Yii::$app->request->getBodyParam("num_employees");
        $employer->employer_contact_firstname = Yii::$app->request->getBodyParam("contact_firstname");
        $employer->employer_contact_lastname = Yii::$app->request->getBodyParam("contact_lastname");
        $employer->employer_contact_number = Yii::$app->request->getBodyParam("contact_number");
        $employer->employer_email_preference = Yii::$app->request->getBodyParam("email_preference");
        $employer->employer_password_hash = Yii::$app->request->getBodyParam("password");
        $employer->employer_language_pref = Yii::$app->request->getBodyParam("language_pref");
        $employer->employer_support_field = Yii::$app->request->getBodyParam("support_field");
        $employer->employer_social_twitter = Yii::$app->request->getBodyParam("social_twitter");
        $employer->employer_social_facebook = Yii::$app->request->getBodyParam("social_facebook");
        $employer->employer_social_instagram = Yii::$app->request->getBodyParam("social_instagram");
        $employer->employer_logo = Yii::$app->request->getBodyParam("logo");

        $new_email = Yii::$app->request->getBodyParam("email");
        
        if($new_email != $employer->employer_email) 
        {
            $employer->employer_new_email = $new_email;
        }

        if(!$employer->save()) 
        {
           return [
                "operation" => "error",
                "message" => $employer->errors
            ];
        }

        Yii::info("[Employer Account Info Updated] ".$employer->employer_email, __METHOD__);

        if($employer->employer_new_email)
        {
            $employer->sendVerificationEmail();   

            return [
                "operation" => "success",
                "message" => "Employer Account Info Updated Successfully, please check email to verify new email address"
            ]; 
        }     
     
        return [
            "operation" => "success",
            "message" => "Employer Account Info Updated Successfully"
        ];
    }
}
