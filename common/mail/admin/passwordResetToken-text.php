<?php

/* @var $this yii\web\View */
/* @var $admin common\models\Admin */

$resetLink = Yii::$app->urlManager->createAbsoluteUrl(['site/reset-password', 'token' => $admin->admin_password_reset_token]);
?>
Hello <?= $admin->admin_name ?>,

Follow the link below to reset your password:

<?= $resetLink ?>
