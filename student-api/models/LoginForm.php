<?php

namespace studentapi\models;

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
                $this->addError($attribute, 'Incorrect email or password.');
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
            return Yii::$app->user->login($this->getStudent(), $this->rememberMe ? 3600 * 24 * 30 : 0);
        } else {
            Yii::error("[Employer Login Attempt Failed] ".$this->email, __METHOD__);
            return false;
        }
    }

    /**
     * Finds student by [[username]]
     *
     * @return student|null
     */
    public function getStudent()
    {
        if ($this->_student === false) {
            $this->_student = Student::findByEmail($this->email);
        }

        return $this->_student;
    }
}
