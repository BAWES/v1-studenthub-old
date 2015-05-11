<?php

namespace common\models;

use Yii;
use yii\behaviors\TimestampBehavior;
use yii\db\Expression;

/**
 * This is the model class for table "job".
 *
 * @property integer $job_id
 * @property integer $jobtype_id
 * @property integer $employer_id
 * @property string $job_title
 * @property integer $job_pay
 * @property string $job_startdate
 * @property string $job_responsibilites
 * @property string $job_other_qualifications
 * @property string $job_desired_skill
 * @property string $job_compensation
 * @property string $job_question_1
 * @property string $job_question_2
 * @property integer $job_max_applicants
 * @property integer $job_current_num_applicants
 * @property integer $job_status
 * @property string $job_price_per_applicant
 * @property string $job_updated_datetime
 * @property string $job_created_datetime
 *
 * @property Filter[] $filters
 * @property Jobtype $jobtype
 * @property Employer $employer
 * @property NotificationEmployer[] $notificationEmployers
 * @property NotificationStudent[] $notificationStudents
 * @property StudentJobApplication[] $studentJobApplications
 * @property Transaction[] $transactions
 */
class Job extends \yii\db\ActiveRecord
{
    //Options for `job_pay` column
    //Specifies if the job pays or not
    const PAY_PAID = 1;
    const PAY_NOT_PAID = 0;
    
    //Options for `job_status` column
    //Job status affects the visibility of the job (draft,open, or closed)
    const STATUS_DRAFT = 0;
    const STATUS_OPEN = 1;
    const STATUS_CLOSED = 2;
    const STATUS_PENDING = 3; //If its pending - admin must verify
    
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'job';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['jobtype_id', 'employer_id', 'job_title', 'job_pay', 'job_responsibilites', 'job_desired_skill', 'job_max_applicants', 'job_status'], 'required'],
            [['jobtype_id', 'employer_id', 'job_pay', 'job_status'], 'integer'],
            [['job_price_per_applicant'], 'number'],
            [['job_title', 'job_compensation'], 'string', 'max' => 255],
            
            [['job_startdate'], 'date'],
                        
            //`job_pay` rules
            ['job_pay', 'in', 'range' => [self::PAY_PAID, self::PAY_NOT_PAID]],
        ];
    }
    
    public function behaviors() {
        return [
            [
                'class' => TimestampBehavior::className(),
                'createdAtAttribute' => 'job_created_datetime',
                'updatedAtAttribute' => 'job_updated_datetime',
                'value' => new Expression('NOW()'),
            ],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'job_id' => Yii::t('app', 'Job ID'),
            'jobtype_id' => Yii::t('app', 'Type'),
            'employer_id' => Yii::t('app', 'Employer ID'),
            'job_title' => Yii::t('app', 'Job Title'),
            'job_pay' => Yii::t('app', 'Paid'),
            'job_startdate' => Yii::t('app', 'Work Starting Date'),
            'job_responsibilites' => Yii::t('app', 'Responsibilites'),
            'job_other_qualifications' => Yii::t('app', 'Other Qualifications'),
            'job_desired_skill' => Yii::t('app', 'Desired Skills'),
            'job_compensation' => Yii::t('app', 'Compensation'),
            'job_question_1' => Yii::t('app', 'Question 1'),
            'job_question_2' => Yii::t('app', 'Question 2'),
            'job_max_applicants' => Yii::t('app', 'Max # of Applicants'),
            'job_current_num_applicants' => Yii::t('app', 'Job Current Num Applicants'),
            'job_status' => Yii::t('app', 'Job Status'),
            'job_price_per_applicant' => Yii::t('app', 'Job Price Per Applicant'),
            'job_updated_datetime' => Yii::t('app', 'Job Updated Datetime'),
            'job_created_datetime' => Yii::t('app', 'Job Created Datetime'),
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getFilters()
    {
        return $this->hasMany(Filter::className(), ['job_id' => 'job_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getJobtype()
    {
        return $this->hasOne(Jobtype::className(), ['jobtype_id' => 'jobtype_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getEmployer()
    {
        return $this->hasOne(Employer::className(), ['employer_id' => 'employer_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getNotificationEmployers()
    {
        return $this->hasMany(NotificationEmployer::className(), ['job_id' => 'job_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getNotificationStudents()
    {
        return $this->hasMany(NotificationStudent::className(), ['job_id' => 'job_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getStudentJobApplications()
    {
        return $this->hasMany(StudentJobApplication::className(), ['job_id' => 'job_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getTransactions()
    {
        return $this->hasMany(Transaction::className(), ['job_id' => 'job_id']);
    }
}
