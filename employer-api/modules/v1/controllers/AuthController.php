<?php

namespace employerapi\modules\v1\controllers;

use Yii;
use yii\rest\Controller;
use yii\filters\auth\HttpBasicAuth;
use employerapi\models\Employer;

/**
 * Auth controller provides the initial access token that is required for further requests
 * It initially authorizes via Http Basic Auth using a base64 encoded username and password
 */
class AuthController extends Controller
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

        // Basic Auth accepts Base64 encoded username/password and decodes it for you
        $behaviors['authenticator'] = [
            'class' => HttpBasicAuth::className(),
            'except' => ['options'],
            'auth' => function ($email, $password) {
                $employer = Employer::findByEmail($email);
                if ($employer && $employer->validatePassword($password)) {
                    return $employer;
                }

                return null;
            }
        ];
        // avoid authentication on CORS-pre-flight requests (HTTP OPTIONS method)
        // also avoid for public actions like registration and password reset
        $behaviors['authenticator']['except'] = [
            'options',
            'verify-email',
            'validate',
            'update-password',
            'create-account',
            'request-reset-password',
            'resend-verification-email'
        ];

        return $behaviors;
    }


    /**
     * @inheritdoc
     */
    public function actions()
    {
        $actions = parent::actions();

        // Return Header explaining what options are available for next request
        $actions['options'] = [
            'class' => 'yii\rest\OptionsAction',
            // optional:
            'collectionOptions' => ['GET', 'POST', 'HEAD', 'OPTIONS'],
            'resourceOptions' => ['GET', 'PUT', 'PATCH', 'DELETE', 'HEAD', 'OPTIONS'],
        ];
        return $actions;
    }


    /**
     * Perform validation on the employer account (check if he's allowed login to platform)
     * If everything is alright,
     * Returns the BEARER access token required for futher requests to the API
     * @return array
     */
    public function actionLogin()
    {
        $employer = Yii::$app->user->identity;

        // Return Employer access token if everything valid
        $accessToken = $employer->accessToken->token_value;
        
        return [
            "operation" => "success",
            "token" => $accessToken,
            "id" => $employer->employer_id,
            "name" => $employer->employer_contact_firstname.' '.$employer->employer_contact_lastname,
            "email" => $employer->employer_email
        ];
    }

    /**
     * Creates new employer account manually
     * @return array
     */
    public function actionCreateAccount()
    {
        $model = new Employer();
        
        $model->city_id = Yii::$app->request->getBodyParam("city_id");
        $model->industry_id = Yii::$app->request->getBodyParam("industry_id");
        $model->employer_company_name = Yii::$app->request->getBodyParam("company_name");
        $model->employer_website = Yii::$app->request->getBodyParam("website");
        $model->employer_company_desc = Yii::$app->request->getBodyParam("company_desc");
        $model->employer_num_employees = Yii::$app->request->getBodyParam("num_employees");
        $model->employer_contact_firstname = Yii::$app->request->getBodyParam("contact_firstname");
        $model->employer_contact_lastname = Yii::$app->request->getBodyParam("contact_lastname");
        $model->employer_contact_number = Yii::$app->request->getBodyParam("contact_number");
        $model->employer_email_preference = Yii::$app->request->getBodyParam("email_preference");
        $model->employer_email = Yii::$app->request->getBodyParam("email");
        $model->employer_password_hash = Yii::$app->request->getBodyParam("password");
        $model->employer_language_pref = Yii::$app->request->getBodyParam("language_pref");
        $model->employer_support_field = Yii::$app->request->getBodyParam("support_field");
        $model->employer_social_twitter = Yii::$app->request->getBodyParam("social_twitter");
        $model->employer_social_facebook = Yii::$app->request->getBodyParam("social_facebook");
        $model->employer_social_instagram = Yii::$app->request->getBodyParam("social_instagram");
        $model->employer_logo = Yii::$app->request->getBodyParam("logo");

        if (!$model->signup(true))
        {
            return [
                "operation" => "error",
                "message" => $model->errors
            ];
        }

        return [
            "operation" => "success",
            "message" => "Please click on the link sent to you by email to verify your account"
        ];
    }

    /**
     * Re-send manual verification email to employer
     * @return array
     */
    public function actionResendVerificationEmail()
    {
        $emailInput = Yii::$app->request->getBodyParam("email");

        $employer = Employer::findOne([
            'employer_email' => $emailInput,
        ]);

        $errors = false;

        if ($employer) {
            $employer->sendVerificationEmail();            
        } 
        else
        {
            $errors['employer_email'] = ['Employer Account not found'];
        }

        // If errors exist show them

        if($errors){
            return [
                'operation' => 'error',
                'message' => $errors
            ];
        }

        // Otherwise return success
        return [
            'operation' => 'success',
            'message' => Yii::t('register', 'Please click on the link sent to you by email to verify your account')
        ];
    }

    /**
     * Process email verification
     * @return array
     */
    public function actionVerifyEmail()
    {
        $code = Yii::$app->request->getBodyParam("code");
        $verify = (int) Yii::$app->request->getBodyParam("verify");

        if (Employer::verifyEmail($code, $verify)) {
            return [
                'operation' => 'success',
                'message' => 'You have verified your email'
            ];
        } else {
            return [
                'operation' => 'error',
                'message' => 'Invalid email verification code. Account might already be activated. Please try to login again.'
            ];
        }
    }

    /**
     * Sends password reset email to user
     * @return array
     */
    public function actionRequestResetPassword()
    {
        $emailInput = Yii::$app->request->getBodyParam("email");

        $model = new \employerapi\models\PasswordResetRequestForm();
        
        $model->email = $emailInput;

        $errors = false;

        if ($model->validate()){

            $employer = Employer::findOne([
                'employer_email' => $model->email,
            ]);

            if ($employer && !$model->sendEmail($employer)) {
                $errors = 'Sorry, we are unable to reset password for email provided.';
            }
            
        }else if(isset($model->errors['email'])){
            $errors = $model->errors['email'];
        }

        // If errors exist show them
        if($errors){
            return [
                'operation' => 'error',
                'message' => $errors
            ];
        }

        // Otherwise return success
        return [
            'operation' => 'success',
            'message' => 'Password reset link sent, please check your email for further instructions.'
        ];
    }

    /**
     * Updates password based on passed token
     * @return array
     */
    public function actionUpdatePassword()
    {
        $token = Yii::$app->request->getBodyParam("token");
        $newPassword = Yii::$app->request->getBodyParam("newPassword");

        $staff =  Employer::findByPasswordResetToken($token);

        if(!$staff){
            return [
                'operation' => 'error',
                'message' => 'Invalid password reset token. Please request another password reset email'
            ];
        }

        if(!$newPassword) {
            return [
                'operation' => 'error',
                'message' => 'Password field required'
            ];
        }

        $staff->setPassword($newPassword);
        $staff->removePasswordResetToken();
        $staff->save(false);

        return [
            'operation' => 'success',
            'message' => 'Your password has been reset'
        ];
    }


    /**
     * Validate Google auth id_token sent from mobile
     * after a successful google login
     * @return array
     */
    public function actionValidate()
    {
        $idToken = Yii::$app->request->getBodyParam("id_token");
        $displayName = Yii::$app->request->getBodyParam("displayName");

        // Android and Web Auth Client ID
        $clientId1 = "882152609344-ahm24v4mttplse2ahf35ffe4g0r6noso.apps.googleusercontent.com";
        // iOS Auth Client ID
        $clientId2 = "882152609344-thtlv6jpmuc2ugrmnnfe3g1rb0ba5ess.apps.googleusercontent.com";

        $clientRegular = new \Google_Client(['client_id' => $clientId1]);
        $payload = $clientRegular->verifyIdToken($idToken);
        if(!$payload){
            $clientApple =  new \Google_Client(['client_id' => $clientId2]);
            $payload = $clientApple->verifyIdToken($idToken);
        }

        if ($payload)
        {
            $email = $payload['email'];
            $displayName = $displayName?$displayName:$email;
            $fullname = isset($payload['name'])?$payload['name']:$displayName;

            $existingemployer = employer::find()->where(['employer_email' => $email])->one();
            if ($existingemployer) {
                //There's already an employer with this email, update his details
                $existingemployer->employer_name = $fullname;
                $existingemployer->employer_email_verified = employer::EMAIL_VERIFIED;
                $existingemployer->generatePasswordResetToken();

                // On Save, Log him in / Send Access Token
                if ($existingemployer->save()) {
                    Yii::info("[employer Login Google Native] ".$existingemployer->employer_email, __METHOD__);

                    $accessToken = $existingemployer->accessToken->token_value;
                    return [
                        "operation" => 'success',
                        "token" => $accessToken,
                        "employerId" => $existingemployer->employer_id,
                        "name" => $existingemployer->employer_name,
                        "email" => $existingemployer->employer_email
                    ];
                }

                // If Unable to Update
                return [
                    'operation' => 'error',
                    'message' => 'Unable to update your account. Please contact us for assistance.'
                ];
            } else {
                //employer Doesn't have an account, create one for him
                $employer = new employer([
                    'employer_name' => $fullname,
                    'employer_email' => $email,
                    'employer_email_verified' => employer::EMAIL_VERIFIED,
                    'employer_limit_email' => new Expression('NOW()')
                ]);
                $employer->setPassword(Yii::$app->security->generateRandomString(6));
                $employer->generateAuthKey();
                $employer->generatePasswordResetToken();

                if ($employer->save()) {
                    //Log employer signup
                    Yii::info("[New employer Signup Google Native] ".$employer->employer_email, __METHOD__);
                    // Log him in / Send Access Token
                    $accessToken = $employer->accessToken->token_value;
                    return [
                        "operation" => 'success',
                        "token" => $accessToken,
                        "employerId" => $employer->employer_id,
                        "name" => $employer->employer_name,
                        "email" => $employer->employer_email
                    ];
                }

                return [
                    'operation' => 'error',
                    'message' => 'Unable to create your account. Please contact us for assistance.'
                ];
            }
        }

        // Default Error
        return [
            'operation' => 'error',
            'message' => 'Invalid ID token. Please contact us if this issue persists.'
        ];
    }
}
