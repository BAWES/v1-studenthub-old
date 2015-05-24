<?php

namespace backend\models;

use Yii;
use yii\db\Expression;
use common\models\JobProcessQueue;

/**
 * This is the model class for table "job".
 * It extends from \common\models\Job but with custom functionality for Backend application module
 * 
 */
class Job extends \common\models\Job {

    /**
     * Verifies the Job and changes the status to Open
     * @return boolean successfully verified
     */
    public function verify() {
        //If Job pending, verify
        if($this->job_status == self::STATUS_PENDING){
            $this->job_status = self::STATUS_OPEN;
            
            //Add it to the queue if it hasn't been broadcasted
            if($this->job_broadcasted == self::BROADCASTED_NO){
                $queue = new JobProcessQueue();
                $queue->job_id = $this->job_id;
                if(!$queue->save()){
                    print_r($queue->errors);
                    exit();
                }
            }
            
            $this->save(false);
            
            return true;
        }
        return false;
    }

}
