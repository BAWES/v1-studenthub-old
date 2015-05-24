<?php

namespace console\controllers;

use Yii;
use yii\helpers\Console;
use common\models\Job;

/**
 * All Cron actions related to this project
 */
class CronController extends \yii\console\Controller {
    
    /**
     * This action will be run once a minute
     */
    public function actionMinute() {
        
        
        //Processed Note!!!:
        //Make sure to ignore already processed jobs
        //When admin approves a pending job, make sure to not add processed jobs to queue
        
        
        
        //echo $var."\n";
        //$this->stdout($var, Console::FG_RED, Console::BG_YELLOW, CONSOLE::BLINK)."\n";
        //Yii::error("Issue Happened", "cron");
        
        $jobs = Job::find()->all();
        
        $this->stdout("Number of jobs: ".count($jobs)."\n", Console::FG_RED);
        
        foreach($jobs as $job){
            $this->stdout($job->job_title."\n");
        }
        
        //Set job_broadcasted to BROADCASTED_YES when the broadcast is complete
        
        return self::EXIT_CODE_NORMAL;
    }

}