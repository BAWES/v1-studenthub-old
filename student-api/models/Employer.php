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
        $fields['employer_password_reset_token']);

        return $fields;
    }
}