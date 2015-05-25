<?php

namespace console\controllers;

use Yii;
use yii\helpers\Console;
use yii\helpers\ArrayHelper;
use backend\models\Job;
use common\models\JobProcessQueue;
use common\models\StudentJobQualification;
use common\models\NotificationStudent;
use common\models\Student;


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
        $queuedJob = JobProcessQueue::find()->orderBy("queue_datetime ASC")->one();
        if($queuedJob){
            $studentCount = 0;
            $job = $queuedJob->job;

            /**
             * Exit if the job has already been broadcasted
             * otherwise continue processing
             */
            if($job->job_broadcasted == Job::BROADCASTED_YES){
                $this->stdout("ERROR: Job #".$job->job_id." has already been broadcasted"."\n", Console::FG_RED);
            }else{
                $this->stdout("Processing Job #".$job->job_id."\n", Console::FG_GREEN);
                $this->stdout($job->job_title." was queued ".Yii::$app->formatter->asRelativeTime($queuedJob->queue_datetime)."\n", Console::FG_YELLOW);

                /**
                * Delete all existing student notifications and qualifications for this job
                */
                StudentJobQualification::deleteAll(['job_id' => $job->job_id]);
                NotificationStudent::deleteAll(['job_id' => $job->job_id]);
                $this->stdout("Deleted all student qualifications and notifications for this job"."\n", Console::FG_RED);

                /**
                 * Find and filter students who qualify, for each student that qualifies - create notification and qualification record
                 */
                $this->stdout("\nLooking for qualified Applicants"."\n", Console::FG_GREY);
                $students = $job->getQualifiedStudents()->all();
                if($students){
                    foreach($students as $student){
                        $studentCount++;
                        $this->stdout($student->student_email. " record found"."\n", Console::FG_YELLOW);
                    }
                }else $this->stdout( "No records found"."\n", Console::FG_YELLOW);

                /**
                 * Set job_broadcasted to BROADCASTED_YES when the broadcast is complete
                 */
                $job->job_broadcasted = Job::BROADCASTED_YES;
                $job->save(false);            

            }

            /**
             * Delete queue record for this job
             */
            $this->stdout("\nRemoving Job from Queue"."\n", Console::FG_RED);
            $queuedJob->delete();
            $this->stdout("Complete, broadcasted job to $studentCount students"."\n", Console::FG_GREEN);
        }else $this->stdout("There are no jobs in the Queue"."\n", Console::FG_RED);
        
        return self::EXIT_CODE_NORMAL;
    }

}
