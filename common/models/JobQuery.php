<?php

namespace common\models;

use Yii;
use yii\db\Expression;

/**
 * StudentQuery extends ActiveQuery, allowing easier filtering of students
 */
class JobQuery extends \yii\db\ActiveQuery{
    
    /**
     * Active Jobs Only
     * (Status Open or Status Pending) AND have already been broadcasted
     */
    public function active()
    {
        return $this->where(['in', 'job_status', [Job::STATUS_OPEN, JOB::STATUS_PENDING]])
                    ->andWhere(['job_broadcasted' => Job::BROADCASTED_YES]);
    }
    
    /**
     * Live Jobs Only
     * (Status Open or Status Closed)
     */
    public function live()
    {
        return $this->where(['in', 'job_status', [Job::STATUS_OPEN, JOB::STATUS_CLOSED]]);
    }
    
}