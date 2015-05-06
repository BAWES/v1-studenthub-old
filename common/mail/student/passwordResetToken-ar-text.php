<?php

/* @var $this yii\web\View */
/* @var $student common\models\Student */

$resetLink = Yii::$app->urlManager->createAbsoluteUrl(['site/reset-password', 'token' => $student->student_password_reset_token]);
?>
أهلا <?= $student->student_firstname ?>,

اتبع الرابط لإعادة تعيين كلمة المرور الخاصة بك:

<?= $resetLink ?>
