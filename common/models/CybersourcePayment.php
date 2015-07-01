<?php

namespace common\models;

use Yii;
use yii\behaviors\TimestampBehavior;
use yii\db\Expression;

/**
 * This is the model class for table "cybersource_payment".
 *
 * @property integer $payment_id
 * @property integer $employer_id
 * @property integer $job_id
 * @property string $payment_track_uuid
 * @property string $payment_first_name
 * @property string $payment_last_name
 * @property string $payment_email
 * @property string $payment_phone
 * @property string $payment_country
 * @property string $payment_card_number
 * @property string $payment_card_expiry
 * @property double $payment_amount
 * @property string $payment_message
 * @property string $payment_decision
 * @property string $payment_reason_code
 * @property string $payment_auth_code
 * @property string $payment_signature
 * @property string $payment_datetime
 *
 * @property Employer $employer
 * @property Job $job
 */
class CybersourcePayment extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'cybersource_payment';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['employer_id', 'payment_amount', 'payment_message', 'payment_datetime'], 'required'],
            [['employer_id', 'job_id'], 'integer'],
            [['payment_amount'], 'number'],
            [['payment_message'], 'string'],
            [['payment_datetime'], 'safe'],
            [['payment_track_uuid', 'payment_first_name', 'payment_last_name', 'payment_email', 'payment_signature'], 'string', 'max' => 128],
            [['payment_phone', 'payment_country', 'payment_card_number', 'payment_decision', 'payment_reason_code', 'payment_auth_code'], 'string', 'max' => 64],
            [['payment_card_expiry'], 'string', 'max' => 24]
        ];
    }
    
    public function behaviors() {
        return [
            [
                'class' => TimestampBehavior::className(),
                'createdAtAttribute' => 'payment_datetime',
                'updatedAtAttribute' => false,
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
            'payment_id' => Yii::t('app', 'Payment ID'),
            'employer_id' => Yii::t('app', 'Employer ID'),
            'job_id' => Yii::t('app', 'Job ID'),
            'payment_track_uuid' => Yii::t('app', 'Payment Track Uuid'),
            'payment_first_name' => Yii::t('app', 'Payment First Name'),
            'payment_last_name' => Yii::t('app', 'Payment Last Name'),
            'payment_email' => Yii::t('app', 'Payment Email'),
            'payment_phone' => Yii::t('app', 'Payment Phone'),
            'payment_country' => Yii::t('app', 'Payment Country'),
            'payment_card_number' => Yii::t('app', 'Payment Card Number'),
            'payment_card_expiry' => Yii::t('app', 'Payment Card Expiry'),
            'payment_amount' => Yii::t('app', 'Payment Amount'),
            'payment_message' => Yii::t('app', 'Payment Message'),
            'payment_decision' => Yii::t('app', 'Payment Decision'),
            'payment_reason_code' => Yii::t('app', 'Payment Reason Code'),
            'payment_auth_code' => Yii::t('app', 'Payment Auth Code'),
            'payment_signature' => Yii::t('app', 'Payment Signature'),
            'payment_datetime' => Yii::t('app', 'Payment Datetime'),
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getEmployer()
    {
        return $this->hasOne(Employer::className(), ['employer_id' => 'employer_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getJob()
    {
        return $this->hasOne(Job::className(), ['job_id' => 'job_id']);
    }
}
