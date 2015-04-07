<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "transaction".
 *
 * @property integer $transaction_id
 * @property integer $job_id
 * @property integer $transaction_number_of_applicants
 * @property string $transaction_price_per_applicant
 * @property string $transaction_price_total
 * @property string $transaction_datetime
 *
 * @property Job $job
 */
class Transaction extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'transaction';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['job_id', 'transaction_number_of_applicants', 'transaction_price_per_applicant', 'transaction_price_total', 'transaction_datetime'], 'required'],
            [['job_id', 'transaction_number_of_applicants'], 'integer'],
            [['transaction_price_per_applicant', 'transaction_price_total'], 'number'],
            [['transaction_datetime'], 'safe']
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'transaction_id' => Yii::t('app', 'Transaction ID'),
            'job_id' => Yii::t('app', 'Job ID'),
            'transaction_number_of_applicants' => Yii::t('app', 'Transaction Number Of Applicants'),
            'transaction_price_per_applicant' => Yii::t('app', 'Transaction Price Per Applicant'),
            'transaction_price_total' => Yii::t('app', 'Transaction Price Total'),
            'transaction_datetime' => Yii::t('app', 'Transaction Datetime'),
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getJob()
    {
        return $this->hasOne(Job::className(), ['job_id' => 'job_id']);
    }
}
