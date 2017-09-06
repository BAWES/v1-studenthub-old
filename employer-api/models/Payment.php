<?php

namespace employerapi\models;

use Yii;
use yii\behaviors\TimestampBehavior;
use yii\db\Expression;

/**
 * This is the model class for table "payment".
 */
class Payment extends \common\models\Payment {

	public function fields() {
		$fields = parent::fields();

		// remove fields that contain sensitive information
		$fields['payment_type'] = function($model) {
			return $model->paymentType;
		};
		return $fields;
	}
}
