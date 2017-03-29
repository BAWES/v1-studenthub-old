<?php
/* @var $this yii\web\View */
/* @var $student common\models\Student */

$verificationUrl = Yii::$app->urlManager->createAbsoluteUrl(['register/email-verify', 'code' => $student->student_auth_key, 'verify' => $student->student_id]);
?>

Hi, <?= $student->student_firstname ?>

Thanks for joining StudentHub. Please click the following link to verify your email.

<?= $verificationUrl ?>

Use token in app to verify email

Token : <?= $student->student_auth_key ?>