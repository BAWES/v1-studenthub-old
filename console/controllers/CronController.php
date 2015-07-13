<?php

namespace console\controllers;

use Yii;
use yii\helpers\Console;
use common\models\JobProcessQueue;
use common\models\Student;
use common\models\Employer;
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
     * Delete all Student Job Applications
     * This is for the Demo server
     * Resets to default state
     */
    public function actionDeleteApplications(){
        StudentJobApplication::deleteAll();
        
        //Reset student password to its original value "demo1"
        $student = Student::findOne(24);
        $student->student_password_hash = '$2y$13$/Aap7aNh2COOue9UJc5PGuo73bpYx.VQhJtvfAUpJ2vv0QHz0AgE.';
        $student->save(false);
        
        //Reset employer password to its original value "demo1"
        $employer = Employer::findOne(14);
        $employer->employer_password_hash = '$2y$13$z4yWLm3PoTEyTyVpUBIzqOXAzq4GtG0Mye2Fk7o.Nx19rbVfP5q9.';
        $employer->save(false);
        
        return self::EXIT_CODE_NORMAL;
    }

}
