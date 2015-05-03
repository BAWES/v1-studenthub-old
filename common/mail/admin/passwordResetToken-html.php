<?php
use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $admin common\models\Admin */

$resetLink = Yii::$app->urlManager->createAbsoluteUrl(['site/reset-password', 'token' => $admin->admin_password_reset_token]);
?>
<div class="password-reset">
    <p>Hello <?= Html::encode($admin->admin_name) ?>,</p>

    <p>Follow the link below to reset your password:</p>

    <p><?= Html::a(Html::encode($resetLink), $resetLink) ?></p>
</div>
