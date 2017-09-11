<?php

namespace employerapi\models;

/**
 * This is the model class for table "student".
 */
class Student extends \common\models\Student {

	/**
	 * @return array
	 */
	public function fields() {
		$fields = parent::fields();
		unset(
			$fields["student_verification_attachment"],
			$fields["student_email_verification"],
			$fields["student_id_verification"],
			$fields["student_id_number"],
			$fields["student_email_preference"],
			$fields["student_auth_key"],
            $fields["student_password_hash"],
            $fields["student_password_reset_token"],
            $fields["student_language_pref"],
            $fields["student_banned"],
            $fields["student_support_field"],
            $fields["student_limit_email"],
            $fields["student_updated_datetime"],
            $fields["student_datetime"]
		);

		$fields['university'] = function ($model) {
			return $model->university;
		};
		$fields['degree'] = function ($model) {
			return $model->degree;
		};
		$fields['language'] = function ($model) {
			return $model->languages;
		};
		return $fields;
	}
}
