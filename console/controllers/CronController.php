<?php

namespace console\controllers;

use Yii;
use yii\helpers\Console;
use yii\db\Expression;
use common\models\JobProcessQueue;
use common\models\Student;
use common\models\Employer;
use common\models\NotificationStudent;
use common\models\NotificationEmployer;
use common\models\Job;
use common\models\StudentJobApplication;

/**
 * All Cron actions related to this project
 */
class CronController extends \yii\console\Controller {
    
    /**
     * Used for testing only
     */
    public function actionIndex(){
        $this->stdout("Test Email Function \n", Console::FG_RED, Console::BOLD);
    }
    
    /**
     * Method called by cron every 5 minutes or so
     */
    public function actionMinute() {
        //Process next job in queue
        JobProcessQueue::processNextJob();
        
        return self::EXIT_CODE_NORMAL;
    }
    
    
    /**
     * Method called by cron once a day to send email to all Students and Employers
     */
    public function actionDailyEmail(){
        Student::broadcastNotificationEmail(Student::NOTIFICATION_DAILY);
        Employer::broadcastNotificationEmail(Employer::NOTIFICATION_DAILY);
        
        return self::EXIT_CODE_NORMAL;
    }
    
    /**
     * Method called by cron once a week to send email to all Students and Employers
     */
    public function actionWeeklyEmail(){
        Student::broadcastNotificationEmail(Student::NOTIFICATION_WEEKLY);
        Employer::broadcastNotificationEmail(Employer::NOTIFICATION_WEEKLY);
        
        return self::EXIT_CODE_NORMAL;
    }
    
    /**
     * Resets the demo to default state
     */
    public function actionResetDemo(){
        if(Yii::$app->params['isDemo']){
            $demoEmployerId = 14;
            $demoStudentId = 24;
            $demoJobId = 49;

            /**
             * Delete all job applications except for the ones made for demo (49)
             */
            StudentJobApplication::deleteAll("job_id != $demoJobId");

            /**
             * Delete all job applications and notifications made by the demo student account (24)
             */
            StudentJobApplication::deleteAll("student_id = $demoStudentId");
            NotificationEmployer::deleteAll("student_id = $demoStudentId");

            /**
             * Update Timestamp on all Notifications, set to now
             */
            NotificationEmployer::updateAll(['notification_datetime' => new Expression('NOW()')]);
            NotificationStudent::updateAll(['notification_datetime' => new Expression('NOW()')]);


            /**
             * Set number of applicants to zero for all jobs except for one by demo (49)
             */
            Job::updateAll(['job_current_num_applicants' => 0], "job_id != $demoJobId");

            /**
             * Set the demo job to have 3 applicants only
             */
            $demoJob = Job::findOne($demoJobId);
            $demoJob->job_current_num_applicants = 3;
            $demoJob->save(false);

            /**
             * Mark all notifications as "Unread"
             */
            NotificationStudent::updateAll(['notification_viewed' => NotificationStudent::VIEWED_FALSE]);
            NotificationEmployer::updateAll(['notification_viewed' => NotificationEmployer::VIEWED_FALSE]);

            /*
             * Delete all jobs/filters/relations that belong to demo account except for demo one (49)
             */
            $demoJobs = Job::find()->where(['employer_id' => $demoEmployerId])
                                    ->andWhere("job_id != $demoJobId")
                                    ->all();
            foreach($demoJobs as $job){
                //Clear all details linked to this job then delete this job
                $job->unlinkAll('notificationEmployers', true);
                $job->unlinkAll('notificationStudents', true);
                $job->unlinkAll('studentJobApplications', true);
                $job->unlinkAll('studentJobQualifications', true);
                $job->unlinkAll('payments', true);
                $job->unlinkAll('notificationEmployers', true);
                $job->delete();
            }
        }
        
        return self::EXIT_CODE_NORMAL;
    }

}
