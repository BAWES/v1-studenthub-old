<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "city".
 *
 * @property integer $city_id
 * @property integer $country_id
 * @property integer $city_name_en
 * @property integer $city_name_ar
 *
 * @property Country $country
 * @property Employer[] $employers
 */
class City extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'city';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['country_id', 'city_name_en', 'city_name_ar'], 'required'],
            [['country_id', 'city_name_en', 'city_name_ar'], 'integer']
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'city_id' => Yii::t('app', 'City ID'),
            'country_id' => Yii::t('app', 'Country ID'),
            'city_name_en' => Yii::t('app', 'City Name En'),
            'city_name_ar' => Yii::t('app', 'City Name Ar'),
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getCountry()
    {
        return $this->hasOne(Country::className(), ['country_id' => 'country_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getEmployers()
    {
        return $this->hasMany(Employer::className(), ['city_id' => 'city_id']);
    }
    
    /**
     * @return int number of employers
     */
    public function getEmployerCount()
    {
        return $this->hasMany(Employer::className(), ['city_id' => 'city_id'])->count();
    }
}
