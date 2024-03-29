<?php
namespace frontend\controllers;

use Yii;
use frontend\models\LoginForm;
use frontend\models\PasswordResetRequestForm;
use frontend\models\ResetPasswordForm;
use common\models\ContactForm;
use frontend\models\Student;
use yii\base\InvalidParamException;
use yii\web\BadRequestHttpException;
use yii\web\Controller;
use yii\filters\VerbFilter;
use yii\filters\AccessControl;

/**
 * Site controller
 */
class SiteController extends Controller
{
    /**
     * @inheritdoc
     */
    public function behaviors()
    {
        return [
            'access' => [
                'class' => AccessControl::className(),
                'only' => ['logout'],
                'rules' => [
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
    public function actions()
    {
        return [
            'error' => [
                'class' => 'yii\web\ErrorAction',
            ],
            'captcha' => [
                'class' => 'yii\captcha\CaptchaAction',
                'fixedVerifyCode' => YII_ENV_TEST ? 'testme' : null,
            ],
        ];
    }

    public function actionIndex()
    {
        if(!Yii::$app->user->isGuest){
            return $this->redirect(['job/index']);
        }
        
        return $this->render('index');
    }
    
    /**
     * Promotions and Discounts Page
     */
    public function actionPromotions()
    {
        return $this->render('promotions');
    }
    
    /**
     * Employers on StudentHub Page
     */
    public function actionEmployers()
    {
        return $this->render('employers');
    }

    /**
     * Terms and Conditions Page
     */
    public function actionTermsConditions()
    {
        return $this->render('terms');
    }
    
    /**
     * Privacy Policy Page
     */
    public function actionPrivacyPolicy()
    {
        return $this->render('privacy');
    }
    
    /**
     * Demo Page
     */
    public function actionDemo()
    {
        return $this->render('demo');
    }

    
    public function actionLogin()
    {
        if (!Yii::$app->user->isGuest) {
            return $this->goHome();
        }

        $model = new LoginForm();
        
        //If this is demo platform, specify login access details from start
        if(Yii::$app->params['isDemo']){
            $model->email = "demo@studenthub.co";
            $model->password = "demo1";
        }
        
        if ($model->load(Yii::$app->request->post()) && $model->login()) {
            return $this->goBack();
        } else {
            return $this->render('login', [
                'model' => $model,
            ]);
        }
    }
    
    //Test function - for testing random things
    public function actionTest()
    {
        //Random test stuff
    }

    public function actionLogout()
    {
        Yii::$app->user->logout();

        return $this->goHome();
    }

    public function actionContact()
    {
        $model = new ContactForm();
        if ($model->load(Yii::$app->request->post()) && $model->validate()) {
            if ($model->sendEmail(Yii::$app->params['adminEmail'])) {
                Yii::$app->session->setFlash('success', Yii::t('frontend', 'Thank you for contacting us. We will respond to you as soon as possible.'));
            } else {
                Yii::$app->session->setFlash('error', Yii::t('frontend', 'There was an error sending email.'));
            }

            return $this->refresh();
        } else {
            return $this->render('contact', [
                'model' => $model,
            ]);
        }
    }
    
    /**
     * Resend verification email
     * @param int $id the id of the user
     * @param string $email the email of the user
     */
    public function actionResendVerification($id, $email) {
        $student = Student::findOne([
                    'student_id' => (int) $id,
                    'student_email' => $email,
        ]);

        if ($student) {
            //Check if this user sent an email in past few minutes (to limit email spam)
            $emailLimitDatetime = new \DateTime($student->student_limit_email);
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
                
            } else if ($student->student_email_verification == Student::EMAIL_NOT_VERIFIED) {
                $student->sendVerificationEmail();
                Yii::$app->getSession()->setFlash('success', Yii::t('register', 'Please click on the link sent to you by email to verify your account'));
            }
        }
        
        return $this->redirect(['login']);
    }
    
    /**
     * Clear Notifications
     * Sets all notifications for this student as read
     */
    public function actionClearNotifications() {
        $userId = Yii::$app->user->identity->student_id;

        //If User logged in, clear his notifications
        if ($userId) {
            //$user = \common\models\Employer::findOne((int) $identity->employer_id);
            \common\models\NotificationStudent::updateAll([
                    'notification_viewed' => \common\models\NotificationStudent::VIEWED_TRUE,
                ], [
                    'student_id' => $userId,
                ]);
        }

        //return to previous page after clearing notifications
        return $this->redirect(Yii::$app->request->referrer);
    }
    
    //set language to English
    public function actionEnglish()
    {
        $cookies = Yii::$app->response->cookies;
        $cookies->remove('language');
        $cookies->add(new \yii\web\Cookie([
            'name' => 'language',
            'value' => 'en-US',
        ]));
        
        //If User logged in, update his language preference
        if (Yii::$app->user->id) {
            $user = \common\models\Student::findOne((int) Yii::$app->user->id);
            $user->student_language_pref = 'en-US';
            $user->save(false);
        }
        
        //return to previous page before language selection
        return $this->redirect(Yii::$app->request->referrer);
    }
    
    //set language to Arabic
    public function actionArabic()
    {
        $cookies = Yii::$app->response->cookies;
        $cookies->remove('language');
        $cookies->add(new \yii\web\Cookie([
            'name' => 'language',
            'value' => 'ar-KW',
        ]));
        
        //If User logged in, update his language preference
        if (Yii::$app->user->id) {
            $user = \common\models\Student::findOne((int) Yii::$app->user->id);
            $user->student_language_pref = 'ar-KW';
            $user->save(false);
        }
        
        //return to previous page before language selection
        return $this->redirect(Yii::$app->request->referrer);
    }


    public function actionRequestPasswordReset()
    {
        //If demo, redirect to employer signup on live site
        if(Yii::$app->params['isDemo']){
            return $this->redirect("https://studenthub.co/site/request-password-reset");
        }
        
        $model = new PasswordResetRequestForm();
        if ($model->load(Yii::$app->request->post()) && $model->validate()) {
            
            $student = Student::findOne([
                'student_email' => $model->email,
            ]);
            
            if($student){
                //Check if this user sent an email in past few minutes (to limit email spam)
                $emailLimitDatetime = new \DateTime($student->student_limit_email);
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
                } else if ($model->sendEmail($student)) {
                    Yii::$app->getSession()->setFlash('success', Yii::t('student', 'Password reset link sent, please check your email for further instructions.'));

                    return $this->redirect(['login']);
                } else {
                    Yii::$app->getSession()->setFlash('error', Yii::t('student', 'Sorry, we are unable to reset password for email provided.'));
                }
            }
        }

        return $this->render('requestPasswordResetToken', [
            'model' => $model,
        ]);
    }

    public function actionResetPassword($token)
    {
        try {
            $model = new ResetPasswordForm($token);
        } catch (InvalidParamException $e) {
            throw new BadRequestHttpException($e->getMessage());
        }

        if ($model->load(Yii::$app->request->post()) && $model->validate() && $model->resetPassword()) {
            Yii::$app->getSession()->setFlash('success', Yii::t('student', 'New password was saved.'));

            return $this->redirect(['login']);
        }

        return $this->render('resetPassword', [
            'model' => $model,
        ]);
    }
}
