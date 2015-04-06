<?php

namespace common\models;

use Yii;

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
 * @property string $job_other_quilifications
 * @property string $job_desired_skill
 * @property string $job_compensation
 * @property string $job_question_1
 * @property string $job_question_2
 * @property integer $job_max_applicants
 * @property integer $job_current_num_applicants
 * @property integer $job_status
 * @property string $job_created_datetime
 * @property string $job_price_per_applicant
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
            [['jobtype_id', 'employer_id', 'job_title', 'job_pay', 'job_startdate', 'job_responsibilites', 'job_other_quilifications', 'job_desired_skill', 'job_question_1', 'job_question_2', 'job_max_applicants', 'job_current_num_applicants', 'job_status', 'job_created_datetime', 'job_price_per_applicant'], 'required'],
            [['jobtype_id', 'employer_id', 'job_pay', 'job_max_applicants', 'job_current_num_applicants', 'job_status'], 'integer'],
            [['job_startdate', 'job_created_datetime'], 'safe'],
            [['job_price_per_applicant'], 'number'],
            [['job_title', 'job_responsibilites', 'job_other_quilifications', 'job_desired_skill', 'job_compensation', 'job_question_1', 'job_question_2'], 'string', 'max' => 255]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'job_id' => Yii::t('app', 'Job ID'),
            'jobtype_id' => Yii::t('app', 'Jobtype ID'),
            'employer_id' => Yii::t('app', 'Employer ID'),
            'job_title' => Yii::t('app', 'Job Title'),
            'job_pay' => Yii::t('app', 'Job Pay'),
            'job_startdate' => Yii::t('app', 'Job Startdate'),
            'job_responsibilites' => Yii::t('app', 'Job Responsibilites'),
            'job_other_quilifications' => Yii::t('app', 'Job Other Quilifications'),
            'job_desired_skill' => Yii::t('app', 'Job Desired Skill'),
            'job_compensation' => Yii::t('app', 'Job Compensation'),
            'job_question_1' => Yii::t('app', 'Job Question 1'),
            'job_question_2' => Yii::t('app', 'Job Question 2'),
            'job_max_applicants' => Yii::t('app', 'Job Max Applicants'),
            'job_current_num_applicants' => Yii::t('app', 'Job Current Num Applicants'),
            'job_status' => Yii::t('app', 'Job Status'),
            'job_created_datetime' => Yii::t('app', 'Job Created Datetime'),
            'job_price_per_applicant' => Yii::t('app', 'Job Price Per Applicant'),
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
