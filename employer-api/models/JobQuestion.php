<?php

namespace employerapi\models;

use Yii;
use yii\db\Expression;
use yii\behaviors\TimestampBehavior;
/**
 * This is the model class for table "job_question".
 *
 * @property integer $job_question_id
 * @property string $job_id
 * @property string $question
 * @property string $question_created_at
 * @property string $question_updated_at
 *
 * @property Job $job
 * @property StudentJobApplicationQuestion[] $studentJobApplicationQuestions
 */
class JobQuestion extends \common\models\JobQuestion
{

	/**
	 * @param string $modelClass
	 *
	 * @return \yii\db\ActiveQuery
	 */
    public function getJob($modelClass = '\employerapi\models\job')
    {
        return parent::getJob($modelClass);
    }
}
