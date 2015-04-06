<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "country".
 *
 * @property integer $country_id
 * @property string $country_name_en
 * @property string $country_name_ar
 * @property string $country_nationality_name_en
 * @property string $country_nationality_name_ar
 *
 * @property City[] $cities
 * @property FilterCountry[] $filterCountries
 * @property Filter[] $filters
 * @property Student[] $students
 */
class Country extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'country';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['country_name_en', 'country_name_ar', 'country_nationality_name_en', 'country_nationality_name_ar'], 'string', 'max' => 255]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'country_id' => Yii::t('app', 'Country ID'),
            'country_name_en' => Yii::t('app', 'Country Name En'),
            'country_name_ar' => Yii::t('app', 'Country Name Ar'),
            'country_nationality_name_en' => Yii::t('app', 'Country Nationality Name En'),
            'country_nationality_name_ar' => Yii::t('app', 'Country Nationality Name Ar'),
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getCities()
    {
        return $this->hasMany(City::className(), ['country_id' => 'country_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getFilterCountries()
    {
        return $this->hasMany(FilterCountry::className(), ['country_id' => 'country_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getFilters()
    {
        return $this->hasMany(Filter::className(), ['filter_id' => 'filter_id'])->viaTable('filter_country', ['country_id' => 'country_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getStudents()
    {
        return $this->hasMany(Student::className(), ['country_id' => 'country_id']);
    }
}
