<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "degree".
 *
 * @property integer $degree_id
 * @property string $degree_name_en
 * @property string $degree_name_ar
 *
 * @property Filter[] $filters
 * @property Student[] $students
 */
class Degree extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'degree';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['degree_name_en', 'degree_name_ar'], 'string', 'max' => 255]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'degree_id' => Yii::t('app', 'Degree ID'),
            'degree_name_en' => Yii::t('app', 'Degree Name En'),
            'degree_name_ar' => Yii::t('app', 'Degree Name Ar'),
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getFilters()
    {
        return $this->hasMany(Filter::className(), ['degree_id' => 'degree_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getStudents()
    {
        return $this->hasMany(Student::className(), ['degree_id' => 'degree_id']);
    }
}
