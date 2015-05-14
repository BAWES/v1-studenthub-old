<?php

namespace employer\models;

use Yii;
use yii\db\Expression;

/**
 * This is the model class for table "job".
 * It extends from \common\models\Job but with custom functionality for Employer application module
 * 
 */
class Job extends \common\models\Job {
    
    /**
     * @inheritdoc
     */
    public function rules() {
        return array_merge(parent::rules(), [
            //Always required
            //[['step', 'majorsSelected', 'languagesSelected'], 'required'],
            
            //Create rule saying that all attributes are safe on draft scenario
        ]);
    }
    
    /**
     * Scenarios for validation, we have a scenario for each step in the job creation process
     */
    public function scenarios() {
        $scenarios = parent::scenarios();
        $scenarios['step1'] = ['job_title', 'jobtype_id', 'job_pay', 'job_responsibilites', 'job_desired_skill',
            'job_other_qualifications', 'job_startdate', 'job_compensation'];
        $scenarios['step2'] = ['job_question_1','job_question_2'];

        return $scenarios;
    }
    
    /**
     * Attribute labels that are inherited are extended here
     */
    public function attributeLabels() {
        return array_merge(parent::attributeLabels(), [
            //'majorsSelected' => Yii::t('app', 'Majors selected'),
        ]);
    }
    
    /**
     * @inheritdoc
     */
    public function afterFind() {
        parent::afterFind();
        
        //Adjust format of the date for validation purposes (when editing)
        if($this->job_startdate){
            $startDate = new \DateTime($this->job_startdate);
            $this->job_startdate = $startDate->format("Y/m/d");
        }
    }
    

}
