<?php

namespace frontend\models;

use Yii;
use yii\base\Model;
use common\models\University;

/**
 * Registration form step 1
 */
class RegisterForm extends Model
{
    //Step 1 Requirements:
    public $step; //this will be used for scenario / limit the validation
    public $university;
    public $email;
    public $password;
    public $phone;
    public $idUpload; //Student ID verification image in the case university requires verification
    
    //Step 2 Requirements: (create scenario for this)
    //Make sure to pass values from step 1 to hidden fields in step 2
    

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            //Always required
            [['step', 'university', 'email', 'password', 'phone'], 'required'],
            
            //ID upload only required when university requires verification
            ['idUpload', 'required', 'message' => 'Please upload a photo of your University Id card',
                'when' => function($model) {
                if(isset($model->university)){
                    $univId = (int) $model->university;
                    $university = University::findOne($univId);
                    if($university){
                        if($university->university_require_verify == University::VERIFICATION_REQUIRED){
                            return true;
                        }
                    }
                }
                
                return false;
            }],
            
            //Required on second step / Account registration
            [['step', 'university', 'email', 'password', 'phone'], 'required', 'on'=>'registerAccount'],
            
            [['phone','university'], 'integer'],
            
            //Phone Requirements
            ['phone', 'string', 'length' => 8],
            
            //Password Requirements
            ['password', 'string', 'length' => [4, 32]],
            
            //University existence validation
            ['university', 'exist',
                'targetClass' => '\common\models\University',
                'targetAttribute' => 'university_id',
                'message' => 'This university does not exist.'
            ],
            
            //Email Validation (unique included)
            ['email', 'filter', 'filter' => 'trim'],
            ['email', 'email'],
            ['email', '\frontend\components\UniversityEmailValidator', 'universityAttribute'=>'university'],
            ['email', 'unique', 'targetClass' => '\common\models\Student', 'targetAttribute'=>'student_email', 'message' => 'This email address has already been taken.'],
            
            //Step Validation, only 1 and 2
            ['step', 'in', 'range' => [1, 2]],
            
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
