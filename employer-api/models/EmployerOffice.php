<?php

namespace employerapi\models;

use Yii;
use yii\behaviors\TimestampBehavior;
use yii\db\Expression;

/**
 * This is the model class for table "employer_office".
 *
 * @property integer $office_id
 * @property string $employer_id
 * @property string $city_id
 * @property string $office_name_en
 * @property string $office_name_ar
 * @property string $office_longitude
 * @property string $office_latitude
 * @property string $office_address
 * @property string $office_created_at
 * @property string $office_updated_at
 *
 * @property City $city
 * @property Employer $employer
 */
class EmployerOffice extends \common\models\EmployerOffice {

	public function fields() {
		$fields = parent::fields();

		// remove fields that contain sensitive information
		$fields['city_name'] = function($model) {
			return $model->city->city_name_en;
		};
		return $fields;
	}

}
