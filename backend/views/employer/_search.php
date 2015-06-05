<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model common\models\EmployerSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="employer-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'employer_id') ?>

    <?= $form->field($model, 'industry_id') ?>

    <?= $form->field($model, 'city_id') ?>

    <?= $form->field($model, 'employer_company_name') ?>

    <?= $form->field($model, 'employer_logo') ?>

    <?php // echo $form->field($model, 'employer_website') ?>

    <?php // echo $form->field($model, 'employer_company_desc') ?>

    <?php // echo $form->field($model, 'employer_num_employees') ?>

    <?php // echo $form->field($model, 'employer_contact_firstname') ?>

    <?php // echo $form->field($model, 'employer_contact_lastname') ?>

    <?php // echo $form->field($model, 'employer_contact_number') ?>

    <?php // echo $form->field($model, 'employer_credit') ?>

    <?php // echo $form->field($model, 'employer_email_preference') ?>

    <?php // echo $form->field($model, 'employer_email') ?>

    <?php // echo $form->field($model, 'employer_email_verification') ?>

    <?php // echo $form->field($model, 'employer_auth_key') ?>

    <?php // echo $form->field($model, 'employer_password_hash') ?>

    <?php // echo $form->field($model, 'employer_password_reset_token') ?>

    <?php // echo $form->field($model, 'employer_language_pref') ?>

    <?php // echo $form->field($model, 'employer_limit_email') ?>

    <?php // echo $form->field($model, 'employer_updated_datetime') ?>

    <?php // echo $form->field($model, 'employer_datetime') ?>

    <div class="form-group">
        <?= Html::submitButton(Yii::t('app', 'Search'), ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton(Yii::t('app', 'Reset'), ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
