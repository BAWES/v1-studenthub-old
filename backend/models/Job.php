<?php

namespace backend\models;

use Yii;
use yii\db\Expression;
use common\models\JobProcessQueue;
use common\models\StudentJobQualification;
use common\models\NotificationStudent;

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
                    Yii::error(print_r($queue->errors, true));
                    print_r($queue->errors);
                    exit();
                }
            }
            
            $this->save(false);
            
            return true;
        }
        return false;
    }
    
    
    /**
     * Broadcasts the job to qualified students
     * @return int number of students broadcasted to
     */
    public function broadcast(){
        $studentCount = 0;
        
        /**
        * Delete all existing student notifications and qualifications for this job (if exists)
        */
        StudentJobQualification::deleteAll(['job_id' => $this->job_id]);
        NotificationStudent::deleteAll(['job_id' => $this->job_id]);

        /**
         * Find and filter students who qualify, for each student that qualifies - create notification and qualification record
         */

        $students = $this->getQualifiedStudents()->all();
        if($students){
            foreach($students as $student){
                /**
                 * Create notification and qualification records for this student
                 */




                $studentCount++;
            }

            /**
            * Set job_broadcasted to BROADCASTED_YES when the broadcast is complete
            */
           Yii::info("Broadcasted Job #".$this->job_id." to $studentCount students", __METHOD__);
           $this->job_broadcasted = self::BROADCASTED_YES;
           $this->save(false);

        }else Yii::warning("Job #".$this->job_id." has no qualified students", __METHOD__);
            

        return $studentCount;
    }

}
