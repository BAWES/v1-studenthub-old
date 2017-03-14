<?php

namespace backend\models;

use Yii;
use yii\db\Expression;
use yii\helpers\Url;
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
                //Remove this job from queue (if exists) before adding
                JobProcessQueue::deleteAll(["job_id" => $this->job_id]);
                
                $queue = new JobProcessQueue();
                $queue->job_id = $this->job_id;
                if(!$queue->save()){
                    Yii::error(print_r($queue->errors, true), __METHOD__);
                    print_r($queue->errors);
                    exit();
                }else{
                    Yii::info("[Job #".$this->job_id." - ".$this->job_title."] has been added to broadcasting queue", __METHOD__);
                }
            }
            
            $this->save(false);
            Yii::info("[Job #".$this->job_id." - ".$this->job_title."] has been approved by ".Yii::$app->user->identity->admin_name, __METHOD__);
            
            /**
             * Email to Employer that his job has been approved
             */
            if($this->employer->employer_language_pref == "en-US"){
                //Set language based on preference stored in DB
                Yii::$app->view->params['isArabic'] = false;

                //Send English Email
                Yii::$app->mailer->compose([
                        'html' => "employer/job-approved-html",
                            ], [
                        'employer' => $this->employer,
                        'job' => $this,
                    ])
                    ->setFrom([\Yii::$app->params['supportEmail'] => \Yii::$app->name ])
                    ->setTo([$this->employer->employer_email])
                    ->setSubject("[StudentHub] Your job posting has been approved and posted!")
                    ->send();
            }else{
                //Set language based on preference stored in DB
                Yii::$app->view->params['isArabic'] = true;

                //Send Arabic Email
                Yii::$app->mailer->compose([
                        'html' => "employer/job-approved-ar-html",
                            ], [
                        'employer' => $this->employer,
                        'job' => $this,
                    ])
                    ->setFrom([\Yii::$app->params['supportEmail'] => \Yii::$app->name ])
                    ->setTo([$this->employer->employer_email])
                    ->setSubject("[StudentHub] تم الموافقة على وظيفتك و تم نشرها")
                    ->send();
            }
            
            return true;
        }
        return false;
    }
    
    
    /**
     * Broadcasts the job to qualified students
     * @return int number of students broadcasted to
     */
    public function broadcast() {

        $studentCount = 0;
        
        /**
         * Delete all existing student notifications and qualifications for this job (if exists)
         */
        StudentJobQualification::deleteAll(['job_id' => $this->job_id]);
        NotificationStudent::deleteAll(['job_id' => $this->job_id]);
        
        $studentsBroadcasted = [];

        /**
         * Find and filter students who qualify, for each student that qualifies - create notification and qualification record
         */        
        foreach($this->getQualifiedStudents()->batch() as $students){
            $batchCount = 0;
            $qualifyStudents = [];
            $notifyStudents = [];
            
            foreach($students as $student){
                //Skip if student already passed-through this loop
                if(isset($studentsBroadcasted[$student->student_id])){
                    continue;
                }
                
                /**
                 * Set Job Qualification for this student and append its attributes to the array for batch insert
                 */
                $qualifyStudents[] = [$this->job_id, $student->student_id, new Expression("NOW()")];

                /**
                 * Create notification for this student and append its attributes to the array for batch insert
                 */
                $notifyStudents[] = [$this->job_id, $student->student_id, NotificationStudent::SENT_FALSE, NotificationStudent::VIEWED_FALSE, new Expression("NOW()")];

                /**
                 * Update student count for this job
                 */
                $studentCount++;
                $batchCount++;
                
                //Mark student as passed-through
                $studentsBroadcasted[$student->student_id] = "Sent";
            }
            
            /**
             * Batch Insert to DB if records exist
             */
            if($batchCount > 0){
                Yii::$app->db->createCommand()->batchInsert(StudentJobQualification::tableName(), 
                        ['job_id', 'student_id', 'qualification_datetime'], 
                        $qualifyStudents)->execute();
                Yii::$app->db->createCommand()->batchInsert(NotificationStudent::tableName(), 
                        ['job_id', 'student_id', 'notification_sent', 'notification_viewed', 'notification_datetime'], 
                        $notifyStudents)->execute();
            }
        }
        
        
        /**
         * Set job_broadcasted to BROADCASTED_YES when the broadcast is complete
         */
        if($studentCount > 0){
            Yii::info("[Broadcast] Job #".$this->job_id." has been broadcasted to $studentCount students", __METHOD__);
            $this->job_broadcasted = self::BROADCASTED_YES;
            $this->save(false);
            
            $this->broadcastSocialMedia();
            
        }else Yii::warning("[Broadcast] Job #".$this->job_id." has no qualified students", __METHOD__);
            

        return $studentCount;
    }
    
    
    /**
     * Send email to Buffer so this job gets broadcasted on social media platforms
     * This should only function if the app isn't on demo platform
     */
    public function broadcastSocialMedia(){
        if(!Yii::$app->params['isDemo']){
            Yii::$app->mailer->compose([
                    'htmlLayout' => false,
                ])
                ->setFrom([\Yii::$app->params['supportEmail'] => \Yii::$app->name ])
                ->setTo(["buffer-a476578e6c7d182b43a9@to.bufferapp.com"])
                ->setSubject("Job Opportunity: ".$this->job_title." @ ".$this->employer->employer_company_name)
                ->setTextBody(Url::toRoute(['job/share', 'id' => $this->job_id], true))
                ->send();
        }
    }

}