<?php

namespace employer\controllers;

use Yii;
use yii\filters\AccessControl;
use yii\web\Controller;
use yii\base\InvalidParamException;
use yii\web\BadRequestHttpException;
use employer\models\LoginForm;
use common\models\ContactForm;
use employer\models\PasswordResetRequestForm;
use employer\models\ResetPasswordForm;
use employer\models\Employer;
use yii\filters\VerbFilter;
use yii\web\UploadedFile;

/**
 * Site controller
 */
class SiteController extends Controller {

    /**
     * @inheritdoc
     */
    public function behaviors() {
        return [
            'access' => [
                'class' => AccessControl::className(),
                'only' => ['logout', 'register'],
                'rules' => [
                    [
                        'actions' => ['register'],
                        'allow' => true,
                        'roles' => ['?'],
                    ],
                    [
                        'actions' => ['logout'],
                        'allow' => true,
                        'roles' => ['@'],
                    ],
                ],
            ],
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'logout' => ['post'],
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

    public function actionIndex() {
        if(!Yii::$app->user->isGuest){
            return $this->redirect(['dashboard/index']);
        }
        
        return $this->render('index');
    }

    public function actionRegister() {
        $model = new \employer\models\Employer();

        if ($model->load(Yii::$app->request->post())) {
            $model->employer_logo = UploadedFile::getInstance($model, 'employer_logo');

            if ($model->validate()) {
                if ($model->employer_logo) {
                    //file upload is valid - Upload file to amazon S3
                    $model->uploadLogo();
                }

                $model->signup();
                return $this->render('thanks');
            } else {
                foreach ($model->errors as $error => $errorText) {
                    Yii::$app->getSession()->setFlash('error', $errorText);
                }
            }
        }

        return $this->render('register', [
                    'model' => $model,
        ]);
    }

    /**
     * Email verification by clicking on link in email which includes the code that will verify
     * @param string $code Verification key that will verify your account
     * @param int $verify Employer ID to verify
     * @throws NotFoundHttpException if the code is invalid
     */
    public function actionEmailVerify($code, $verify) {
        //Code is his auth key, check if code is valid
        $employer = Employer::findOne(['employer_auth_key' => $code, 'employer_id' => (int) $verify]);
        if ($employer) {
            //If not verified
            if ($employer->employer_email_verification == Employer::EMAIL_NOT_VERIFIED) {
                //Verify this employers  email
                $employer->employer_email_verification = Employer::EMAIL_VERIFIED;
                $employer->save(false);

                //Log him in
                Yii::$app->user->login($employer, 0);
            }

            //Render thanks for verifying + Button to go to his portal
            return $this->render('verified');
        } else {
            //inserted code is invalid
            throw new BadRequestHttpException(Yii::t('register', 'Invalid email verification code'));
        }
    }

    public function actionLogin() {
        if (!\Yii::$app->user->isGuest) {
            return $this->goHome();
        }

        $model = new LoginForm();
        if ($model->load(Yii::$app->request->post()) && $model->login()) {
            return $this->goBack();
        } else {
            return $this->render('login', [
                        'model' => $model,
            ]);
        }
    }

    public function actionLogout() {
        Yii::$app->user->logout();

        return $this->goHome();
    }

    public function actionRequestPasswordReset() {
        $model = new PasswordResetRequestForm();
        if ($model->load(Yii::$app->request->post()) && $model->validate()) {

            $employer = Employer::findOne([
                        'employer_email' => $model->email,
            ]);

            if ($employer) {
                //Check if this user sent an email in past few minutes (to limit email spam)
                $emailLimitDatetime = new \DateTime($employer->employer_limit_email);
                date_add($emailLimitDatetime, date_interval_create_from_date_string('4 minutes'));
                $currentDatetime = new \DateTime();

                if ($currentDatetime < $emailLimitDatetime) {
                    $difference = $currentDatetime->diff($emailLimitDatetime);
                    $minuteDifference = (int) $difference->i;
                    $secondDifference = (int) $difference->s;

                    $warningMessage = Yii::t('app', "Email was sent previously, you may request another one in {numMinutes, number} minutes and {numSeconds, number} seconds", [
                                'numMinutes' => $minuteDifference,
                                'numSeconds' => $secondDifference,
                    ]);

                    Yii::$app->getSession()->setFlash('warning', $warningMessage);
                } else if ($model->sendEmail($employer)) {
                    Yii::$app->getSession()->setFlash('success', Yii::t('employer', 'Password reset link sent, please check your email for further instructions.'));

                    return $this->redirect(['login']);
                } else {
                    Yii::$app->getSession()->setFlash('error', Yii::t('employer', 'Sorry, we are unable to reset password for email provided.'));
                }
            }
        }

        return $this->render('requestPasswordResetToken', [
                    'model' => $model,
        ]);
    }

    public function actionResetPassword($token) {
        try {
            $model = new ResetPasswordForm($token);
        } catch (InvalidParamException $e) {
            throw new BadRequestHttpException($e->getMessage());
        }

        if ($model->load(Yii::$app->request->post()) && $model->validate() && $model->resetPassword()) {
            Yii::$app->getSession()->setFlash('success', Yii::t('employer', 'New password was saved.'));

            return $this->redirect(['login']);
        }

        return $this->render('resetPassword', [
                    'model' => $model,
        ]);
    }

    /**
     * Resend verification email
     * @param int $id the id of the user
     * @param string $email the email of the user
     */
    public function actionResendVerification($id, $email) {
        $employer = Employer::findOne([
                    'employer_id' => (int) $id,
                    'employer_email' => $email,
        ]);

        if ($employer) {
            //Check if this user sent an email in past few minutes (to limit email spam)
            $emailLimitDatetime = new \DateTime($employer->employer_limit_email);
            date_add($emailLimitDatetime, date_interval_create_from_date_string('4 minutes'));
            $currentDatetime = new \DateTime();

            if ($currentDatetime < $emailLimitDatetime) {
                $difference = $currentDatetime->diff($emailLimitDatetime);
                $minuteDifference = (int) $difference->i;
                $secondDifference = (int) $difference->s;

                $warningMessage = Yii::t('app', "Email was sent previously, you may request another one in {numMinutes, number} minutes and {numSeconds, number} seconds", [
                            'numMinutes' => $minuteDifference,
                            'numSeconds' => $secondDifference,
                ]);

                Yii::$app->getSession()->setFlash('warning', $warningMessage);
                
            } else if ($employer->employer_email_verification == Employer::EMAIL_NOT_VERIFIED) {
                $employer->sendVerificationEmail();
                Yii::$app->getSession()->setFlash('success', Yii::t('register', 'Please click on the link sent to you by email to verify your account'));
            }
        }
        
        return $this->redirect(['login']);
    }
    
    public function actionContact()
    {
        $model = new ContactForm();
        if ($model->load(Yii::$app->request->post()) && $model->validate()) {
            if ($model->sendEmail(Yii::$app->params['adminEmail'])) {
                Yii::$app->session->setFlash('success', 'Thank you for contacting us. We will respond to you as soon as possible.');
            } else {
                Yii::$app->session->setFlash('error', 'There was an error sending email.');
            }

            return $this->refresh();
        } else {
            return $this->render('contact', [
                'model' => $model,
            ]);
        }
    }

    //set language to English
    public function actionEnglish() {
        $cookies = Yii::$app->response->cookies;
        $cookies->remove('language');
        $cookies->add(new \yii\web\Cookie([
            'name' => 'language',
            'value' => 'en-US',
        ]));

        //If User logged in, update his language preference
        if (Yii::$app->user->id) {
            $user = \common\models\Employer::findOne((int) Yii::$app->user->id);
            $user->employer_language_pref = 'en-US';
            $user->save();
        }

        //return to previous page before language selection
        return $this->redirect(Yii::$app->request->referrer);
    }

    //set language to Arabic
    public function actionArabic() {
        $cookies = Yii::$app->response->cookies;
        $cookies->remove('language');
        $cookies->add(new \yii\web\Cookie([
            'name' => 'language',
            'value' => 'ar-KW',
        ]));

        //If User logged in, update his language preference
        if (Yii::$app->user->id) {
            $user = \common\models\Employer::findOne((int) Yii::$app->user->id);
            $user->employer_language_pref = 'ar-KW';
            $user->save();
        }

        //return to previous page before language selection
        return $this->redirect(Yii::$app->request->referrer);
    }

}
