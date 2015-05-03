<?php
namespace employer\models;

use Yii;
use yii\base\Model;
use employer\models\Employer;

/**
 * Login form
 */
class LoginForm extends Model
{
    public $email;
    public $password;
    public $rememberMe = true;

    /**
     * @var \common\models\Employer
     */
    private $_employer = false;


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
            $employer = $this->getEmployer();
            if (!$employer || !$employer->validatePassword($this->password)) {
                $this->addError($attribute, Yii::t('app', 'Incorrect email or password.'));
            }
        }
    }

    /**
     * Logs in a employer using the provided email and password.
     *
     * @return boolean whether the employer is logged in successfully
     */
    public function login()
    {
        if ($this->validate()) {
            
            //Check if Employer has verified their email
            $employer = $this->getEmployer();
            if($employer->employer_email_verification == Employer::EMAIL_VERIFIED){
                return Yii::$app->user->login($this->getEmployer(), $this->rememberMe ? 3600 * 24 * 30 : 0);
            }else{
                //Set Flash that employer needs to verify his email
                Yii::$app->session->setFlash("warning", 
                        Yii::t('employer',"Please click the verification link sent to you by email to activate your account.<br/><a href='{url}'>Contact us</a> if you need any assistance",[
                                    'url' => '#',
                                ]));
            }
        }
        
        return false;
    }

    /**
     * Finds employer by email
     *
     * @return Employer|null
     */
    public function getEmployer()
    {
        if ($this->_employer === false) {
            $this->_employer = Employer::findByEmail($this->email);
        }

        return $this->_employer;
    }
}
