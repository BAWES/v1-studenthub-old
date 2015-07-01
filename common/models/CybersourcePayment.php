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
    private $secretKey = "164f5b8a9c5e47bbaedf912a50ceded6d8d657f03a554434a22b3c5bb89fe7570e9c2ab8cd144a5992ff75f983a500aa030a7140e2164f43b57b35ea21a165315ef6d4d4c96b4022b39d6371cd30567da22426026f8543a4b51dd885aa7f4dff22460e0eff7e4d53bddb3e015fc46f249987de6acf34497da06d405661aa5530";
    
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
     * Checks if provided parameters with signature matches
     * our own secret key signing
     * @param string $params
     * @return boolean
     */
    public static function checkParamsValid($params){
        if (strcmp($params["signature"], self::sign($params))==0) {
            return true;
        }
        
        return false;
    }
    
    /**
     * Signs the parameters using the secret key to avoid tampering
     * @param array $params
     * @return string
     */
    public static function sign ($params) {
        return self::signData(self::buildDataToSign($params), $this->secretKey);
    }

    public static function signData($data, $secretKey) {
        return base64_encode(hash_hmac('sha256', $data, $secretKey, true));
    }
    
    public static function buildDataToSign($params) {
        $signedFieldNames = explode(",",$params["signed_field_names"]);
        foreach ($signedFieldNames as $field) {
           $dataToSign[] = $field . "=" . $params[$field];
        }
        return self::commaSeparate($dataToSign);
    }
    
    public static function commaSeparate ($dataToSign) {
        return implode(",",$dataToSign);
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
