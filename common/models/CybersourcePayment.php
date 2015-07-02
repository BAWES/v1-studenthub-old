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
    const PAYMENT_URL = "https://testsecureacceptance.cybersource.com/pay";
    
    //Secret key used for signing details (tamper protection)
    const SECRET_KEY = "164f5b8a9c5e47bbaedf912a50ceded6d8d657f03a554434a22b3c5bb89fe7570e9c2ab8cd144a5992ff75f983a500aa030a7140e2164f43b57b35ea21a165315ef6d4d4c96b4022b39d6371cd30567da22426026f8543a4b51dd885aa7f4dff22460e0eff7e4d53bddb3e015fc46f249987de6acf34497da06d405661aa5530";
    const ACCESS_KEY = "574f600374cf368db32d6328c0528741";
    const PROFILE_ID = "nbk_bawes_acct";
    
    //Transaction Details
    const TRANSACTION_TYPE = "authorization";
    const CURRENCY = "KWD";
    
    //LOCAL DETAILS - can be either en-US or ar-XN
    public $locale = "en-US";
    
    //Signed and unsigned fields
    public $signedFields;
    public $signedDatetime;
    public $unsignedFields;
    
    /**
     * Initiates a new Payment given the parameters
     * @param  \common\models\Employer         $employer
     * @param  double                          $payAmount
     * @param  int                             $jobId
     */
    public function initiatePayment($employer, $payAmount, $jobId = false){
        if ($payAmount <= 0) {
            throw new InvalidParamException('Invalid payment amount');
        }
        
        //Initial transaction messages
        $this->payment_decision = "Payment Attempt";
        $this->payment_message = "Payment Attempt";
        
        //Set Payment Amount
        $this->payment_amount = $payAmount;
        
        //Generate Unique Track Id
        $this->payment_track_uuid = uniqid();
        
        //Set employer details for this payment
        $this->employer_id = $employer->employer_id;
        $this->payment_first_name = $employer->employer_contact_firstname;
        $this->payment_last_name = $employer->employer_contact_lastname;
        $this->payment_email = $employer->employer_email;
        $this->payment_phone = $employer->employer_contact_number;
        
        //If this payment is for a job, add job id
        if($jobId){
            $jobId = (int) $jobId;
            if($jobId > 0){
                $this->job_id = $jobId;
            }
        }
        
        //Set Locale based on Employer language pref
        if($employer->employer_language_pref == "ar-KW"){
            $this->locale = "ar-XN";
        }
        
        //Signed Fields [Tamper Prevented]
        $this->signedFields = "access_key,profile_id,transaction_uuid,signed_field_names,unsigned_field_names,signed_date_time,locale,transaction_type,reference_number,amount,currency";
        $this->signedDatetime = gmdate("Y-m-d\TH:i:s\Z");

        //Unsigned Fields [Customers allowed to edit]
        $this->unsignedFields = "bill_to_forename,bill_to_surname,bill_to_email,bill_to_phone";
        
        //Generate payment signature
        $this->payment_signature = $this->generateSignature();
        
        if(!$this->save()){
            Yii::error(print_r($this->errors, true), __METHOD__);
        }
    }
    
    
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
            [['employer_id', 'payment_amount', 'payment_message'], 'required'],
            [['employer_id', 'job_id'], 'integer'],
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
     * Generates payment signature for the current params
     * @return string
     */
    public function generateSignature(){
        $params = [];
        $params['access_key'] = self::ACCESS_KEY;
        $params['profile_id'] = self::PROFILE_ID;
        $params['transaction_type'] = self::TRANSACTION_TYPE;
        $params['locale'] = $this->locale;
        $params['transaction_uuid'] = $this->payment_track_uuid;
        $params['reference_number'] = $this->payment_track_uuid;
        $params['unsigned_field_names'] = $this->unsignedFields;
        $params['amount'] = $this->payment_amount;
        $params['currency'] = self::CURRENCY;
        $params['signed_field_names'] = $this->signedFields;
        $params['signed_date_time'] = $this->signedDatetime;
        
        return self::sign($params);
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
        return self::signData(self::buildDataToSign($params), self::SECRET_KEY);
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
