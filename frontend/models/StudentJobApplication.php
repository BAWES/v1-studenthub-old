<?php

namespace frontend\models;

use Yii;
use common\models\NotificationEmployer;

/**
 * This is the model class for table "student_job_application".
 * It extends from \common\models\StudentJobApplication but with custom functionality for front-end
 */
class StudentJobApplication extends \common\models\StudentJobApplication {

    /**
     * @inheritdoc
     */
    public function rules() {
        return array_merge(parent::rules(), [
            //Validate job when a student applies)
            ['job_id', 'validateJobApplication'],
        ]);
    }
    
    
    /**
     * Validates if the job application is valid
     * Eg: Student qualifies for the job applied for and answered the questions
     */
    public function validateJobApplication($attribute, $params)
    {
        //Check if student qualifies for this job
        $qualification = \common\models\StudentJobQualification::find()->where([
                'job_id' => $this->job_id,
                'student_id' => Yii::$app->user->identity->student_id,
            ])->with('job')->one();
        
        if($qualification){
            $job = $qualification->job;
            
            /**
             * Check if this job is still active
             */
            if($job->job_status != \common\models\Job::STATUS_OPEN){
                $this->addError($attribute, Yii::t('frontend','This job is no longer available, please refresh to load updated list'));
            }else{
                /**
                 * Check if student already applied for this job
                 */
                $applicationCheck = static::find()->where([
                    'student_id' => $this->student_id,
                    'job_id' => $this->job_id,
                    ])->one();
                if($applicationCheck){
                    $this->addError($attribute, Yii::t('frontend','You have already applied for this job'));
                }else{
                    /**
                     * Check if questions have been answered
                     */
                    if($job->job_question_1 && !trim($this->application_answer_1)){
                        $this->addError($attribute, Yii::t('frontend','Please answer the interview question'));
                    }else if($job->job_question_2 && !trim($this->application_answer_2)){
                        $this->addError($attribute, Yii::t('frontend','Please answer the interview question'));
                    }else if(!$job->job_question_1 && !$job->job_question_2){
                        $this->application_answer_1 = null;
                        $this->application_answer_2 = null;
                    }
                }
            }
            
        }else $this->addError($attribute, Yii::t('frontend','You do not qualify for this job'));
    }

    
    /**
     * @inheritdoc
     */
    public function beforeSave($insert) {
        if (parent::beforeSave($insert)) {
            if ($insert) {
                $this->application_hidden = self::HIDDEN_FALSE;
                
                $job = $this->job;
                
                /**
                 * Notify Employer about this new Application
                 */
                $notification = new NotificationEmployer();
                $notification->employer_id = $job->employer_id;
                $notification->student_id = $this->student_id;
                $notification->job_id = $this->job_id;
                $notification->notification_sent = NotificationEmployer::SENT_FALSE;
                $notification->notification_viewed = NotificationEmployer::VIEWED_FALSE;
                $notification->save();
                
                /**
                 * Update job counters and check if max applicants reached
                 */
                $job->updateCounters(['job_current_num_applicants' => 1]);
                $job->checkMaxApplicantsReached();
                
            }

            return true;
        }
    }

}
