<?php

namespace common\models;

use Yii;
use yii\behaviors\TimestampBehavior;
use yii\db\Expression;

/**
 * This is the model class for table "notification_student".
 *
 * @property integer $notification_id
 * @property integer $student_id
 * @property integer $job_id
 * @property integer $notification_sent
 * @property integer $notification_viewed
 * @property string $notification_datetime
 *
 * @property Student $student
 * @property Job $job
 */
class NotificationStudent extends \yii\db\ActiveRecord
{
    //Values available for `notification_viewed` column
    //This lets us know what notifications they have seen/cleared through the UI
    const VIEWED_TRUE = 1;
    const VIEWED_FALSE = 0;
    
    //Values available for `notification_sent` column
    //Lets us know what notifications have been sent and which are queued for their next email
    const SENT_TRUE = 1;
    const SENT_FALSE = 0;
    
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
            [['student_id', 'job_id', 'notification_viewed'], 'required'],
            [['student_id', 'job_id', 'notification_sent', 'notification_viewed'], 'integer'],
            
            //Rules for notification viewed
            ['notification_viewed', 'default', 'value' => self::VIEWED_FALSE],
            ['notification_viewed', 'in', 'range' => [self::VIEWED_TRUE, self::VIEWED_FALSE]],
            
            //Rules for notification sent
            ['notification_sent', 'default', 'value' => self::SENT_FALSE],
            ['notification_sent', 'in', 'range' => [self::SENT_TRUE, self::SENT_FALSE]],
        ];
    }
    
    public function behaviors() {
        return [
            [
                'class' => TimestampBehavior::className(),
                'createdAtAttribute' => 'notification_datetime',
                'updatedAtAttribute' => false,
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
            'notification_id' => Yii::t('app', 'Notification ID'),
            'student_id' => Yii::t('app', 'Student ID'),
            'job_id' => Yii::t('app', 'Job ID'),
            'notification_sent' => Yii::t('app', 'Notification Sent'),
            'notification_viewed' => Yii::t('app', 'Notification Viewed'),
            'notification_datetime' => Yii::t('app', 'Notification Datetime'),
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
