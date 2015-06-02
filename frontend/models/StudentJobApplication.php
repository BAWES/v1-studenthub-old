<?php

namespace frontend\models;

use Yii;

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
             * Check if questions have been answered
             */
            if($job->job_question_1 && !$this->application_answer_1){
                $this->addError($attribute, Yii::t('frontend','Please answer the interview question'));
            }else if($job->job_question_2 && !$this->application_answer_2){
                $this->addError($attribute, Yii::t('frontend','Please answer the interview question'));
            }else if(!$job->job_question_1 && !$job->job_question_2){
                $this->application_answer_1 = null;
                $this->application_answer_2 = null;
            }
            
        }else $this->addError($attribute, Yii::t('frontend','You do not qualify for this job'));
    }

    public function beforeSave($insert) {
        if (parent::beforeSave($insert)) {
            if ($insert) {
                $this->application_hidden = self::HIDDEN_FALSE;
            }

            return true;
        }
    }

    public function afterSave($insert, $changedAttributes) {
        parent::afterSave($insert, $changedAttributes);

        //temp
    }

}
