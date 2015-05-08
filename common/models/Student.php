<?php

namespace common\models;

use Yii;
use yii\base\NotSupportedException;
use yii\behaviors\TimestampBehavior;
use yii\db\Expression;
use yii\web\IdentityInterface;
use common\models\University;
use yii\helpers\Url;

/**
 * This is the model class for table "student".
 *
 * @property integer $student_id
 * @property integer $degree_id
 * @property integer $country_id
 * @property integer $university_id
 * @property string $student_firstname
 * @property string $student_lastname
 * @property string $student_dob
 * @property integer $student_status
 * @property string $student_enrolment_year
 * @property string $student_graduating_year
 * @property string $student_gpa
 * @property integer $student_english_level 
 * @property integer $student_gender
 * @property integer $student_transportation
 * @property string $student_contact_number
 * @property string $student_interestingfacts
 * @property string $student_photo
 * @property string $student_cv
 * @property string $student_skill
 * @property string $student_hobby
 * @property string $student_club
 * @property string $student_sport
 * @property string $student_experience_company
 * @property string $student_experience_position
 * @property string $student_verification_attachment
 * @property integer $student_email_verification
 * @property integer $student_id_verification
 * @property string $student_id_number
 * @property integer $student_email_preference
 * @property string $student_email
 * @property string $student_auth_key
 * @property string $student_password_hash
 * @property string $student_password_reset_token
 * @property string $student_language_pref
 * @property integer $student_banned 
 * @property string $student_limit_email
 * @property string $student_updated_datetime
 * @property string $student_datetime
 *
 * @property NotificationEmployer[] $notificationEmployers
 * @property NotificationStudent[] $notificationStudents
 * @property Degree $degree
 * @property University $university
 * @property Country $country
 * @property StudentJobApplication[] $studentJobApplications
 * @property StudentLanguage[] $studentLanguages
 * @property Language[] $languages
 * @property StudentMajor[] $studentMajors
 * @property Major[] $majors
 */
class Student extends \yii\db\ActiveRecord implements IdentityInterface {
    //Status values for `student_status`
    const STATUS_FULL_TIME = 1;
    const STATUS_PART_TIME = 0;
    //Gender values for `student_gender`
    const GENDER_MALE = 1;
    const GENDER_FEMALE = 0;
    //Email verification values for `student_email_verification`
    const EMAIL_VERIFIED = 1;
    const EMAIL_NOT_VERIFIED = 0;
    //ID verification values for `student_id_verification`
    //If this students university does not require ID verification, this will automatically be set to ID_VERIFIED
    const ID_VERIFIED = 1;
    const ID_NOT_VERIFIED = 0;
    //Email notification preference values for `student_email_preference`
    const NOTIFICATION_OFF = 0;
    const NOTIFICATION_DAILY = 1;
    const NOTIFICATION_WEEKLY = 2;
    //Transportation options for `student_transportation`
    const TRANSPORTATION_AVAILABLE = 1;
    const TRANSPORTATION_NOT_AVAILABLE = 0;
    //Ban options for `student_banned`
    const BAN_STUDENT_BANNED = 1;
    const BAN_STUDENT_NOT_BANNED = 0;
    //English level options for `student_english_level`
    const ENGLISH_WEAK = 0;
    const ENGLISH_FAIR = 1;
    const ENGLISH_GOOD = 2;

    /**
     * @inheritdoc
     */
    public static function tableName() {
        return 'student';
    }

    /**
     * @inheritdoc
     */
    public function rules() {
        return [
            //Required
            [['degree_id', 'country_id', 'university_id', 'student_firstname', 'student_lastname', 'student_english_level', 
                'student_dob', 'student_status', 'student_enrolment_year', 'student_graduating_year', 'student_gpa', 
                'student_gender', 'student_contact_number', 'student_email_preference', 'student_email', 
                'student_password_hash', 'student_transportation'], 'required'],
            //Default values / optional fields for massive assignment
            [['student_cv','student_photo','student_verification_attachment','student_club','student_interestingfacts', 'student_id_number',
                'student_skill', 'student_hobby', 'student_sport', 'student_experience_company', 'student_experience_position'], 'default'],
            ['student_language_pref', 'default', 'value' => 'en-US'],
            ['student_email_preference', 'default', 'value' => self::NOTIFICATION_DAILY],
            
            //Enrolment year canot be higher than graduation year
            ['student_enrolment_year', 'compare', 'compareAttribute' => 'student_graduating_year', 'operator' => '<=',
                'message' => \Yii::t('frontend','Enrollment year must be before graduation year.')],
            
            //ID upload only required when university requires verification
            ['student_verification_attachment', 'required', 'message' => \Yii::t('frontend','Please upload a photo of your university id card'),
                'when' => function($model) {
                if(isset($model->university_id)){
                    $univId = (int) $model->university_id;
                    $university = University::findOne($univId);
                    if($university){
                        if($university->university_require_verify == University::VERIFICATION_REQUIRED){
                            return true;
                        }
                    }
                }
                
                return false;
            }],
                    
            //Check if uploaded id image exists in resourceManager bucket filePath (only if old record)
            ['student_verification_attachment', '\common\components\S3FileExistValidator', 'filePath'=>'student-identification/',
                'resourceManager' => Yii::$app->resourceManager, 
                'when' => function($model){
                if(!$model->isNewRecord){
                    return true;
                }
            }],
            //Check if uploaded cv exists in resourceManager bucket filePath (only if old record)
            ['student_cv', '\common\components\S3FileExistValidator', 'filePath'=>'student-cv/',
                'resourceManager' => Yii::$app->resourceManager, 
                'when' => function($model){
                if(!$model->isNewRecord){
                    return true;
                }
            }],
            //Check if uploaded photo exists in resourceManager bucket filePath (only if old record)
            ['student_photo', '\common\components\S3FileExistValidator', 'filePath'=>'student-photo/',
                'resourceManager' => Yii::$app->resourceManager, 
                'when' => function($model){
                if(!$model->isNewRecord){
                    return true;
                }
            }],
            
            
            //Numeric Validation
            [['student_contact_number', 'degree_id', 'country_id', 'university_id'], 'integer'],
            [['student_gpa'], 'number', 'min' => 0.1, 'max' => 4],
                    
            //Convert Arabic Numeric Input to English
            [['student_gpa'], '\common\components\ArabicNumberValidator'],
                    
            //Date Validation
            [['student_enrolment_year', 'student_graduating_year'], 'date', 'format' => 'yyyy'],
            [['student_dob'], 'date', 'format' => 'yyyy/MM/dd', 'message' => \Yii::t('frontend','The format of your date of birth is invalid, should be yyyy/mm/dd')],
            [['student_dob'], '\common\components\AgeValidator', 'min' => 16 ],
            
            //Length Requirements
            ['student_contact_number', 'string', 'length' => 8],
            ['student_password_hash', 'string', 'length' => [5]],
                    
            //University existence validation
            ['university_id', 'exist',
                'targetClass' => '\common\models\University',
                'targetAttribute' => 'university_id',
                'message' => \Yii::t('frontend','This university does not exist.')
            ],
            
            //Unique emails
            ['student_email', 'filter', 'filter' => 'trim'],
            ['student_email', 'email'],
            ['student_email', 'unique', 'targetClass' => '\common\models\Student', 
                'message' => \Yii::t('frontend','This email address is already registered.')],
            ['student_email', '\common\components\UniversityEmailValidator', 'universityAttribute'=>'university_id'],
            
            //Constant options
            ['student_status', 'in', 'range' => [self::STATUS_FULL_TIME, self::STATUS_PART_TIME]],
            ['student_gender', 'in', 'range' => [self::GENDER_MALE, self::GENDER_FEMALE]],
            ['student_transportation', 'in', 'range' => [self::TRANSPORTATION_AVAILABLE, self::TRANSPORTATION_NOT_AVAILABLE]],
            ['student_email_preference', 'in', 'range' => [self::NOTIFICATION_OFF, self::NOTIFICATION_DAILY, self::NOTIFICATION_WEEKLY]],
            ['student_english_level', 'in', 'range' => [self::ENGLISH_WEAK, self::ENGLISH_GOOD, self::ENGLISH_FAIR]],
        ];
    }
    
    public function behaviors() {
        return [
            [
                'class' => TimestampBehavior::className(),
                'createdAtAttribute' => 'student_datetime',
                'updatedAtAttribute' => 'student_updated_datetime',
                'value' => new Expression('NOW()'),
            ],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels() {
        return [
            'student_id' => Yii::t('app', 'Student ID'),
            'degree_id' => Yii::t('app', 'Degree'),
            'country_id' => Yii::t('app', 'Nationality'),
            'university_id' => Yii::t('app', 'University'),
            'student_firstname' => Yii::t('app', 'First Name'),
            'student_lastname' => Yii::t('app', 'Last Name'),
            'student_dob' => Yii::t('app', 'Date of Birth'),
            'student_status' => Yii::t('app', 'Status'),
            'student_enrolment_year' => Yii::t('app', 'University Enrollment Year'),
            'student_graduating_year' => Yii::t('app', 'University Graduating Year'),
            'student_gpa' => Yii::t('app', 'GPA'),
            'student_english_level' => Yii::t('app', 'English Level'),
            'student_gender' => Yii::t('app', 'Gender'),
            'student_transportation' => Yii::t('app', 'Transportation'),
            'student_contact_number' => Yii::t('app', 'Mobile Number'),
            'student_interestingfacts' => Yii::t('app', 'Interesting facts'),
            'student_photo' => Yii::t('app', 'Photo'),
            'student_cv' => Yii::t('app', 'CV'),
            'student_skill' => Yii::t('app', 'Skills'),
            'student_hobby' => Yii::t('app', 'Hobbies'),
            'student_club' => Yii::t('app', 'Clubs'),
            'student_sport' => Yii::t('app', 'Sports'),
            'student_experience_company' => Yii::t('app', 'Company Experienced'),
            'student_experience_position' => Yii::t('app', 'Position Experienced'),
            'student_verification_attachment' => Yii::t('app', 'Verfication Attachment'),
            'student_email_verification' => Yii::t('app', 'Email Verfication'),
            'student_id_verification' => Yii::t('app', 'Id Verfication'),
            'student_email_preference' => Yii::t('app', 'Email Preference'),
            'student_email' => Yii::t('app', 'Email'),
            'student_auth_key' => Yii::t('app', 'Auth Key'),
            'student_password_hash' => Yii::t('app', 'Password'),
            'student_password_reset_token' => Yii::t('app', 'Password Reset Token'),
            'student_language_pref' => Yii::t('app', 'Language Preference'),
            'student_banned' => Yii::t('app', 'Student Banned'),
            'student_limit_email' => Yii::t('app', 'Limit Email'),
            'student_updated_datetime' => Yii::t('app', 'Updated on'),
            'student_datetime' => Yii::t('app', 'Created on'),
        ];
    }
    
    public function beforeValidate() {
        //Adjust date of birth to match validation
        if($this->student_dob){
            $date = new \DateTime($this->student_dob);
            $this->student_dob = $date->format('Y/m/d');
        }
        
        return parent::beforeValidate();
    }
    
    public function beforeSave($insert) {
        if (parent::beforeSave($insert)) {
            if ($insert) {
                //Set Email limit
                $this->student_limit_email = new Expression('NOW()');
            }

            return true;
        }
    }
    
    
    /**
     * @return string path to the student photo
     */
    public function getPhoto(){
        if($this->student_photo){
            //Return link to photo uploaded in S3 bucket
            return Url::to("@student-photo/".$this->student_photo);
        }else return Url::to("@web/images/student-photo.png");
    }
    
    /**
     * @return string path to the verification attachment
     */
    public function getVerificationAttachment(){
        if($this->student_verification_attachment){
            //Return link to verification uploaded in S3 bucket
            return Url::to("@student-id/".$this->student_verification_attachment);
        }else return Url::to("@web/images/student-photo.png");
    }
    
    /**
     * @return string the students gender
     */
    public function getGender(){
        if($this->student_gender == self::GENDER_MALE){
            return "Male";
        }else return "Female";
    }
    
    /**
     * @return string whether the student has transportation
     */
    public function getTransportation(){
        if($this->student_transportation == self::TRANSPORTATION_AVAILABLE){
            return "Available";
        }else return "Unavailable";
    }
    
    /**
     * @return string the students status
     */
    public function getStatus(){
        if($this->student_status == self::STATUS_FULL_TIME){
            return Yii::t('register', 'Full-time');
        }else return Yii::t('register', 'Part-time');
    }
    
    /**
     * @return string text explaining ID Verification Status
     */
    public function getIdVerificationStatus(){
        if($this->student_id_verification == self::ID_VERIFIED){
            return "Verified";
        }else return "Not Yet Verified";
    }
    
    /**
     * @return string text explaining Email Verification Status
     */
    public function getEmailVerificationStatus(){
        if($this->student_email_verification == self::EMAIL_VERIFIED){
            return "Verified";
        }else return "Not Yet Verified";
    }
    
    /**
     * @return string the users email preference
     */
    public function getEmailPreference(){
        switch($this->student_email_preference){
            case self::NOTIFICATION_DAILY:
                return Yii::t('register', 'Daily as jobs are posted');
                break;
            case self::NOTIFICATION_WEEKLY:
                return Yii::t('register', 'Weekly summary');
                break;
            case self::NOTIFICATION_OFF:
                return Yii::t('register', 'Off');
                break;
        }
    }
    
    /**
     * @return string the users English language level
     */
    public function getEnglishLanguageLevel(){
        switch($this->student_english_level){
            case self::ENGLISH_WEAK:
                return Yii::t('register', 'Weak');
                break;
            case self::ENGLISH_FAIR:
                return Yii::t('register', 'Fair');
                break;
            case self::ENGLISH_GOOD:
                return Yii::t('register', 'Good');
                break;
        }
    }
    

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getNotificationEmployers() {
        return $this->hasMany(NotificationEmployer::className(), ['student_id' => 'student_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getNotificationStudents() {
        return $this->hasMany(NotificationStudent::className(), ['student_id' => 'student_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getDegree() {
        return $this->hasOne(Degree::className(), ['degree_id' => 'degree_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getStudentMajors()
    {
        return $this->hasMany(StudentMajor::className(), ['student_id' => 'student_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getMajors()
    {
        return $this->hasMany(Major::className(), ['major_id' => 'major_id'])->viaTable('student_major', ['student_id' => 'student_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getUniversity() {
        return $this->hasOne(University::className(), ['university_id' => 'university_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getCountry() {
        return $this->hasOne(Country::className(), ['country_id' => 'country_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getStudentJobApplications() {
        return $this->hasMany(StudentJobApplication::className(), ['student_id' => 'student_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getStudentLanguages() {
        return $this->hasMany(StudentLanguage::className(), ['student_id' => 'student_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getLanguages() {
        return $this->hasMany(Language::className(), ['language_id' => 'language_id'])->viaTable('student_language', ['student_id' => 'student_id']);
    }
    
    
    /*
     * Start Identity Code
     */
    
    /**
     * @inheritdoc
     */
    public static function findIdentity($id) {
        return static::findOne(['student_id' => $id]);
    }

    /**
     * @inheritdoc
     */
    public static function findIdentityByAccessToken($token, $type = null) {
        throw new NotSupportedException('"findIdentityByAccessToken" is not implemented.');
    }

    /**
     * Finds student by email
     *
     * @param string $email
     * @return static|null
     */
    public static function findByEmail($email) {
        return static::findOne(['student_email' => $email]);
    }

    /**
     * Finds student by password reset token
     *
     * @param string $token password reset token
     * @return static|null
     */
    public static function findByPasswordResetToken($token) {
        if (!static::isPasswordResetTokenValid($token)) {
            return null;
        }

        return static::findOne([
                    'student_password_reset_token' => $token,
        ]);
    }

    /**
     * Finds out if password reset token is valid
     *
     * @param string $token password reset token
     * @return boolean
     */
    public static function isPasswordResetTokenValid($token) {
        if (empty($token)) {
            return false;
        }
        $expire = Yii::$app->params['user.passwordResetTokenExpire'];
        $parts = explode('_', $token);
        $timestamp = (int) end($parts);
        return $timestamp + $expire >= time();
    }

    /**
     * @inheritdoc
     */
    public function getId() {
        return $this->getPrimaryKey();
    }

    /**
     * @inheritdoc
     */
    public function getAuthKey() {
        return $this->student_auth_key;
    }

    /**
     * @inheritdoc
     */
    public function validateAuthKey($authKey) {
        return $this->getAuthKey() === $authKey;
    }

    /**
     * Validates password
     *
     * @param string $password password to validate
     * @return boolean if password provided is valid for current user
     */
    public function validatePassword($password) {
        return Yii::$app->security->validatePassword($password, $this->student_password_hash);
    }

    /**
     * Generates password hash from password and sets it to the model
     *
     * @param string $password
     */
    public function setPassword($password) {
        $this->student_password_hash = Yii::$app->security->generatePasswordHash($password);
    }

    /**
     * Generates "remember me" authentication key
     */
    public function generateAuthKey() {
        $this->student_auth_key = Yii::$app->security->generateRandomString();
    }

    /**
     * Generates new password reset token
     */
    public function generatePasswordResetToken() {
        $this->student_password_reset_token = Yii::$app->security->generateRandomString() . '_' . time();
    }

    /**
     * Removes password reset token
     */
    public function removePasswordResetToken() {
        $this->student_password_reset_token = null;
    }

}
