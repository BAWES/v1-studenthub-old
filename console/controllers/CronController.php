<?php

namespace console\controllers;

use Yii;
use yii\helpers\Console;
use common\models\JobProcessQueue;
use common\models\Student;
use common\models\Employer;

/**
 * All Cron actions related to this project
 */
class CronController extends \yii\console\Controller {
    
    /**
     * Used for testing only
     */
    public function actionIndex(){
        $this->stdout("Test Function \n", Console::FG_RED, Console::BOLD);
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
        $this->stdout("Initiating Daily Email Broadcast for Students\n", Console::FG_GREEN, Console::BOLD);
        
        //Find All Students which have notification preference set to Daily
        $students = Student::find()
                    ->with('unsentNotifications')
                    ->where([
                        'student_email_preference' => Student::NOTIFICATION_DAILY,
                        'student_email_verification' => Student::EMAIL_VERIFIED,
                        'student_id_verification' => Student::ID_VERIFIED,
                        ]);
        
        foreach($students->each(50) as $student){
            /**
             * Send this student all his "unsent" notifications
             * then set all his notifications as "sent"
             * Preferably you add this to the Student model: $student->emailNotificationSummary
             */
            $unsentNotifications = $student->unsentNotifications;
            if(count($unsentNotifications) > 0){
                $this->stdout("Sending Email to ".$student->student_firstname." with ".count($unsentNotifications)
                            ." unsent notifications \n");
            }
        }
        
        /**
         * Start Employer Logic
         */
        $this->stdout("Initiating Daily Email Broadcast for Employers\n", Console::FG_GREEN, Console::BOLD);
        
        //Find All Employers which have notification preference set to Daily
        $employers = Employer::find()
                    ->with('unsentNotifications')
                    ->where([
                        'employer_email_preference' => Employer::NOTIFICATION_DAILY,
                        'employer_email_verification' => Employer::EMAIL_VERIFIED,
                        ]);
        
        foreach($employers->each(50) as $employer){
            /**
             * Send this employer all his "unsent" notifications
             * then set all his notifications as "sent"
             * Preferably you add this to the Student model: $employer->emailNotificationSummary
             */
            $unsentNotifications = $employer->unsentNotifications;
            if(count($unsentNotifications) > 0){
                $this->stdout("Sending Email to ".$employer->employer_contact_firstname." with ".count($unsentNotifications)
                            ." unsent notifications \n");
            }
        }
    }
    
    /**
     * Method called by cron once a week to send email to all Students and Employers
     */
    public function actionWeeklyEmail(){
        $this->stdout("Initiating Weekly Email Broadcast \n", Console::FG_GREEN, Console::BOLD);
        
        //Exact same as above logic but Employer::NOTIFICATION_WEEKLY/STUDENT WEEKLY
    }

}