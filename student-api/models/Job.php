<?php

namespace studentapi\models;

use Yii;
use yii\db\Expression;
use studentapi\models\Employer;
use common\models\Jobtype;

/**
 * This is the model class for table "job".
 * It extends from \common\models\Job but with custom functionality for Job application module
 * 
 */
class Job extends \common\models\Job {
    
    /**
     * @inheritdoc
     */
    public function fields()
    {
        $fields = parent::fields();

        // remove fields that contain sensitive information
        unset($fields['job_status']);

        return $fields;
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getJobtype()
    {
        return $this->hasOne(Jobtype::className(), ['jobtype_id' => 'jobtype_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getEmployer()
    {
        return $this->hasOne(Employer::className(), ['employer_id' => 'employer_id']);
    }
}