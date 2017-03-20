<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "job_office".
 *
 * @property integer $job_office_id
 * @property string $job_id
 * @property integer $office_id
 *
 * @property Job $job
 * @property EmployerOffice $office
 */
class JobOffice extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'job_office';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['job_id', 'office_id'], 'integer'],
            [['job_id'], 'exist', 'skipOnError' => true, 'targetClass' => Job::className(), 'targetAttribute' => ['job_id' => 'job_id']],
            [['office_id'], 'exist', 'skipOnError' => true, 'targetClass' => EmployerOffice::className(), 'targetAttribute' => ['office_id' => 'office_id']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'job_office_id' => 'Job Office ID',
            'job_id' => 'Job ID',
            'office_id' => 'Office ID',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getJob()
    {
        return $this->hasOne(Job::className(), ['job_id' => 'job_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getOffice()
    {
        return $this->hasOne(EmployerOffice::className(), ['office_id' => 'office_id']);
    }
}
