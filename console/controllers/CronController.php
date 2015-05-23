<?php

namespace console\controllers;

use Yii;
use yii\helpers\Console;
use employer\models\Job;

/**
 * All Cron actions related to this project
 */
class CronController extends \yii\console\Controller {
    
    /**
     * This action will be run once a minute
     */
    public function actionMinute($var) {
        
        echo $var."\n";
        //$this->stdout($var, Console::FG_RED, Console::BG_YELLOW, CONSOLE::BLINK)."\n";
        
        //Yii::error("Issue Happened", "cron");
        
        return self::EXIT_CODE_NORMAL;
    }

}