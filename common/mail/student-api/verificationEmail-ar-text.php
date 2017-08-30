<?php
/* @var $this yii\web\View */
/* @var $student common\models\Student */

?>

أهلا <?= $student->student_firstname ?>

Thanks for joining StudentHub. 

الرجاء الضغط على الرابط التالي للتحقق من بريدك الالكتروني

<?= $verificationUrl ?>

استخدام الرمز المميز في التطبيق للتحقق من البريد الإلكتروني

الرمز المميز : <?= $student->student_auth_key ?>