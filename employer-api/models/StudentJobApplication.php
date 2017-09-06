<?php

namespace employerapi\models;

use Yii;
use yii\behaviors\TimestampBehavior;
use yii\db\Expression;
use common\models\StudentJobApplicationQuestion;

/**
 * This is the model class for table "student_job_application".
 */
class StudentJobApplication extends \common\models\StudentJobApplication
{
	public function fields() {
		$fields = parent::fields();
		$fields['student'] = function($model) {
			return $model->student;
		};

		$fields['questions'] = function($model) {
			return $model->questions;
		};

		return $fields;
	}

	/**
	 * @param string $modelClass
	 *
	 * @return \yii\db\ActiveQuery
	 */
	public function getStudent($modelClass = '\employerapi\models\Student')
	{
		return parent::getStudent($modelClass);
	}


	/**
	 * @param string $modelClass
	 * @return \yii\db\ActiveQuery
	 */
	public function getJob($modelClass = '\employerapi\models\Job')
	{
		return parent::getJob($modelClass);
	}

	/**
	 * @param string $modelClass
	 * @return \yii\db\ActiveQuery
	 */
	public function getQuestions($modelClass = '\employerapi\models\StudentJobApplicationQuestion')
	{
		return parent::getQuestions($modelClass);
	}
}
