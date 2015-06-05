<?php

namespace common\models;

use Yii;
use yii\base\NotSupportedException;
use yii\web\IdentityInterface;
use yii\behaviors\TimestampBehavior;
use yii\db\Expression;
use yii\web\UploadedFile;
use yii\helpers\Url;

/**
 * This is the model class for table "employer".
 *
 * @property integer $employer_id
 * @property integer $industry_id
 * @property integer $city_id
 * @property string $employer_company_name
 * @property string $employer_logo
 * @property string $employer_website
 * @property string $employer_company_desc
 * @property integer $employer_num_employees
 * @property string $employer_contact_firstname
 * @property string $employer_contact_lastname
 * @property string $employer_contact_number
 * @property string $employer_credit
 * @property integer $employer_email_preference
 * @property string $employer_email
 * @property integer $employer_email_verification 
 * @property string $employer_auth_key
 * @property string $employer_password_hash
 * @property string $employer_password_reset_token
 * @property string $employer_language_pref
 * @property string $employer_support_field
 * @property string $employer_limit_email 
 * @property string $employer_social_twitter
 * @property string $employer_social_facebook
 * @property string $employer_social_instagram
 * @property string $employer_updated_datetime 
 * @property string $employer_datetime
 *
 * @property Industry $industry
 * @property City $city
 * @property Job[] $jobs
 * @property NotificationEmployer[] $notificationEmployers
 * @property Payment[] $payments
 */
class Employer extends \yii\db\ActiveRecord implements IdentityInterface {

    //Email notification preference values for `employer_email_preference`
    const NOTIFICATION_OFF = 0;
    const NOTIFICATION_DAILY = 1;
    const NOTIFICATION_WEEKLY = 2;
    //Email verification values for `employer_email_verification`
    const EMAIL_VERIFIED = 1;
    const EMAIL_NOT_VERIFIED = 0;

    /**
     * @inheritdoc
     */
    public static function tableName() {
        return 'employer';
    }

    /**
     * @inheritdoc
     */
    public function rules() { //Make sure to never include employer_credit in rules - so its never allowed to be massively assigned
        return [
            [['industry_id', 'city_id', 'employer_company_desc', 'employer_contact_firstname',
            'employer_password_hash', 'employer_company_name', 'employer_contact_number',
            'employer_contact_lastname', 'employer_email_preference', 'employer_email'], 'required'],
            [['industry_id', 'city_id', 'employer_contact_number', 'employer_num_employees', 'employer_email_preference'], 'integer'],
            [['employer_company_desc'], 'string'],
            [['employer_company_name', 'employer_website', 'employer_contact_firstname', 'employer_contact_lastname',
            'employer_email', 'employer_password_hash', 'employer_password_reset_token'], 'string', 'max' => 255],
            //Unique emails
            ['employer_email', 'filter', 'filter' => 'trim'],
            ['employer_email', 'email'],
            ['employer_email', 'unique', 'targetClass' => '\common\models\Employer',
                'message' => \Yii::t('frontend', 'This email address is already registered.')],
            //Upload University Logo
            ['employer_logo', 'file', 'extensions' => 'jpg, png, gif', 'maxSize' => 10000000,
                'wrongExtension' => Yii::t('register', 'Only files with these extensions are allowed for your Logo: {extensions}')],
            //URL Validator
            [['employer_website', 'employer_social_facebook'], 'url', 'defaultScheme' => 'http'],
            //Validate existence of CityID and IndustryId selected
            ['city_id', 'exist',
                'targetClass' => '\common\models\City',
                'targetAttribute' => 'city_id',
                'message' => \Yii::t('frontend', 'This city does not exist.')
            ],
            ['industry_id', 'exist',
                'targetClass' => '\common\models\Industry',
                'targetAttribute' => 'industry_id',
                'message' => \Yii::t('frontend', 'This industry does not exist.')
            ],
            //Length Requirements
            ['employer_contact_number', 'string', 'length' => 8],
            ['employer_password_hash', 'string', 'length' => [5]],
            //Default Values
            ['employer_language_pref', 'default', 'value' => 'en-US'],
            [['employer_logo', 'employer_website', 'employer_social_twitter', 'employer_social_facebook', 'employer_social_instagram'], 'default'],
            //Email preference rules
            ['employer_email_preference', 'default', 'value' => self::NOTIFICATION_DAILY],
            ['employer_email_preference', 'in', 'range' => [self::NOTIFICATION_OFF, self::NOTIFICATION_DAILY, self::NOTIFICATION_WEEKLY]],
        ];
    }

    public function behaviors() {
        return [
            [
                'class' => TimestampBehavior::className(),
                'createdAtAttribute' => 'employer_datetime',
                'updatedAtAttribute' => 'employer_updated_datetime',
                'value' => new Expression('NOW()'),
            ],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels() {
        return [
            'employer_id' => Yii::t('app', 'Employer ID'),
            'industry_id' => Yii::t('app', 'Industry'),
            'city_id' => Yii::t('app', 'Location'),
            'employer_company_name' => Yii::t('app', 'Company Name'),
            'employer_logo' => Yii::t('app', 'Logo'),
            'employer_website' => Yii::t('app', 'Website'),
            'employer_company_desc' => Yii::t('app', 'Description'),
            'employer_num_employees' => Yii::t('app', 'Number of Employees'),
            'employer_contact_firstname' => Yii::t('app', 'Contact First name'),
            'employer_contact_lastname' => Yii::t('app', 'Contact Last name'),
            'employer_contact_number' => Yii::t('app', 'Contact Phone'),
            'employer_credit' => Yii::t('app', 'Credit'),
            'employer_email_preference' => Yii::t('app', 'Email Preference'),
            'employer_email' => Yii::t('app', 'Email'),
            'employer_email_verification' => Yii::t('app', 'Email Verification'),
            'employer_auth_key' => Yii::t('app', 'Auth Key'),
            'employer_password_hash' => Yii::t('app', 'Password'),
            'employer_password_reset_token' => Yii::t('app', 'Password Reset Token'),
            'employer_support_field' => Yii::t('app', 'Employer Support Field'),
            'employer_language_pref' => Yii::t('app', 'Language Preference'),
            'employer_limit_email' => Yii::t('app', 'Limit Email'),
            'employer_social_twitter' => Yii::t('app', 'Twitter'),
            'employer_social_facebook' => Yii::t('app', 'Facebook'),
            'employer_social_instagram' => Yii::t('app', 'Instagram'),
            'employer_updated_datetime' => Yii::t('app', 'Datetime Updated'),
            'employer_datetime' => Yii::t('app', 'Datetime Registered'),
        ];
    }
    
    public function beforeSave($insert) {
        if(parent::beforeSave($insert)){
            //Remove @ sign from twitter and instagram links
            if($this->employer_social_twitter){
                $this->employer_social_twitter = str_replace("@", "", $this->employer_social_twitter);
            }
            if($this->employer_social_instagram){
                $this->employer_social_instagram = str_replace("@", "", $this->employer_social_instagram);
            }
            
            return true;
        }else{
            return false;
        }
    }
    
    /**
     * @return string path to the employer logo
     */
    public function getLogo(){
        if($this->employer_logo){
            //Return link to photo uploaded in S3 bucket
            return Url::to("@employer-logo/".$this->employer_logo);
        }else return Url::to("@web/images/employer-logo.png");
    }
    
    
    /**
     * @return string the users email preference
     */
    public function getEmailPreference(){
        switch($this->employer_email_preference){
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
     * @return string text explaining Email Verification Status
     */
    public function getEmailVerificationStatus(){
        if($this->employer_email_verification == self::EMAIL_VERIFIED){
            return "Verified";
        }else return "Not Yet Verified";
    }

    /**
     * Uploads the new logo if $this->employer_logo is an instance of UploadedFile
     */
    public function uploadLogo() {
        if($this->employer_logo instanceof UploadedFile){
            $filename = Yii::$app->security->generateRandomString() . "." . $this->employer_logo->extension;

            //Resize file using imagine
            $newTmpName = $this->employer_logo->tempName . "." . $this->employer_logo->extension;

            $imagine = new \Imagine\Gd\Imagine();
            $image = $imagine->open($this->employer_logo->tempName);
            $image->resize($image->getSize()->widen(500));
            $image->save($newTmpName);

            //Overwrite old filename for S3 uploading
            $this->employer_logo->tempName = $newTmpName;

            //Save to S3 Temporary folder
            $awsResult = Yii::$app->resourceManager->save($this->employer_logo, "employer-logo/" . $filename);
            if($awsResult){
                $this->employer_logo = $filename;
            }
        }
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getIndustry() {
        return $this->hasOne(Industry::className(), ['industry_id' => 'industry_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getCity() {
        return $this->hasOne(City::className(), ['city_id' => 'city_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getJobs() {
        return $this->hasMany(Job::className(), ['employer_id' => 'employer_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getNotificationEmployers() {
        return $this->hasMany(NotificationEmployer::className(), ['employer_id' => 'employer_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getPayments() {
        return $this->hasMany(Payment::className(), ['employer_id' => 'employer_id'])->orderBy('payment_datetime DESC');
    }
    
    /**
     * @return real total payments made by this employer
     */
    public function getPaymentsTotal() {
        return $this->getPayments()->sum("payment_total");
    }

    /*
     * Start Identity Code
     */

    /**
     * @inheritdoc
     */
    public static function findIdentity($id) {
        return static::findOne(['employer_id' => $id]);
    }

    /**
     * @inheritdoc
     */
    public static function findIdentityByAccessToken($token, $type = null) {
        throw new NotSupportedException('"findIdentityByAccessToken" is not implemented.');
    }

    /**
     * Finds employer by email
     *
     * @param string $email
     * @return static|null
     */
    public static function findByEmail($email) {
        return static::findOne(['employer_email' => $email]);
    }

    /**
     * Finds employer by password reset token
     *
     * @param string $token password reset token
     * @return static|null
     */
    public static function findByPasswordResetToken($token) {
        if (!static::isPasswordResetTokenValid($token)) {
            return null;
        }

        return static::findOne([
                    'employer_password_reset_token' => $token,
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
        return $this->employer_auth_key;
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
        return Yii::$app->security->validatePassword($password, $this->employer_password_hash);
    }

    /**
     * Generates password hash from password and sets it to the model
     *
     * @param string $password
     */
    public function setPassword($password) {
        $this->employer_password_hash = Yii::$app->security->generatePasswordHash($password);
    }

    /**
     * Generates "remember me" authentication key
     */
    public function generateAuthKey() {
        $this->employer_auth_key = Yii::$app->security->generateRandomString();
    }

    /**
     * Generates new password reset token
     */
    public function generatePasswordResetToken() {
        $this->employer_password_reset_token = Yii::$app->security->generateRandomString() . '_' . time();
    }

    /**
     * Removes password reset token
     */
    public function removePasswordResetToken() {
        $this->employer_password_reset_token = null;
    }

}
