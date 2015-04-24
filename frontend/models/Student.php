<?php

namespace frontend\models;

use Yii;

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

    /**
     * @inheritdoc
     */
    public function rules() {
        return array_merge(parent::rules(), [
            //Always required
            [['step', 'majorsSelected', 'languagesSelected'], 'required'],
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
     * Scenarios for validation, we have two scenarios
     * 1) firstStep scenario - validates a limited number of items for the first step
     * 2) default scenario - validates all attributes
     */
    public function scenarios() {
        $scenarios = parent::scenarios();
        //Validate only these attributes on firstStep
        $scenarios['registrationFirstStep'] = ['step', 'university_id', 'student_email', 'student_password_hash',
            'student_contact_number', 'student_verification_attachment'];

        return $scenarios;
    }

    /**
     * Attribute labels that are inherited are extended here
     */
    public function attributeLabels() {
        return array_merge(parent::attributeLabels(), [
            'majorsSelected' => Yii::t('app', 'Majors selected'),
            'languagesSelected' => Yii::t('app', 'Languages selected'),
            'step' => Yii::t('app', 'Step'),
        ]);
    }

    public function beforeSave($insert) {
        if (parent::beforeSave($insert)) {
            if ($insert) {
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
            $this->unlinkAll('majors');

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
            $this->unlinkAll('languages');

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
     * Sends an email requesting a user to verify his email address
     * @return boolean whether the email was sent
     */
    public function sendVerificationEmail() {
        return Yii::$app->mailer->compose([
                            'html' => 'verificationEmail-html',
                            'text' => 'verificationEmail-text',
                                ], [
                            'student' => $this
                        ])
                        ->setFrom(['contact@studenthub.co' => 'StudentHub'])
                        ->setTo($this->student_email)
                        ->setSubject('[StudentHub] Email Verification')
                        ->send();
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
            return $this;
        }

        return null;
    }

}
