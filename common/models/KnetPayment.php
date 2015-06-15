<?php

namespace common\models;

use Yii;
use yii\behaviors\TimestampBehavior;
use yii\db\Expression;

/**
 * This is the model class for table "knet_payment".
 *
 * @property string $payment_id
 * @property integer $employer_id
 * @property integer $job_id
 * @property double $payment_amount
 * @property string $payment_result
 * @property string $payment_postdate
 * @property string $payment_tranid
 * @property string $payment_auth
 * @property string $payment_ref
 * @property string $payment_trackid
 * @property string $payment_udf1
 * @property string $payment_udf2
 * @property string $payment_udf3
 * @property string $payment_udf4
 * @property string $payment_udf5
 * @property string $payment_datetime 
 * 
 * @property Employer $employer
 * @property Job $job
 */
class KnetPayment extends \yii\db\ActiveRecord {

    /**
     * @inheritdoc
     */
    public static function tableName() {
        return 'knet_payment';
    }

    /**
     * @inheritdoc
     */
    public function rules() {
        return [
            [['payment_id', 'employer_id'], 'required'],
            [['payment_id', 'employer_id', 'job_id'], 'integer'],
            [['payment_amount'], 'number'],
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
    public function attributeLabels() {
        return [
            'payment_id' => Yii::t('app', 'Payment ID'),
            'employer_id' => Yii::t('app', 'Employer ID'),
            'job_id' => Yii::t('app', 'Job ID'),
            'payment_amount' => Yii::t('app', 'Payment Amount'),
            'payment_result' => Yii::t('app', 'Payment Result'),
            'payment_postdate' => Yii::t('app', 'Payment Postdate'),
            'payment_tranid' => Yii::t('app', 'Payment Tranid'),
            'payment_auth' => Yii::t('app', 'Payment Auth'),
            'payment_ref' => Yii::t('app', 'Payment Ref'),
            'payment_trackid' => Yii::t('app', 'Payment Trackid'),
            'payment_udf1' => Yii::t('app', 'Payment Udf1'),
            'payment_udf2' => Yii::t('app', 'Payment Udf2'),
            'payment_udf3' => Yii::t('app', 'Payment Udf3'),
            'payment_udf4' => Yii::t('app', 'Payment Udf4'),
            'payment_udf5' => Yii::t('app', 'Payment Udf5'),
            'payment_datetime' => Yii::t('app', 'Payment Datetime'),
        ];
    }

    /**
     * @return \yii\db\ActiveQuery 
     */
    public function getEmployer() {
        return $this->hasOne(Employer::className(), ['employer_id' => 'employer_id']);
    }

    /**
     * @return \yii\db\ActiveQuery 
     */
    public function getJob() {
        return $this->hasOne(Job::className(), ['job_id' => 'job_id']);
    }

}