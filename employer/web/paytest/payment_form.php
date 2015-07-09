<html>
<head>
    <title>Secure Acceptance - Payment Form Example</title>
    <link rel="stylesheet" type="text/css" href="payment.css"/>
    <script type="text/javascript" src="jquery-1.7.min.js"></script>
</head>
<body>
<form id="payment_form" action="payment_confirmation.php" method="post">
    <input type="hidden" name="access_key" value="574f600374cf368db32d6328c0528741">
    <input type="hidden" name="profile_id" value="D230D2F7-476C-4E1C-8054-045DF37609D5">
    <input type="hidden" name="bill_to_address_city" value="AlXXXXX">
    <input type="hidden" name="bill_to_address_country" value="KW">
    <input type="hidden" name="bill_to_address_line1" value="Bawes">
    <input type="hidden" name="bill_to_address_postal_code" value="XXXXXXX">
    <input type="hidden" name="bill_to_address_state" value="Al Hxxxx">
    <input type="hidden" name="bill_to_email" value="test@yahoo.com">
    <input type="hidden" name="bill_to_forename" value="Exxx">
    <input type="hidden" name="bill_to_phone" value="22111111">
    <input type="hidden" name="bill_to_surname" value="Jxxxxx">
    <input type="hidden" name="transaction_uuid" value="<?php echo uniqid() ?>">
    <input type="hidden" name="signed_field_names" value="access_key,profile_id,transaction_uuid,signed_field_names,unsigned_field_names,signed_date_time,locale,transaction_type,reference_number,amount,currency,bill_to_address_country,bill_to_address_city,bill_to_address_line1,bill_to_address_postal_code,bill_to_address_state,bill_to_email,bill_to_forename,bill_to_phone,bill_to_surname">
    <input type="hidden" name="unsigned_field_names">
    <input type="hidden" name="signed_date_time" value="<?php echo gmdate("Y-m-d\TH:i:s\Z"); ?>">
    <input type="hidden" name="locale" value="en">
    <fieldset>
        <legend>Payment Details</legend>
        <div id="paymentDetailsSection" class="section">
            <span>transaction_type:</span><input type="text" name="transaction_type" size="25"><br/>
            <span>reference_number:</span><input type="text" name="reference_number" size="25"><br/>
            <span>amount:</span><input type="text" name="amount" size="25"><br/>
            <span>currency:</span><input type="text" name="currency" size="25"><br/>
        </div>
    </fieldset>
    <input type="submit" id="submit" name="submit" value="Submit"/>
    <script type="text/javascript" src="payment_form.js"></script>
</form>
</body>
</html>
