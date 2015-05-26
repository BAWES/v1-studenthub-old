<?php

namespace console\controllers;

use Yii;
use yii\helpers\Console;
use common\models\JobProcessQueue;


/**
 * All Cron actions related to this project
 */
class CronController extends \yii\console\Controller {
    
    /**
     * Method called by cron every minute
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
        
    }
    
    /**
     * Method called by cron once a week to send email to all Students and Employers
     */
    public function actionWeeklyEmail(){
        
    }

}