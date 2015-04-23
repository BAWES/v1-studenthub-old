<?php
/* @var $this yii\web\View */
/* @var $student common\models\Student */

$verificationUrl = Yii::$app->urlManager->createAbsoluteUrl(['register/email-verify', 'code' => $student->student_auth_key]);
?>

Hi, <?= $student->student_firstname ?>

Thanks for joining StudentHub. Please click the following link to verify your email.

Please click the following link to activate your account: 
<?= $verificationUrl ?>