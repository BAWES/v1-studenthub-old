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
 * @property string $payment_card_type
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
    //const PAYMENT_URL = "https://testsecureacceptance.cybersource.com/pay";
    const PAYMENT_URL = "https://secureacceptance.cybersource.com/pay";

    //Secret key used for signing details (tamper protection)
    const SECRET_KEY = "4d15944ca703497daa938139d7528d464e49d62c9e3e4680873ee6fa996cf62b151265fd52fb41feb3fc82bca47c8c03b63dfc8945cd44abade88953538db6e895d1213c746c41eba8f48ccca944b52fbab58bddb817480cb3aae54edeee97b5a75105fd620c42d9b8447dfef53be8edeba5404bb241474ab1e6e80939a72c50";
    const ACCESS_KEY = "59ab94e4a4d13316934483d264fb2ae6";
    const PROFILE_ID = "552E5BD8-C19C-45D0-8DD8-1713AECE4A93";

    // Previous Data (Expires in August 2017)
    // const SECRET_KEY = "e09f70105dc34fa6990aef3d88161e9d0fd7795a63c64c69b2b76ebc11307abc8d1fe55e892f4d4d8ba49dccb4122d45cce304912200402e8f4d09cff99616403f751b74fc594ad589dadfaa0ab03886d1508a7b1e6647f1af26553f2435c913d52b8e11802e4ed9b8ebe9e65a4b96d8f6eef23c69a7483fbae82a317b21b930";
    // const ACCESS_KEY = "a7467f5eb3be3a81b23a74ff536c4726";

    //Transaction Details
    const TRANSACTION_TYPE = "sale";
    const CURRENCY = "KWD";

    //LOCAL DETAILS - can be either en-US or ar-XN
    public $locale = "en-US";

    //Default Billing Details
    public $billAddressCity = "Kuwait";
    public $billAddressCountry = "KW";
    public $billAddressLine1 = "kaifan";
    public $billAddressPostalCode = "XXXXX";

    //Signed and unsigned fields
    public $signedFields = "";
    public $signedDatetime;
    public $unsignedFields = "";

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
        $this->signedFields = "access_key,profile_id,transaction_uuid,signed_field_names,unsigned_field_names,signed_date_time,locale,transaction_type,reference_number,amount,currency,bill_to_address_country,bill_to_address_city,bill_to_address_line1,bill_to_address_postal_code,bill_to_email,bill_to_forename,bill_to_phone,bill_to_surname";
        $this->signedDatetime = gmdate("Y-m-d\TH:i:s\Z");

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
            'payment_card_type' => Yii::t('app', 'Payment Card Type'),
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

        $params['signed_field_names'] = $this->signedFields;
        $params['signed_date_time'] = $this->signedDatetime;

        $params['unsigned_field_names'] = $this->unsignedFields;

        $params['bill_to_forename'] = $this->payment_first_name;
        $params['bill_to_surname'] = $this->payment_last_name;
        $params['bill_to_email'] = $this->payment_email;
        $params['bill_to_phone'] = $this->payment_phone;

        $params['bill_to_address_city'] = $this->billAddressCity;
        $params['bill_to_address_country'] = $this->billAddressCountry;
        $params['bill_to_address_line1'] = $this->billAddressLine1;
        $params['bill_to_address_postal_code'] = $this->billAddressPostalCode;

        $params['amount'] = $this->payment_amount;
        $params['currency'] = self::CURRENCY;

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
        return $this->hasOne(\employer\models\Employer::className(), ['employer_id' => 'employer_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getJob()
    {
        return $this->hasOne(\employer\models\Job::className(), ['job_id' => 'job_id']);
    }
}
