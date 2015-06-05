<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "filter_major".
 *
 * @property integer $filter_id
 * @property integer $major_id
 *
 * @property Filter $filter
 * @property Major $major
 */
class FilterMajor extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'filter_major';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['filter_id', 'major_id'], 'required'],
            [['filter_id', 'major_id'], 'integer']
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'filter_id' => Yii::t('app', 'Filter ID'),
            'major_id' => Yii::t('app', 'Major ID'),
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
    public function getMajor()
    {
        return $this->hasOne(Major::className(), ['major_id' => 'major_id']);
    }
}
