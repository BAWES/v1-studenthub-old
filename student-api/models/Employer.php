<?php

namespace studentapi\models;

use Yii;
use yii\db\Expression;
use common\models\City;
use common\models\Industry;

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

        $fields['city'] = function($model) 
        {
            return $this->city;
        };

        $fields['country'] = function($model) 
        {
            if($this->city)
                return $this->city->country;
        };

        $fields['industry'] = function($model) 
        {
            return $this->industry;
        };

        return $fields;
    }


    /**
     * @return \yii\db\ActiveQuery
     */
    public function getCity()
    {
        return $this->hasOne(City::className(), ['city_id' => 'city_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getIndustry()
    {
        return $this->hasOne(Industry::className(), ['industry_id' => 'industry_id']);
    }
}