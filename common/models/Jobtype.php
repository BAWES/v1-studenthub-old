<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "jobtype".
 *
 * @property integer $jobtype_id
 * @property string $jobtype_name_ar
 * @property string $jobtype_name_en
 *
 * @property Job[] $jobs
 */
class Jobtype extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'jobtype';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['jobtype_name_ar', 'jobtype_name_en'], 'required'],
            [['jobtype_name_ar', 'jobtype_name_en'], 'string', 'max' => 255]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'jobtype_id' => Yii::t('app', 'Jobtype ID'),
            'jobtype_name_ar' => Yii::t('app', 'Jobtype Name Ar'),
            'jobtype_name_en' => Yii::t('app', 'Jobtype Name En'),
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getJobs()
    {
        return $this->hasMany(Job::className(), ['jobtype_id' => 'jobtype_id']);
    }
}
