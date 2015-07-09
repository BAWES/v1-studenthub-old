<?php

use yii\helpers\Url;
use yii\helpers\Html;
use common\models\CybersourcePayment;

/* @var $this yii\web\View */
/* @var $payment common\models\CybersourcePayment */

$this->title = Yii::t("employer", 'Credit Card Payment');
$this->params['breadcrumbs'][] = $this->title;

$js = "
$('#csPayment').submit();
";

$this->registerJs($js);
?>


<div class="panel">
    <div class="panel-heading">
        <div class="panel-title">
            <h4><?= $this->title ?></h4>
        </div>
    </div>

    <div class="panel-body">
        <h3 style='text-align:center'>
            <?= Yii::t("employer", "Redirecting to Payment Gateway") ?>
        </h3>
        <div class="loading-bar indeterminate margin-top-10"></div>
        
        <form id="csPayment" action="<?= CybersourcePayment::PAYMENT_URL ?>" method="POST">
            <input type="hidden" name="access_key" value="<?= CybersourcePayment::ACCESS_KEY ?>">
            <input type="hidden" name="profile_id" value="<?= CybersourcePayment::PROFILE_ID ?>">
            <input type="hidden" name="transaction_type" value="<?= CybersourcePayment::TRANSACTION_TYPE ?>">
            
            <input type="hidden" name="locale" value="<?= $payment->locale ?>">

            <!-- Unique Track ID for each transaction, no two transactions can have this same ID -->
            <input type="hidden" name="transaction_uuid" value="<?= $payment->payment_track_uuid ?>">

            <!-- Unique Reference number, we will use this to know who paid for what (references our db column) -->
            <input type="hidden" name="reference_number" value="<?= $payment->payment_track_uuid ?>">

            <!-- Fields that should be signed to protect from tampering -->
            <input type="hidden" name="signed_field_names" value="<?= $payment->signedFields ?>">
            <input type="hidden" name="signed_date_time" value="<?= $payment->signedDatetime ?>">

            <!-- Unsigned fields that a user will be able to edit -->
            <input type="hidden" name="unsigned_field_names" value="<?= $payment->unsignedFields ?>">
            
            <!-- Billing details (customer) -->
            <input type="hidden" name="bill_to_forename" value="<?= $payment->payment_first_name ?>">
            <input type="hidden" name="bill_to_surname" value="<?= $payment->payment_last_name ?>">
            <input type="hidden" name="bill_to_email" value="<?= $payment->payment_email ?>">
            <input type="hidden" name="bill_to_phone" value="<?= $payment->payment_phone ?>">
            
            <!-- Billing details (address) -->
            <input type="hidden" name="bill_to_address_city" value="<?= $payment->billAddressCity ?>">
            <input type="hidden" name="bill_to_address_country" value="<?= $payment->billAddressCountry ?>">
            <input type="hidden" name="bill_to_address_line1" value="<?= $payment->billAddressLine1 ?>">
            <input type="hidden" name="bill_to_address_postal_code" value="<?= $payment->billAddressPostalCode ?>">

            <!-- Payment Details -->
            <input type="hidden" name="amount" value="<?= $payment->payment_amount ?>">
            <input type="hidden" name="currency" value="<?= CybersourcePayment::CURRENCY ?>">


            <!-- Parameter Signature -->
            <input type="hidden" id="signature" name="signature" value="<?= $payment->payment_signature ?>"/>
        </form>
    </div>

</div>
