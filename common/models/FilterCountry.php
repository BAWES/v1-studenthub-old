<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "filter_country".
 *
 * @property integer $filter_id
 * @property integer $country_id
 *
 * @property Filter $filter
 * @property Country $country
 */
class FilterCountry extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'filter_country';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['filter_id', 'country_id'], 'required'],
            [['filter_id', 'country_id'], 'integer']
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'filter_id' => Yii::t('app', 'Filter ID'),
            'country_id' => Yii::t('app', 'Country ID'),
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
    public function getCountry()
    {
        return $this->hasOne(Country::className(), ['country_id' => 'country_id']);
    }
}
