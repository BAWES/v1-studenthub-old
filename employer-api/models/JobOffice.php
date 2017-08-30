<?php

namespace employerapi\models;

use Yii;

/**
 * This is the model class for table "job_office".
 *
 * @property integer $job_office_id
 * @property string $job_id
 * @property integer $office_id
 *
 * @property Job $job
 * @property EmployerOffice $office
 */
class JobOffice extends \common\models\JobOffice
{
	public function fields() {
		$fields = parent::fields();

		// remove fields that contain sensitive information
		$fields['office'] = function($model) {
			return $model->office;
		};
		return $fields;
	}
}
