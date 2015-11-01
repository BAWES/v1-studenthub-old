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
    //Row ID for the Credit Giveaway payment type
    const TYPE_CREDIT_GIVEAWAY = 1;
    //Row ID for the Refund payment type
    const TYPE_CREDIT_REFUND = 2;
    //Row ID for the Credit payment type
    const TYPE_CREDIT = 3;
    //Row ID for the Credit payment type
    const TYPE_KNET = 4;
    //Row ID for the Credit payment type
    const TYPE_CREDITCARD = 5;
    //Row ID for the Cash payment type
    const TYPE_CASH = 6;
    
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
            [['payment_type_name_en', 'payment_type_name_ar'], 'required'],
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
            'payment_type_name_en' => Yii::t('app', 'Payment Type'),
            'payment_type_name_ar' => Yii::t('app', 'Payment Type [Ar]'),
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getPayments()
    {
        return $this->hasMany(Payment::className(), ['payment_type_id' => 'payment_type_id']);
    }
    
    /**
     * @return int number of payments
     */
    public function getPaymentCount()
    {
        return $this->hasMany(Payment::className(), ['payment_type_id' => 'payment_type_id'])->count();
    }
    
    /**
     * @return real total payments amount made on this type
     */
    public function getTotalPayments(){
        return $this->getPayments()->sum("payment_total");
    }
    
    /**
     * @return real total credit change from this type
     */
    public function getTotalCreditChange(){
        return $this->getPayments()->sum("payment_employer_credit_change");
    }
}
