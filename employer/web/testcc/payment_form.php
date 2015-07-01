<?php include 'security.php' ?>
<?php
$params = [];
//NBK BANK AND TRANSACTION DETAILS
$params['access_key'] = "574f600374cf368db32d6328c0528741";
$params['profile_id'] = "nbk_bawes_acct";
$params['transaction_type'] = "authorization";

//LOCAL DETAILS - can be either en-US or ar-XN
$params['locale'] = "en";

//Unique Track ID for each transaction, no two transactions can have this same ID
$params['transaction_uuid'] = uniqid();

//Unique Reference number, we will use this to know who paid for what (references our db column)
$params['reference_number'] = "123";

//Unsigned fields that a user will be able to edit
$params['unsigned_field_names'] = "bill_to_forename,bill_to_surname,bill_to_email,bill_to_phone";
$params['amount'] = "100.000";
$params['currency'] = "KWD";

//Fields that should be signed to protect from tampering
$params['signed_field_names'] = "access_key,profile_id,transaction_uuid,signed_field_names,unsigned_field_names,signed_date_time,locale,transaction_type,reference_number,amount,currency";
$params['signed_date_time'] = gmdate("Y-m-d\TH:i:s\Z");

//The Signing of the required params
$signature = sign($params);


/**
 * Unsigned Data
 */
$firstName = "noreal";
$lastName = "name";
$email = "null@cybersource.com";
$phone = "99811042";

?>
<html>
<head>
    <title>Secure Acceptance - Payment Form Example</title>
    <link rel="stylesheet" type="text/css" href="payment.css"/>
    <script type="text/javascript" src="jquery-1.7.min.js"></script>
</head>
<body>
<form id="payment_form" action="https://testsecureacceptance.cybersource.com/pay" method="post">
    <input type="hidden" name="access_key" value="<?= $params['access_key'] ?>">
    <input type="hidden" name="profile_id" value="<?= $params['profile_id'] ?>">
    <input type="hidden" name="transaction_type" value="<?= $params['transaction_type'] ?>">
    <input type="hidden" name="locale" value="<?= $params['locale'] ?>">
    
    <!-- Unique Track ID for each transaction, no two transactions can have this same ID -->
    <input type="hidden" name="transaction_uuid" value="<?= $params['transaction_uuid'] ?>">
    
    <!-- Unique Reference number, we will use this to know who paid for what (references our db column) -->
    <input type="hidden" name="reference_number" value="<?= $params['reference_number'] ?>">
    
    <!-- Fields that should be signed to protect from tampering -->
    <input type="hidden" name="signed_field_names" value="<?= $params['signed_field_names'] ?>">
    <input type="hidden" name="signed_date_time" value="<?= $params['signed_date_time'] ?>">
    
    <!-- Unsigned fields that a user will be able to edit -->
    <input type="hidden" name="unsigned_field_names" value="<?= $params['unsigned_field_names'] ?>">
    <input type="hidden" name="bill_to_forename" value="<?= $firstName ?>">
    <input type="hidden" name="bill_to_surname" value="<?= $lastName ?>">
    <input type="hidden" name="bill_to_email" value="<?= $email ?>">
    <input type="hidden" name="bill_to_phone" value="<?= $phone ?>">
    
    <!-- Payment Details -->
    <input type="hidden" name="amount" value="<?= $params['amount'] ?>">
    <input type="hidden" name="currency" value="<?= $params['currency'] ?>">
    
    
    <!-- Parameter Signing to Verify Validity -->
    <input type="hidden" id="signature" name="signature" value="<?= $signature ?>"/>
    
    <input type="submit" id="submit" name="submit" value="Submit"/>
</form>
</body>
</html>
