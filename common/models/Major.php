<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "major".
 *
 * @property integer $major_id
 * @property string $major_name_en
 * @property string $major_name_ar
 *
 * @property FilterMajor[] $filterMajors
 * @property Filter[] $filters
 * @property Student[] $students
 */
class Major extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'major';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['major_name_ar'], 'required'],
            [['major_name_en', 'major_name_ar'], 'string', 'max' => 255]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'major_id' => Yii::t('app', 'Major ID'),
            'major_name_en' => Yii::t('app', 'Major Name En'),
            'major_name_ar' => Yii::t('app', 'Major Name Ar'),
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getFilterMajors()
    {
        return $this->hasMany(FilterMajor::className(), ['major_id' => 'major_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getFilters()
    {
        return $this->hasMany(Filter::className(), ['filter_id' => 'filter_id'])->viaTable('filter_major', ['major_id' => 'major_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getStudents()
    {
        return $this->hasMany(Student::className(), ['major_id' => 'major_id']);
    }
}
