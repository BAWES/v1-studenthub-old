<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "student".
 *
 * @property integer $student_id
 * @property integer $degree_id
 * @property integer $major_id
 * @property integer $country_id
 * @property integer $university_id
 * @property string $student_firstname
 * @property string $student_lastname
 * @property string $student_dob
 * @property integer $student_status
 * @property string $student_enrolment_year
 * @property string $student_graduating_year
 * @property string $student_gpa
 * @property integer $student_gender
 * @property integer $student_transportation
 * @property string $student_contact_number
 * @property string $student_interestingfacts
 * @property string $student_photo
 * @property string $student_cv
 * @property string $student_skill
 * @property string $student_hobby
 * @property string $student_club
 * @property string $student_verfication_attachment
 * @property integer $student_email_verfication
 * @property integer $student_id_verfication
 * @property integer $student_email_preference
 * @property string $student_email
 * @property string $student_auth_key
 * @property string $student_password_hash
 * @property string $student_password_reset_token
 * @property string $student_datetime
 *
 * @property NotificationEmployer[] $notificationEmployers
 * @property NotificationStudent[] $notificationStudents
 * @property Degree $degree
 * @property Major $major
 * @property University $university
 * @property Country $country
 * @property StudentJobApplication[] $studentJobApplications
 * @property StudentLanguage[] $studentLanguages
 * @property Language[] $languages
 */
class Student extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'student';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['degree_id', 'major_id', 'country_id', 'university_id', 'student_lastname', 'student_dob', 'student_status', 'student_enrolment_year', 'student_graduating_year', 'student_gpa', 'student_gender', 'student_contact_number', 'student_interestingfacts', 'student_cv', 'student_skill', 'student_hobby', 'student_club', 'student_verfication_attachment', 'student_email_preference', 'student_email', 'student_auth_key', 'student_datetime'], 'required'],
            [['degree_id', 'major_id', 'country_id', 'university_id', 'student_status', 'student_gender', 'student_transportation', 'student_email_verfication', 'student_id_verfication', 'student_email_preference'], 'integer'],
            [['student_dob', 'student_enrolment_year', 'student_graduating_year', 'student_datetime'], 'safe'],
            [['student_gpa'], 'number'],
            [['student_interestingfacts', 'student_skill', 'student_hobby', 'student_club'], 'string'],
            [['student_firstname', 'student_lastname', 'student_photo', 'student_cv', 'student_verfication_attachment', 'student_email', 'student_password_hash', 'student_password_reset_token'], 'string', 'max' => 255],
            [['student_contact_number'], 'string', 'max' => 64],
            [['student_auth_key'], 'string', 'max' => 32]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'student_id' => Yii::t('app', 'Student ID'),
            'degree_id' => Yii::t('app', 'Degree ID'),
            'major_id' => Yii::t('app', 'Major ID'),
            'country_id' => Yii::t('app', 'Country ID'),
            'university_id' => Yii::t('app', 'University ID'),
            'student_firstname' => Yii::t('app', 'Student Firstname'),
            'student_lastname' => Yii::t('app', 'Student Lastname'),
            'student_dob' => Yii::t('app', 'Student Dob'),
            'student_status' => Yii::t('app', 'Student Status'),
            'student_enrolment_year' => Yii::t('app', 'Student Enrolment Year'),
            'student_graduating_year' => Yii::t('app', 'Student Graduating Year'),
            'student_gpa' => Yii::t('app', 'Student Gpa'),
            'student_gender' => Yii::t('app', 'Student Gender'),
            'student_transportation' => Yii::t('app', 'Student Transportation'),
            'student_contact_number' => Yii::t('app', 'Student Contact Number'),
            'student_interestingfacts' => Yii::t('app', 'Student Interestingfacts'),
            'student_photo' => Yii::t('app', 'Student Photo'),
            'student_cv' => Yii::t('app', 'Student Cv'),
            'student_skill' => Yii::t('app', 'Student Skill'),
            'student_hobby' => Yii::t('app', 'Student Hobby'),
            'student_club' => Yii::t('app', 'Student Club'),
            'student_verfication_attachment' => Yii::t('app', 'Student Verfication Attachment'),
            'student_email_verfication' => Yii::t('app', 'Student Email Verfication'),
            'student_id_verfication' => Yii::t('app', 'Student Id Verfication'),
            'student_email_preference' => Yii::t('app', 'Student Email Preference'),
            'student_email' => Yii::t('app', 'Student Email'),
            'student_auth_key' => Yii::t('app', 'Student Auth Key'),
            'student_password_hash' => Yii::t('app', 'Student Password Hash'),
            'student_password_reset_token' => Yii::t('app', 'Student Password Reset Token'),
            'student_datetime' => Yii::t('app', 'Student Datetime'),
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getNotificationEmployers()
    {
        return $this->hasMany(NotificationEmployer::className(), ['student_id' => 'student_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getNotificationStudents()
    {
        return $this->hasMany(NotificationStudent::className(), ['student_id' => 'student_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getDegree()
    {
        return $this->hasOne(Degree::className(), ['degree_id' => 'degree_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getMajor()
    {
        return $this->hasOne(Major::className(), ['major_id' => 'major_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getUniversity()
    {
        return $this->hasOne(University::className(), ['university_id' => 'university_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getCountry()
    {
        return $this->hasOne(Country::className(), ['country_id' => 'country_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getStudentJobApplications()
    {
        return $this->hasMany(StudentJobApplication::className(), ['student_id' => 'student_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getStudentLanguages()
    {
        return $this->hasMany(StudentLanguage::className(), ['student_id' => 'student_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getLanguages()
    {
        return $this->hasMany(Language::className(), ['language_id' => 'language_id'])->viaTable('student_language', ['student_id' => 'student_id']);
    }
}
