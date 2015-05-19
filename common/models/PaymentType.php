<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "payment_type".
 *
 * @property integer $payment_type_id
 * @property string $payment_type_name_en
 * @property string $payment_type_name_ar
 *
 * @property Payment[] $payments
 */
class PaymentType extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'payment_type';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['payment_type_name_ar'], 'required'],
            [['payment_type_name_en', 'payment_type_name_ar'], 'string', 'max' => 128]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'payment_type_id' => Yii::t('app', 'Payment Type ID'),
            'payment_type_name_en' => Yii::t('app', 'Payment Type Name En'),
            'payment_type_name_ar' => Yii::t('app', 'Payment Type Name Ar'),
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getPayments()
    {
        return $this->hasMany(Payment::className(), ['payment_type_id' => 'payment_type_id']);
    }
}
