<?php

namespace console\controllers;

use Yii;
use yii\helpers\Console;
use common\models\Job;
use common\models\JobProcessQueue;
use common\models\StudentJobQualification;
use common\models\NotificationStudent;


/**
 * All Cron actions related to this project
 */
class CronController extends \yii\console\Controller {
    
    /**
     * Process the next job in Queue
     */
    public function actionProcessNextJob() {
        /**
         * Find the oldest job in the queue
         */
        $queuedJob = JobProcessQueue::find()->orderBy("queue_datetime DESC")->one();
        $job = $queuedJob->job;
        
        
        /**
         * Exit if the job has already been broadcasted
         * otherwise continue processing
         */
        if($job->job_broadcasted == Job::BROADCASTED_YES){
            $this->stdout("ERROR: Job #".$job->job_id." has already been broadcasted"."\n", Console::FG_RED);
        }else{
            $this->stdout($job->job_title." @ ".$queuedJob->queue_datetime."\n");
            
            /**
            * Delete all existing student notifications and qualifications for this job
            */
            StudentJobQualification::deleteAll(['job_id' => $job->job_id]);
            NotificationStudent::deleteAll(['job_id' => $job->job_id]);
            
            
            /**
             * Find and filter students who qualify, for each student that qualifies - create notification and qualification record
             */
            
            
            
            
            
            /**
             * Set job_broadcasted to BROADCASTED_YES when the broadcast is complete
             */
            
            
            
        }
        
        /**
         * Delete queue record for this job
         */
        //Remove comment once implementation is complete
        //$queuedJob->delete();
        
        return self::EXIT_CODE_NORMAL;
    }

}