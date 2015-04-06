<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "filter".
 *
 * @property integer $filter_id
 * @property integer $job_id
 * @property integer $university_id
 * @property integer $degree_id
 * @property string $filter_gpa
 * @property string $filter_graduation_year_start
 * @property string $filter_graduation_year_end
 * @property integer $filter_transportation
 *
 * @property Job $job
 * @property University $university
 * @property Degree $degree
 * @property FilterCountry[] $filterCountries
 * @property Country[] $countries
 * @property FilterLanguage[] $filterLanguages
 * @property Language[] $languages
 * @property FilterMajor[] $filterMajors
 * @property Major[] $majors
 */
class Filter extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'filter';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['job_id', 'university_id', 'degree_id', 'filter_gpa', 'filter_graduation_year_start', 'filter_graduation_year_end', 'filter_transportation'], 'required'],
            [['job_id', 'university_id', 'degree_id', 'filter_transportation'], 'integer'],
            [['filter_gpa'], 'number'],
            [['filter_graduation_year_start', 'filter_graduation_year_end'], 'safe']
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'filter_id' => Yii::t('app', 'Filter ID'),
            'job_id' => Yii::t('app', 'Job ID'),
            'university_id' => Yii::t('app', 'University ID'),
            'degree_id' => Yii::t('app', 'Degree ID'),
            'filter_gpa' => Yii::t('app', 'Filter Gpa'),
            'filter_graduation_year_start' => Yii::t('app', 'Filter Graduation Year Start'),
            'filter_graduation_year_end' => Yii::t('app', 'Filter Graduation Year End'),
            'filter_transportation' => Yii::t('app', 'Filter Transportation'),
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getJob()
    {
        return $this->hasOne(Job::className(), ['job_id' => 'job_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getUniversity()
    {
        return $this->hasOne(University::className(), ['university_id' => 'university_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getDegree()
    {
        return $this->hasOne(Degree::className(), ['degree_id' => 'degree_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getFilterCountries()
    {
        return $this->hasMany(FilterCountry::className(), ['filter_id' => 'filter_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getCountries()
    {
        return $this->hasMany(Country::className(), ['country_id' => 'country_id'])->viaTable('filter_country', ['filter_id' => 'filter_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getFilterLanguages()
    {
        return $this->hasMany(FilterLanguage::className(), ['filter_id' => 'filter_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getLanguages()
    {
        return $this->hasMany(Language::className(), ['language_id' => 'language_id'])->viaTable('filter_language', ['filter_id' => 'filter_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getFilterMajors()
    {
        return $this->hasMany(FilterMajor::className(), ['filter_id' => 'filter_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getMajors()
    {
        return $this->hasMany(Major::className(), ['major_id' => 'major_id'])->viaTable('filter_major', ['filter_id' => 'filter_id']);
    }
}
