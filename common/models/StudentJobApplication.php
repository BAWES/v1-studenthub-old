<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "student_job_application".
 *
 * @property integer $application_id
 * @property integer $student_id
 * @property integer $job_id
 * @property string $application_answer_1
 * @property string $application_answer_2
 * @property string $application_date_apply
 * @property integer $application_unlocked
 * @property integer $application_hidden
 *
 * @property Student $student
 * @property Job $job
 */
class StudentJobApplication extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'student_job_application';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['student_id', 'job_id', 'application_date_apply', 'application_hidden'], 'required'],
            [['student_id', 'job_id', 'application_unlocked', 'application_hidden'], 'integer'],
            [['application_date_apply'], 'safe'],
            [['application_answer_1', 'application_answer_2'], 'string', 'max' => 255]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'application_id' => Yii::t('app', 'Application ID'),
            'student_id' => Yii::t('app', 'Student ID'),
            'job_id' => Yii::t('app', 'Job ID'),
            'application_answer_1' => Yii::t('app', 'Application Answer 1'),
            'application_answer_2' => Yii::t('app', 'Application Answer 2'),
            'application_date_apply' => Yii::t('app', 'Application Date Apply'),
            'application_unlocked' => Yii::t('app', 'Application Unlocked'),
            'application_hidden' => Yii::t('app', 'Application Hidden'),
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getStudent()
    {
        return $this->hasOne(Student::className(), ['student_id' => 'student_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getJob()
    {
        return $this->hasOne(Job::className(), ['job_id' => 'job_id']);
    }
}
