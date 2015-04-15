<?php

namespace frontend\models;

use Yii;
use yii\base\Model;

/**
 * Registration form step 1
 */
class RegisterForm extends Model
{
    public $step = 1; //this will be used for scenario / limit the validation
    public $university;
    public $email;
    public $password;
    public $phone;
    

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['university', 'email', 'password', 'phone'], 'required'],
            
            //Email Validation (unique included)
            ['email', 'filter', 'filter' => 'trim'],
            ['email', 'email'],
            ['email', 'unique', 'targetClass' => '\common\models\Student', 'targetAttribute'=>'student_email', 'message' => 'This email address has already been taken.'],
            
            //University existence validation
            ['university', 'exist',
                'targetClass' => '\common\models\University',
                'targetAttribute' => 'university_id',
                'message' => 'This university does not exist.'
            ],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            //'verifyCode' => 'Verification Code',
        ];
    }

    /**
     * Sends an email to the specified email address using the information collected by this model.
     *
     * @param  string  $email the target email address
     * @return boolean whether the email was sent
     */
    public function sendEmail($email)
    {
        return Yii::$app->mailer->compose()
            ->setTo($email)
            ->setFrom([$this->email => $this->name])
            ->setSubject($this->subject)
            ->setTextBody($this->body)
            ->send();
    }
}
