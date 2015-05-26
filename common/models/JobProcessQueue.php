<?php

namespace common\models;

use Yii;
use yii\behaviors\TimestampBehavior;
use yii\db\Expression;

/**
 * This is the model class for table "job_process_queue".
 *
 * @property integer $queue_id
 * @property integer $job_id
 * @property string $queue_datetime
 *
 * @property Job $job
 */
class JobProcessQueue extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'job_process_queue';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['job_id'], 'required'],
            [['job_id'], 'integer'],
        ];
    }
    
    public function behaviors() {
        return [
            [
                'class' => TimestampBehavior::className(),
                'createdAtAttribute' => 'queue_datetime',
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
            'queue_id' => 'Queue ID',
            'job_id' => 'Job ID',
            'queue_datetime' => 'Queue Datetime',
        ];
    }
    
    /**
     * Static function for processing the next job in queue
     */
    public static function processNextJob(){
        $queuedJob = static::find()->orderBy("queue_datetime ASC")->one();
        if($queuedJob){
            $studentCount = 0;
            $job = $queuedJob->job;

            if($job){
                Yii::info("Broadcasting Job #".$job->job_id." [".$job->job_title."] which was queued "
                        .Yii::$app->formatter->asRelativeTime($queuedJob->queue_datetime), __METHOD__);
                
                $studentCount = $job->broadcast();
            }

            /**
             * Delete queue record for this job
             */
            $queuedJob->delete();
            
        }else Yii::info("There are no jobs in the Queue", __METHOD__);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getJob()
    {
        return $this->hasOne(\backend\models\Job::className(), ['job_id' => 'job_id']);
    }
}
