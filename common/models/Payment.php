<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "payment".
 *
 * @property integer $payment_id
 * @property integer $employer_id
 * @property integer $payment_type_id
 * @property string $payment_datetime
 * @property string $payment_amount
 *
 * @property Employer $employer
 * @property PaymentType $paymentType
 */
class Payment extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'payment';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['employer_id', 'payment_type_id', 'payment_datetime', 'payment_amount'], 'required'],
            [['employer_id', 'payment_type_id'], 'integer'],
            [['payment_datetime'], 'safe'],
            [['payment_amount'], 'number']
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
            'payment_type_id' => Yii::t('app', 'Payment Type ID'),
            'payment_datetime' => Yii::t('app', 'Payment Datetime'),
            'payment_amount' => Yii::t('app', 'Payment Amount'),
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
    public function getPaymentType()
    {
        return $this->hasOne(PaymentType::className(), ['payment_type_id' => 'payment_type_id']);
    }
}
