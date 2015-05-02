<?php
/* @var $this yii\web\View */
/* @var $employer common\models\Employer */

$verificationUrl = Yii::$app->urlManager->createAbsoluteUrl(['site/email-verify', 'code' => $employer->employer_auth_key, 'verify' => $employer->employer_id]);
?>

Hi, <?= $employer->employer_contact_firstname ?>

Thanks for joining StudentHub. Please click the following link to verify your email.

<?= $verificationUrl ?>