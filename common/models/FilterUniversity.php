<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "filter_university".
 *
 * @property integer $filter_id
 * @property integer $university_id
 *
 * @property Filter $filter
 * @property University $university
 */
class FilterUniversity extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'filter_university';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['filter_id', 'university_id'], 'required'],
            [['filter_id', 'university_id'], 'integer']
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'filter_id' => Yii::t('app', 'Filter ID'),
            'university_id' => Yii::t('app', 'University ID'),
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getFilter()
    {
        return $this->hasOne(Filter::className(), ['filter_id' => 'filter_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getUniversity()
    {
        return $this->hasOne(University::className(), ['university_id' => 'university_id']);
    }
}
