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
        $this->stdout("Test Email Function \n", Console::FG_RED, Console::BOLD);
        //Test Emailing via CRON
        
        //Send English Email
        Yii::$app->mailer->compose([
                'html' => "student/notification-html",
                    ], [
                'student' => \common\models\Student::findOne(10),
                'notifications' => [],
            ])
            ->setFrom([\Yii::$app->params['supportEmail'] => \Yii::$app->name ])
            ->setTo(["khalid@bawes.net"])
            ->setSubject("[StudentHub] X New Job Openings Available")
            ->send();
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
        Student::broadcastDailyNotificationEmail();
        Employer::broadcastDailyNotificationEmail();
        
        return self::EXIT_CODE_NORMAL;
    }
    
    /**
     * Method called by cron once a week to send email to all Students and Employers
     */
    public function actionWeeklyEmail(){
        $this->stdout("Initiating Weekly Email Broadcast \n", Console::FG_GREEN, Console::BOLD);
        
        //Exact same as above logic but Employer::NOTIFICATION_WEEKLY/STUDENT WEEKLY
    }

}