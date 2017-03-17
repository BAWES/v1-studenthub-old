<?php

namespace common\models;

use Yii;
use yii\behaviors\TimestampBehavior;
use yii\db\Expression;

/**
 * This is the model class for table "employer_office".
 *
 * @property integer $office_id
 * @property string $employer_id
 * @property string $city_id
 * @property string $office_name_en
 * @property string $office_name_ar
 * @property string $office_longitude
 * @property string $office_latitude
 * @property string $office_address
 * @property string $office_created_at
 * @property string $office_updated_at
 *
 * @property City $city
 * @property Employer $employer
 */
class EmployerOffice extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'employer_office';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['employer_id', 'city_id'], 'integer'],
            [['office_longitude', 'office_latitude'], 'number'],
            [['office_address'], 'string'],
            [['office_created_at', 'office_updated_at'], 'safe'],
            [['office_name_en', 'office_name_ar'], 'string', 'max' => 100],
            [['city_id'], 'exist', 'skipOnError' => true, 'targetClass' => City::className(), 'targetAttribute' => ['city_id' => 'city_id']],
            [['employer_id'], 'exist', 'skipOnError' => true, 'targetClass' => Employer::className(), 'targetAttribute' => ['employer_id' => 'employer_id']],
        ];
    }

    public function behaviors() {
        return [
            [
                'class' => TimestampBehavior::className(),
                'createdAtAttribute' => 'office_created_at',
                'updatedAtAttribute' => 'office_updated_at',
                'value' => new Expression('NOW()'),
            ],
        ];
    }
    
    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'office_id' => 'Office ID',
            'employer_id' => 'Employer ID',
            'city_id' => 'City ID',
            'office_name_en' => 'Office Name En',
            'office_name_ar' => 'Office Name Ar',
            'office_longitude' => 'Office Longitude',
            'office_latitude' => 'Office Latitude',
            'office_address' => 'Office Address',
            'office_created_at' => 'Office Created At',
            'office_updated_at' => 'Office Updated At',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getCity()
    {
        return $this->hasOne(City::className(), ['city_id' => 'city_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getEmployer()
    {
        return $this->hasOne(Employer::className(), ['employer_id' => 'employer_id']);
    }
}
