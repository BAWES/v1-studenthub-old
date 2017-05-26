<?php

/* @var $this yii\web\View */
/* @var $student common\models\Student */

$resetLink = Yii::$app->urlManagerFrontend->createAbsoluteUrl(['site/reset-password', 'token' => $student->student_password_reset_token]);
?>
Hello <?= $student->student_firstname ?>,

Follow the link below to reset your password:

<?= $resetLink ?>
