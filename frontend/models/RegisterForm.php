<?php

namespace frontend\models;

use Yii;
use yii\base\Model;

/**
 * Registration form step 1
 */
class RegisterForm extends Model
{
    public $step; //this will be used for scenario / limit the validation
    public $university;
    public $email;
    public $password;
    public $phone;
    public $idUpload; //Student ID verification in the case university requires verification
    

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            //Always required
            [['step', 'university', 'email', 'password', 'phone'], 'required'],
            
            /*
             * //Student ID verification in the case university requires verification
             * 
            ['idUpload', 'required', 'when' => function($model) {
                return $model->country == 'USA';
            }],
             * 
             */
            
            //Required on second step / Account registration
            [['step', 'university', 'email', 'password', 'phone'], 'required', 'on'=>'registerAccount'],
            
            
            //Phone Requirements
            ['phone', 'string', 'length' => 8],
            ['phone', 'integer'],
            
            //Password Requirements
            ['password', 'string', 'length' => [4, 32]],
            
            //Email Validation (unique included)
            ['email', 'filter', 'filter' => 'trim'],
            ['email', 'email'],
            ['email', 'unique', 'targetClass' => '\common\models\Student', 'targetAttribute'=>'student_email', 'message' => 'This email address has already been taken.'],
            
            //Step Validation, only 1 and 2
            ['step', 'in', 'range' => [1, 2]],
            
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
