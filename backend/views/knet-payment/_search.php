<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model common\models\KnetPaymentSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="knet-payment-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'payment_id') ?>

    <?= $form->field($model, 'employer_id') ?>

    <?= $form->field($model, 'job_id') ?>

    <?= $form->field($model, 'payment_result') ?>

    <?= $form->field($model, 'payment_trackid') ?>

    <?php // echo $form->field($model, 'payment_postdate') ?>

    <?php // echo $form->field($model, 'payment_tranid') ?>

    <?php // echo $form->field($model, 'payment_auth') ?>

    <?php // echo $form->field($model, 'payment_ref') ?>

    <?php // echo $form->field($model, 'payment_udf1') ?>

    <?php // echo $form->field($model, 'payment_udf2') ?>

    <?php // echo $form->field($model, 'payment_udf3') ?>

    <?php // echo $form->field($model, 'payment_udf4') ?>

    <?php // echo $form->field($model, 'payment_udf5') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
