<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "notification_student".
 *
 * @property integer $notification_student_id
 * @property integer $student_id
 * @property integer $job_id
 * @property string $notification_datetime
 * @property integer $notification_sent
 *
 * @property Student $student
 * @property Job $job
 */
class NotificationStudent extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'notification_student';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['student_id', 'job_id', 'notification_datetime'], 'required'],
            [['student_id', 'job_id', 'notification_sent'], 'integer'],
            [['notification_datetime'], 'safe']
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'notification_student_id' => Yii::t('app', 'Notification Student ID'),
            'student_id' => Yii::t('app', 'Student ID'),
            'job_id' => Yii::t('app', 'Job ID'),
            'notification_datetime' => Yii::t('app', 'Notification Datetime'),
            'notification_sent' => Yii::t('app', 'Notification Sent'),
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
