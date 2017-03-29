<?php

namespace studentapi\models;

use Yii;
use yii\db\Expression;

/**
 * This is the model class for table "employer".
 * It extends from \common\models\Employer but with custom functionality for Employer application module
 * 
 */
class Employer extends \common\models\Employer {
    
    /**
     * @inheritdoc
     */
    public function fields()
    {
        $fields = parent::fields();

        // remove fields that contain sensitive information
        unset($fields['employer_auth_key'],
            $fields['employer_password_hash'],
            $fields['employer_password_reset_token'],
            $fields['employer_language_pref'],
            $fields['employer_credit'],
            $fields['employer_email_verification'],
            $fields['employer_support_field'],
            $fields['employer_new_email'],
            $fields['employer_limit_email']
        );

        return $fields;
    }
}