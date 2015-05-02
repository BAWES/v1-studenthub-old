<?php
namespace employer\controllers;

use Yii;
use yii\filters\AccessControl;
use yii\web\Controller;
use employer\models\LoginForm;
use employer\models\Employer;
use yii\filters\VerbFilter;

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
    public function actions()
    {
        return [
            'error' => [
                'class' => 'yii\web\ErrorAction',
            ],
        ];
    }

    public function actionIndex()
    {
        return $this->render('index');
    }
    
    
    public function actionRegister()
    {
        $model = new \employer\models\Employer();
        
        if ($model->load(Yii::$app->request->post())) {
            if($model->validate()){
                $model->signup();
                    //Render/Redirect to a thank you page here
                    //Similar to Student Model

                    //However activation action will automatically log them in / redirect to portal
                
            }else{
                foreach($model->errors as $error => $errorText){
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
        $employer = Employer::findOne(['employer_auth_key'=>$code, 'employer_id' => (int) $verify]);
        if($employer){
            //If not verified
            if($employer->employer_email_verification == Employer::EMAIL_NOT_VERIFIED){
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
            throw new \yii\web\BadRequestHttpException(Yii::t('register', 'Invalid email verification code'));
        }
    }
    

    public function actionLogin()
    {
        if (!\Yii::$app->user->isGuest) {
            return $this->goHome();
        }

        $model = new \employer\models\LoginForm();
        if ($model->load(Yii::$app->request->post()) && $model->login()) {
            return $this->goBack();
        } else {
            return $this->render('login', [
                'model' => $model,
            ]);
        }
    }

    public function actionLogout()
    {
        Yii::$app->user->logout();

        return $this->goHome();
    }
    
    public function actionRequestPasswordReset()
    {
        $model = new PasswordResetRequestForm();
        if ($model->load(Yii::$app->request->post()) && $model->validate()) {
            if ($model->sendEmail()) {
                Yii::$app->getSession()->setFlash('success', 'Check your email for further instructions.');

                return $this->goHome();
            } else {
                Yii::$app->getSession()->setFlash('error', 'Sorry, we are unable to reset password for email provided.');
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
            Yii::$app->getSession()->setFlash('success', 'New password was saved.');

            return $this->goHome();
        }

        return $this->render('resetPassword', [
            'model' => $model,
        ]);
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
            $user = \common\models\Employer::findOne((int) Yii::$app->user->id);
            $user->employer_language_pref = 'en-US';
            $user->save();
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
            $user = \common\models\Employer::findOne((int) Yii::$app->user->id);
            $user->employer_language_pref = 'ar-KW';
            $user->save();
        }
        
        //return to previous page before language selection
        return $this->redirect(Yii::$app->request->referrer);
    }
}
