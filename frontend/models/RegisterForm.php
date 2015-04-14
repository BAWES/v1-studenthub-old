<?php

namespace frontend\models;

use Yii;
use yii\base\Model;

/**
 * Registration form step 1
 */
class RegisterForm extends Model
{
    public $university;
    

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            //[['name', 'email', 'subject', 'body'], 'required'],
            //['email', 'email'],
            
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
