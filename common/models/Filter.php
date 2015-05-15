<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "filter".
 *
 * @property integer $filter_id
 * @property integer $university_id
 * @property integer $degree_id
 * @property string $filter_gpa
 * @property string $filter_graduation_year_start
 * @property string $filter_graduation_year_end
 * @property integer $filter_transportation
 *
 * @property University $university
 * @property Degree $degree
 * @property FilterCountry[] $filterCountries
 * @property Country[] $countries
 * @property FilterLanguage[] $filterLanguages
 * @property Language[] $languages
 * @property FilterMajor[] $filterMajors
 * @property Major[] $majors
 * @property Job[] $jobs 
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
            [['university_id', 'degree_id'], 'integer'],
            
            //Default Null Values
            [['university_id','degree_id','filter_gpa','filter_graduation_year_start', 
                'filter_graduation_year_end', 'filter_transportation'], 'default'],
            
            
            //Grad year start cant be higher than graduation year end
            ['filter_graduation_year_start', 'compare', 'compareAttribute' => 'filter_graduation_year_end', 'operator' => '<=',
                'message' => \Yii::t('frontend','Graduation year start must be less than or equal to the graduation year end.')],
            
            //Convert Arabic Numeric Input to English
            [['filter_gpa'], '\common\components\ArabicNumberValidator'],
            //Gpa min and max
            [['filter_gpa'], 'number', 'min' => 0.1, 'max' => 4],
            
            
            
            //University existence validation
            ['university_id', 'exist',
                'targetClass' => '\common\models\University',
                'targetAttribute' => 'university_id',
                'message' => \Yii::t('frontend','This university does not exist.')
            ],
            //Degree existence validation
            ['degree_id', 'exist',
                'targetClass' => '\common\models\Degree',
                'targetAttribute' => 'country_id',
                'message' => \Yii::t('frontend','This degree does not exist.')
            ],
            //Transportation options
            ['filter_transportation', 'in', 'range' => [Student::TRANSPORTATION_AVAILABLE, Student::TRANSPORTATION_NOT_AVAILABLE]],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'filter_id' => Yii::t('app', 'Filter ID'),
            'university_id' => Yii::t('app', 'Only students who study at'),
            'degree_id' => Yii::t('app', 'Only students who expect to earn this degree'),
            'filter_gpa' => Yii::t('app', 'Only students with a GPA of at least'),
            'filter_graduation_year_start' => Yii::t('app', 'Expected Graduation Year Start'),
            'filter_graduation_year_end' => Yii::t('app', 'Expected Graduation Year End'),
            'filter_transportation' => Yii::t('app', 'Only students who have a car'),
        ];
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
    
    /**
     * @return \yii\db\ActiveQuery
     */
    public function getJobs()
    {
        return $this->hasMany(Job::className(), ['filter_id' => 'filter_id']);
    }
}
