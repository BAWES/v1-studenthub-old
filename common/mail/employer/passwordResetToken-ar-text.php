<?php

/* @var $this yii\web\View */
/* @var $employer common\models\Employer */

$resetLink = Yii::$app->urlManager->createAbsoluteUrl(['site/reset-password', 'token' => $employer->employer_password_reset_token]);
?>
أهلا <?= $employer->employer_contact_firstname ?>,

اتبع الرابط لإعادة تعيين كلمة المرور الخاصة بك:

<?= $resetLink ?>
