<?php

namespace employerapi\models;

use Yii;
use yii\behaviors\TimestampBehavior;
use yii\db\Expression;

/**
 * This is the model class for table "payment".
 *
 * @property integer $payment_id
 * @property integer $payment_type_id
 * @property integer $employer_id
 * @property integer $job_id
 * @property string $payment_total
 * @property string $payment_note
 * @property string $payment_employer_credit_before
 * @property string $payment_employer_credit_change
 * @property string $payment_employer_credit_after
 * @property string $payment_datetime
 *
 * @property Employer $employer
 * @property PaymentType $paymentType
 * @property Job $job
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
