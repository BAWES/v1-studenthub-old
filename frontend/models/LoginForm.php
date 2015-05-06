<?php
namespace frontend\models;

use Yii;
use yii\base\Model;
use common\models\Student;

/**
 * Login form
 */
class LoginForm extends Model
{
    public $email;
    public $password;
    public $rememberMe = true;

    /**
     * @var \common\models\Student
     */
    private $_student = false;


    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            // email and password are both required
            [['email', 'password'], 'required'],
            // email must be an email
            ['email', 'email'],
            // rememberMe must be a boolean value
            ['rememberMe', 'boolean'],
            // password is validated by validatePassword()
            ['password', 'validatePassword'],
        ];
    }
    
    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'email' => Yii::t('app', 'Email'),
            'password' => Yii::t('app', 'Password'),
            'rememberMe' => Yii::t('app', 'Remember me'),
        ];
    }

    /**
     * Validates the password.
     * This method serves as the inline validation for password.
     *
     * @param string $attribute the attribute currently being validated
     * @param array $params the additional name-value pairs given in the rule
     */
    public function validatePassword($attribute, $params)
    {
        if (!$this->hasErrors()) {
            $student = $this->getStudent();
            if (!$student || !$student->validatePassword($this->password)) {
                $this->addError($attribute, Yii::t('app', 'Incorrect email or password.'));
            }
        }
    }

    /**
     * Logs in a student using the provided email and password.
     *
     * @return boolean whether the student is logged in successfully
     */
    public function login()
    {
        if ($this->validate()) {
            
            //Check if Student has verified his email
            $student = $this->getStudent();
            if($student){
                if($student->student_email_verification == Student::EMAIL_NOT_VERIFIED){
                    //Email not verified, show warning
                    Yii::$app->session->setFlash("warning", 
                        Yii::t('student',"Please click the verification link sent to you by email to activate your account.<br/><a href='{resendLink}'>Resend verification email</a>",[
                                'resendLink' => \yii\helpers\Url::to(["site/resend-verification", 
                                    'id' => $student->student_id,
                                    'email' => $student->student_email,
                                ]),
                            ]));
                    
                }else if($student->student_id_verification == Student::ID_NOT_VERIFIED){
                    //ID not verified, show warning
                    Yii::$app->session->setFlash("warning", 
                        Yii::t('student',"Your account will activate as soon as we verify your student identity.<br/>Please <a href='{contactLink}'>contact us</a> for any questions and assistance.",[
                                'contactLink' => \yii\helpers\Url::to(["site/contact"]),
                            ]));
                }else{
                    //Log him in
                    return Yii::$app->user->login($this->getStudent(), $this->rememberMe ? 3600 * 24 * 30 : 0);
                }
            }
        }
        
        return false;
    }

    /**
     * Finds student by email
     *
     * @return Student|null
     */
    public function getStudent()
    {
        if ($this->_student === false) {
            $this->_student = Student::findByEmail($this->email);
        }

        return $this->_student;
    }
}
