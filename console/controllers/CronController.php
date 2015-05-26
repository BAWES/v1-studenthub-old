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
     * Process the next job in Queue
     */
    public function actionProcessNextJob() {
        /**
         * Find the oldest job in the queue
         */
        JobProcessQueue::processNextJob();
        
        
        return self::EXIT_CODE_NORMAL;
    }

}
