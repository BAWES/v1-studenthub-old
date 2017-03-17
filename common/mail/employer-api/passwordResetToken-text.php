<?php

/* @var $this yii\web\View */
/* @var $employer common\models\Employer */

$resetLink = Yii::$app->urlManagerEmployer->createAbsoluteUrl(['site/reset-password', 'token' => $employer->employer_password_reset_token]);
?>
Hello <?= $employer->employer_contact_firstname ?>,

Follow the link below to reset your password:

<?= $resetLink ?>

Reset Token :

<?= $employer->employer_password_reset_token ?>