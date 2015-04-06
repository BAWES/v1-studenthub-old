<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "notification_employer".
 *
 * @property integer $notification_employer_id
 * @property integer $employer_id
 * @property integer $student_id
 * @property integer $job_id
 * @property string $notification_datetime
 * @property integer $notication_sent
 *
 * @property Employer $employer
 * @property Student $student
 * @property Job $job
 */
class NotificationEmployer extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'notification_employer';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['employer_id', 'student_id', 'job_id', 'notification_datetime'], 'required'],
            [['employer_id', 'student_id', 'job_id', 'notication_sent'], 'integer'],
            [['notification_datetime'], 'safe']
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'notification_employer_id' => Yii::t('app', 'Notification Employer ID'),
            'employer_id' => Yii::t('app', 'Employer ID'),
            'student_id' => Yii::t('app', 'Student ID'),
            'job_id' => Yii::t('app', 'Job ID'),
            'notification_datetime' => Yii::t('app', 'Notification Datetime'),
            'notication_sent' => Yii::t('app', 'Notication Sent'),
        ];
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
