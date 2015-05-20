<?php

namespace common\models;

use Yii;
use yii\behaviors\TimestampBehavior;
use yii\db\Expression;

/**
 * This is the model class for table "payment".
 *
 * @property integer $payment_id
 * @property integer $employer_id
 * @property integer $payment_type_id
 * @property string $payment_amount
 * @property string $payment_note
 * @property string $payment_datetime
 * 
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
            [['employer_id', 'payment_type_id', 'payment_amount'], 'required'],
            [['employer_id', 'payment_type_id'], 'integer'],
            [['payment_amount'], 'number', 'min' => 0.1]
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
            'payment_type_id' => Yii::t('app', 'Payment Type ID'),
            'payment_datetime' => Yii::t('app', 'Payment Datetime'),
            'payment_amount' => Yii::t('app', 'Payment Amount'),
            'payment_note' => 'Payment Note',
        ];
    }
    
    
    public function afterSave($insert, $changedAttributes) {
        parent::afterSave($insert, $changedAttributes);
        
        if($insert){
            //Add the credit to employer account
            $this->employer->updateCounters(['employer_credit' => $this->payment_amount]); 
        }
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
