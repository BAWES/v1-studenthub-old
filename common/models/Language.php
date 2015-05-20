<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "language".
 *
 * @property integer $language_id
 * @property string $language_name_en
 * @property string $language_name_ar
 *
 * @property FilterLanguage[] $filterLanguages
 * @property Filter[] $filters
 * @property StudentLanguage[] $studentLanguages
 * @property Student[] $students
 */
class Language extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'language';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['language_name_en', 'language_name_ar'], 'string', 'max' => 255]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'language_id' => Yii::t('app', 'Language ID'),
            'language_name_en' => Yii::t('app', 'Language Name En'),
            'language_name_ar' => Yii::t('app', 'Language Name Ar'),
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getFilterLanguages()
    {
        return $this->hasMany(FilterLanguage::className(), ['language_id' => 'language_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getFilters()
    {
        return $this->hasMany(Filter::className(), ['filter_id' => 'filter_id'])->viaTable('filter_language', ['language_id' => 'language_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getStudentLanguages()
    {
        return $this->hasMany(StudentLanguage::className(), ['language_id' => 'language_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getStudents()
    {
        return $this->hasMany(Student::className(), ['student_id' => 'student_id'])->viaTable('student_language', ['language_id' => 'language_id']);
    }
    
    /**
     * @return int number of students
     */
    public function getStudentCount()
    {
        return $this->hasMany(Student::className(), ['student_id' => 'student_id'])->viaTable('student_language', ['language_id' => 'language_id'])->count();
    }
}
