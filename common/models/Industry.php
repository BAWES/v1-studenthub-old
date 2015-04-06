<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "industry".
 *
 * @property integer $industry_id
 * @property string $industry_name_ar
 * @property string $industry_name_en
 *
 * @property Employer[] $employers
 */
class Industry extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'industry';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['industry_name_ar', 'industry_name_en'], 'required'],
            [['industry_name_ar', 'industry_name_en'], 'string', 'max' => 255]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'industry_id' => Yii::t('app', 'Industry ID'),
            'industry_name_ar' => Yii::t('app', 'Industry Name Ar'),
            'industry_name_en' => Yii::t('app', 'Industry Name En'),
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getEmployers()
    {
        return $this->hasMany(Employer::className(), ['industry_id' => 'industry_id']);
    }
}
