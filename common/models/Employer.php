<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "employer".
 *
 * @property integer $employer_id
 * @property integer $industry_id
 * @property integer $city_id
 * @property string $employer_company_name
 * @property string $employer_logo
 * @property string $employer_background_image 
 * @property string $employer_background_color 
 * @property string $employer_website
 * @property string $employer_company_desc
 * @property integer $employer_num_employees
 * @property string $employer_contact_firstname
 * @property string $employer_contact_lastname
 * @property string $employer_contact_number
 * @property string $employer_credit
 * @property integer $employer_email_preference
 * @property string $employer_email
 * @property string $employer_auth_key
 * @property string $employer_password_hash
 * @property string $employer_password_reset_token
 * @property string $employer_language_pref
 * @property string $employer_datetime
 *
 * @property Industry $industry
 * @property City $city
 * @property Job[] $jobs
 * @property NotificationEmployer[] $notificationEmployers
 * @property Payment[] $payments
 */
class Employer extends \yii\db\ActiveRecord
{
    //Email notification preference values for `employer_email_preference`
    const NOTIFICATION_OFF = 0;
    const NOTIFICATION_DAILY = 1;
    const NOTIFICATION_WEEKLY = 2;
    
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'employer';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['industry_id', 'city_id', 'employer_company_desc', 'employer_num_employees', 'employer_contact_firstname', 'employer_contact_lastname', 'employer_email_preference', 'employer_email', 'employer_auth_key'], 'required'],
            [['industry_id', 'city_id', 'employer_num_employees', 'employer_email_preference'], 'integer'],
            [['employer_company_desc'], 'string'],
            [['employer_credit'], 'number'],
            [['employer_company_name', 'employer_website', 'employer_contact_firstname', 'employer_contact_lastname', 'employer_email', 'employer_password_hash', 'employer_password_reset_token'], 'string', 'max' => 255],
            
            //Default Values
            ['employer_language_pref', 'default', 'value' => 'en-US'],
            
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
                'updatedAtAttribute' => false,
                'value' => new Expression('NOW()'),
            ],
        ];
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
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'employer_id' => Yii::t('app', 'Employer ID'),
            'industry_id' => Yii::t('app', 'Industry ID'),
            'city_id' => Yii::t('app', 'City ID'),
            'employer_company_name' => Yii::t('app', 'Employer Company Name'),
            'employer_logo' => Yii::t('app', 'Employer Logo'),
            'employer_background_image' => Yii::t('app', 'Employer Background Image'), 
            'employer_background_color' => Yii::t('app', 'Employer Background Color'), 
            'employer_website' => Yii::t('app', 'Employer Website'),
            'employer_company_desc' => Yii::t('app', 'Employer Company Desc'),
            'employer_num_employees' => Yii::t('app', 'Employer Num Employees'),
            'employer_contact_firstname' => Yii::t('app', 'Employer Contact Firstname'),
            'employer_contact_lastname' => Yii::t('app', 'Employer Contact Lastname'),
            'employer_contact_number' => Yii::t('app', 'Employer Contact Number'),
            'employer_credit' => Yii::t('app', 'Employer Credit'),
            'employer_email_preference' => Yii::t('app', 'Employer Email Preference'),
            'employer_email' => Yii::t('app', 'Employer Email'),
            'employer_auth_key' => Yii::t('app', 'Employer Auth Key'),
            'employer_password_hash' => Yii::t('app', 'Employer Password Hash'),
            'employer_password_reset_token' => Yii::t('app', 'Employer Password Reset Token'),
            'employer_language_pref' => Yii::t('app', 'Language Preference'), 
            'employer_datetime' => Yii::t('app', 'Employer Datetime'),
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getIndustry()
    {
        return $this->hasOne(Industry::className(), ['industry_id' => 'industry_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getCity()
    {
        return $this->hasOne(City::className(), ['city_id' => 'city_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getJobs()
    {
        return $this->hasMany(Job::className(), ['employer_id' => 'employer_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getNotificationEmployers()
    {
        return $this->hasMany(NotificationEmployer::className(), ['employer_id' => 'employer_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getPayments()
    {
        return $this->hasMany(Payment::className(), ['employer_id' => 'employer_id']);
    }
}
