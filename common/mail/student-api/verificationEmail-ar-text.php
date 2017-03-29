<?php
/* @var $this yii\web\View */
/* @var $student common\models\Student */

$verificationUrl = Yii::$app->urlManager->createAbsoluteUrl(['register/email-verify', 'code' => $student->student_auth_key, 'verify' => $student->student_id]);
?>

أهلا <?= $student->student_firstname ?>

Thanks for joining StudentHub. 

الرجاء الضغط على الرابط التالي للتحقق من بريدك الالكتروني

<?= $verificationUrl ?>

استخدام الرمز المميز في التطبيق للتحقق من البريد الإلكتروني

الرمز المميز : <?= $student->student_auth_key ?>