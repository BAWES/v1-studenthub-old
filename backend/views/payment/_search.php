<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model common\models\PaymentSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="payment-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'payment_id') ?>

    <?= $form->field($model, 'payment_type_id') ?>

    <?= $form->field($model, 'employer_id') ?>

    <?= $form->field($model, 'job_id') ?>

    <?= $form->field($model, 'payment_job_num_applicants') ?>

    <?php // echo $form->field($model, 'payment_job_num_filters') ?>

    <?php // echo $form->field($model, 'payment_job_initial_price_per_applicant') ?>

    <?php // echo $form->field($model, 'payment_job_filter_price_per_applicant') ?>

    <?php // echo $form->field($model, 'payment_job_total_price_per_applicant') ?>

    <?php // echo $form->field($model, 'payment_total') ?>

    <?php // echo $form->field($model, 'payment_note') ?>

    <?php // echo $form->field($model, 'payment_employer_credit_before') ?>

    <?php // echo $form->field($model, 'payment_employer_credit_change') ?>

    <?php // echo $form->field($model, 'payment_employer_credit_after') ?>

    <?php // echo $form->field($model, 'payment_datetime') ?>

    <div class="form-group">
        <?= Html::submitButton(Yii::t('app', 'Search'), ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton(Yii::t('app', 'Reset'), ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
