<?php

namespace employerapi\models;

use Yii;
use yii\behaviors\TimestampBehavior;
use yii\db\Expression;
use yii\helpers\ArrayHelper;
use common\models\JobQuestion;

class Job extends \common\models\Job
{
	public function fields() {
		$fields = parent::fields();

		// remove fields that contain sensitive information
		$fields['job_type'] = function($model) {
			return $model->jobtype;
		};
		$fields['status'] = function($model) {
			return $model->jobStatus;
		};
		$fields['questions'] = function($model) {
			return $model->questions;
		};
		$fields['offices'] = function($model) {
			return $model->offices;
		};
		return $fields;
	}

	/**
	 * @param string $modelClass
	 *
	 * @return \yii\db\ActiveQuery
	 */
	public function getOffices($modelClass = '\employerapi\models\jobOffice')
	{
		return parent::getOffices($modelClass);
	}
}
