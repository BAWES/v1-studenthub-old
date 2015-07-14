<?php

namespace console\controllers;

use Yii;
use yii\helpers\Console;
use common\models\JobProcessQueue;
use common\models\Student;
use common\models\Employer;
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
        $demoEmployerId = 14;
        $demoStudentId = 24;
        $demoJobId = 49;
        
        /**
         * Delete all job applications except for the one by demo (49)
         */
        StudentJobApplication::deleteAll("job_id != $demoJobId");
        
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
        }
        
        
        return self::EXIT_CODE_NORMAL;
    }

}
