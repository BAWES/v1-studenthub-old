<?php

namespace frontend\models;

use Yii;
use yii\db\Expression;

/**
 * This is the model class for table "student".
 * It extends from \common\models\Student but with custom functionality for front-end
 * 
 * Scenarios Include:
 * - registrationFirstStep -> for first step of registration
 * 
 */
class Student extends \common\models\Student {

    //Step 1 Requirements:
    public $step; //this will be used for scenario / limit the validation
    //majors and languages selected during registration
    public $majorsSelected;
    public $languagesSelected;
    
    public $terms; /*terms and conditions placeholder*/

    /**
     * @inheritdoc
     */
    public function rules() {
        return array_merge(parent::rules(), [
            //Always required
            [['step', 'majorsSelected', 'languagesSelected'], 'required'],
            [['terms'], 'required', 'message' => Yii::t("frontend", "Please accept the terms and conditions")],
            //Check if uploaded files exists in temporarybucket filePath (ONLY if new record)
            [['student_verification_attachment'], '\common\components\S3FileExistValidator', 'filePath' => 'temporary/',
                'message' => Yii::t("frontend", "Please upload a photo of your university id card"),
                'resourceManager' => Yii::$app->resourceManager,
                'when' => function($model) {
            if ($model->isNewRecord) {
                return true;
            }
        }],
            [['student_cv'], '\common\components\S3FileExistValidator', 'filePath' => 'temporary/',
                'message' => Yii::t("frontend", "Your CV upload is invalid"),
                'resourceManager' => Yii::$app->resourceManager,
                'when' => function($model) {
            if ($model->isNewRecord) {
                return true;
            }
        }],
            [['student_photo'], '\common\components\S3FileExistValidator', 'filePath' => 'temporary/',
                'message' => Yii::t("frontend", "Your photo upload is invalid"),
                'resourceManager' => Yii::$app->resourceManager,
                'when' => function($model) {
            if ($model->isNewRecord) {
                return true;
            }
        }],
            //Validate Major and Language selections (if selected)
            ['majorsSelected', '\common\components\ArrayValidator',
                'rule' => ['exist',
                    'targetClass' => '\common\models\Major',
                    'targetAttribute' => 'major_id',
                    'message' => \Yii::t('frontend', 'Selected major does not exist.')
                ]
            ],
            ['languagesSelected', '\common\components\ArrayValidator',
                'rule' => ['exist',
                    'targetClass' => '\common\models\Language',
                    'targetAttribute' => 'language_id',
                    'message' => \Yii::t('frontend', 'Selected language does not exist.')
                ]
            ],
            //Step Validation, only 1 and 2
            ['step', 'in', 'range' => [1, 2]],
        ]);
    }

    /**
     * Scenarios for validation and massive assignment
     */
    public function scenarios() {
        $scenarios = parent::scenarios();
        //Validate only these attributes on firstStep
        $scenarios['registrationFirstStep'] = ['step', 'university_id', 'student_email', 'student_password_hash',
            'student_contact_number', 'student_verification_attachment'];
        
        $scenarios['changeEmailPreference'] = ['student_email_preference'];
        $scenarios['changePassword'] = ['student_password_hash'];
        
        $scenarios['updatePersonalInfo'] = ['student_firstname', 'student_lastname', 'student_dob', 'student_club',
            'student_contact_number', 'student_interestingfacts', 'student_skill', 'student_hobby', 'student_sport',
            'student_experience_company', 'student_experience_position', 'languagesSelected', 'country_id',
            'student_english_level', 'student_gender', 'student_transportation'];
        
        $scenarios['updateEducationInfo'] = ['degree_id', 'majorsSelected', 'student_enrolment_year',
            'student_graduating_year', 'student_gpa'];

        return $scenarios;
    }

    /**
     * Attribute labels that are inherited are extended here
     */
    public function attributeLabels() {
        return array_merge(parent::attributeLabels(), [
            'majorsSelected' => Yii::t('app', 'Major(s) Studied'),
            'languagesSelected' => Yii::t('app', 'Languages Spoken'),
            'step' => Yii::t('app', 'Step'),
        ]);
    }
    
    
    /**
     * Populate languagesSelected variable with the current records selected languages
     */
    public function populateLanguagesSelected() {
        foreach($this->languages as $language){
            $this->languagesSelected[] = $language->language_id;
        }        
    }
    
    /**
     * Populate majorsSelected variable with the current records selected languages
     */
    public function populateMajorsSelected() {
        foreach($this->majors as $major){
            $this->majorsSelected[] = $major->major_id;
        }        
    }

    public function beforeSave($insert) {
        if (parent::beforeSave($insert)) {
            if ($insert) {
                //Set Language preference to current language
                $this->student_language_pref = Yii::$app->language;
                
                //If verification is not required for this university - set that the student identity is verified
                $university = $this->university;
                if($university){
                    if($university->university_require_verify == \common\models\University::VERIFICATION_NOT_REQUIRED){
                        $this-> student_id_verification = self::ID_VERIFIED;
                    }
                }
                
                //Move verification attachment from `temporary` bucket to `student-identification`
                if ($this->student_verification_attachment) {
                    $filename = $this->student_verification_attachment;
                    Yii::$app->resourceManager->copy("temporary/$filename", "student-identification/$filename");
                }
                //Move CV from `temporary` bucket to `student-cv`
                if ($this->student_cv) {
                    $filename = $this->student_cv;
                    Yii::$app->resourceManager->copy("temporary/$filename", "student-cv/$filename");
                }
                //Move photo from `temporary` bucket to `student-photo`
                if ($this->student_photo) {
                    $filename = $this->student_photo;
                    Yii::$app->resourceManager->copy("temporary/$filename", "student-photo/$filename");
                }
            }

            return true;
        }
    }

    public function afterSave($insert, $changedAttributes) {
        parent::afterSave($insert, $changedAttributes);

        //Linking selected majors to student
        if (is_array($this->majorsSelected)) {
            //Unlink all majors from this Student
            $this->unlinkAll('majors', true);

            //Link the new majors to this Student
            foreach ($this->majorsSelected as $majorId) {
                $major = \common\models\Major::findOne((int) $majorId);
                if ($major) {
                    $this->link('majors', $major);
                }
            }
        }

        //Linking selected languages to student
        if (is_array($this->languagesSelected)) {
            //Unlink all languages from this Student
            $this->unlinkAll('languages', true);

            //Link the new majors to this Student
            foreach ($this->languagesSelected as $languageId) {
                $language = \common\models\Language::findOne((int) $languageId);
                if ($language) {
                    $this->link('languages', $language);
                }
            }
        }
    }
    
    /**
     * Verifies the student email
     */
    public function verifyEmail() {
        //If not verified
        if($this->student_email_verification == self::EMAIL_NOT_VERIFIED){
            //Verify this students email
            $this->student_email_verification = self::EMAIL_VERIFIED;
            $this->save(false);

            Yii::info("[Email Verified] ".$this->student_firstname." ".$this->student_lastname." has verified their email", __METHOD__);

            //Link the student to currently active jobs that they qualify for
            $this->linkToActiveQualifiedJobs();
        }
    }

    /**
     * Sends an email requesting a user to verify his email address
     * @return boolean whether the email was sent
     */
    public function sendVerificationEmail() {
        //Update student last email limit timestamp
        $this->student_limit_email = new Expression('NOW()');
        $this->save(false);
        
        if($this->student_language_pref == "en-US"){
            //Set language based on preference stored in DB
            Yii::$app->view->params['isArabic'] = false;
            
            //Send English Email
            return Yii::$app->mailer->compose([
                                'html' => 'student/verificationEmail-html',
                                'text' => 'student/verificationEmail-text',
                                    ], [
                                'student' => $this
                            ])
                            ->setFrom(['contact@studenthub.co' => 'StudentHub'])
                            ->setTo($this->student_email)
                            ->setSubject('[StudentHub] Email Verification')
                            ->send();
        }else{
            //Set language based on preference stored in DB
            Yii::$app->view->params['isArabic'] = true;
            
            //Send Arabic Email
            return Yii::$app->mailer->compose([
                                'html' => 'student/verificationEmail-ar-html',
                                'text' => 'student/verificationEmail-ar-text',
                                    ], [
                                'student' => $this
                            ])
                            ->setFrom([\Yii::$app->params['supportEmail'] => \Yii::$app->name ])
                            ->setTo($this->student_email)
                            ->setSubject('[StudentHub] التحقق من البريد الإلكتروني')
                            ->send();
        }
    }

    /**
     * Signs user up.
     * @param boolean $validate - whether to validate before Signing up
     * @return static|null the saved model or null if saving fails
     */
    public function signup($validate = false) {
        $this->setPassword($this->student_password_hash);
        $this->generateAuthKey();
        if ($this->save($validate)) {
            $this->sendVerificationEmail();
            
            /**
             * Log Message about new Student Signup
             */
            $appendMessage = "";
            if($this->student_id_verification == self::ID_NOT_VERIFIED){
                $appendMessage = " and will require that their identity be verified";
            }
            Yii::info("[New Student Signup] ".$this->student_firstname." ".$this->student_lastname." has just joined StudentHub$appendMessage.", __METHOD__);
            
            /**
             * Send email here to Admins notifying that a new student has signed up
             */
            Yii::$app->mailer->compose([
                    'html' => "admin/new-student-html",
                        ], [
                    'student' => $this,
                ])
                ->setFrom([\Yii::$app->params['supportEmail'] => \Yii::$app->name ])
                ->setTo([\Yii::$app->params['supportEmail']])
                ->setSubject('[StudentHub] New Student - '.$this->student_firstname." ".$this->student_lastname)
                ->send();
            
            return $this;
        }

        return null;
    }

}
