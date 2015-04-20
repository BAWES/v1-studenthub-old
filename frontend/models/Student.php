<?php

namespace frontend\models;

use Yii;

/**
 * This is the model class for table "student".
 * It extends from \common\models\Student but with custom functionality for front-end
 * 
 * Scenarios Include:
 * - firstStep -> for first step of registration
 * 
 */
class Student extends \common\models\Student
{
    //Step 1 Requirements:
    public $step; //this will be used for scenario / limit the validation
    
    //majors and languages selected during registration
    public $majorsSelected;
    public $languagesSelected;
    
    
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return array_merge(parent::rules(),[
            //Always required
            [['step', 'majorsSelected', 'languagesSelected'], 'required'],
            
            //Check if uploaded id image exists in temporarybucket filePath (ONLY if new record)
            ['student_verfication_attachment', '\common\components\S3FileExistValidator', 'filePath'=>'temporary/',
                'resourceManager' => Yii::$app->resourceManager, 
                'when' => function($model){
                if($model->isNewRecord){
                    return true;
                }
            }],
            
            //Validate Major and Language selections (if selected)
            ['majorsSelected', '\common\components\ArrayValidator',
                'rule'=>['exist', 
                    'targetClass' => '\common\models\Major',
                    'targetAttribute' => 'major_id',
                    'message' => \Yii::t('frontend','Selected major does not exist.')
                    ]
                ],
            ['languagesSelected', '\common\components\ArrayValidator',
                'rule'=>['exist', 
                    'targetClass' => '\common\models\Language',
                    'targetAttribute' => 'language_id',
                    'message' => \Yii::t('frontend','Selected language does not exist.')
                    ]
                ],
            
            
            //Step Validation, only 1 and 2
            ['step', 'in', 'range' => [1, 2]],
        ]);
    }
    
    /**
     * Scenarios for validation, we have two scenarios
     * 1) firstStep scenario - validates a limited number of items for the first step
     * 2) default scenario - validates all attributes
     */
    public function scenarios() {
        $scenarios = parent::scenarios();
        //Validate only these attributes on firstStep
        $scenarios['registrationFirstStep'] = ['step', 'university_id', 'student_email', 'student_password_hash', 
                                        'student_contact_number', 'student_verfication_attachment'];
        
        return $scenarios;
    }
    
    public function attributeLabels() {
        return array_merge(parent::attributeLabels(),[
            'majorsSelected' => Yii::t('app', 'Majors selected'),
            'languagesSelected' => Yii::t('app', 'Languages selected'),
            'step' => Yii::t('app', 'Step'),
        ]);
    }

    
    /**
     * Signs user up.
     *
     * @return User|null the saved model or null if saving fails
     */
    public function signup()
    {
        //This signup code was taken when we were using RegisterForm model for signup
        //It used to have the logic for creation of students within that model
        //now that our data is within the same activerecord model, signup might aswell trigger save for itself
        //then return an instance of itself (static)
        
        /*if ($this->validate()) {
            $admin = new Admin();
            $admin->admin_name = $this->name;
            $admin->admin_email = $this->email;
            $admin->setPassword($this->password);
            $admin->generateAuthKey();
            if ($admin->save()) {
                return $admin;
            }
        }*/
        
        return null;
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
