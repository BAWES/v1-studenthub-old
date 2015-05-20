<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model common\models\Job */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="job-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'jobtype_id')->textInput() ?>

    <?= $form->field($model, 'job_title')->textInput(['maxlength' => 255]) ?>

    <?= $form->field($model, 'job_pay')->textInput() ?>

    <?= $form->field($model, 'job_startdate')->textInput() ?>

    <?= $form->field($model, 'job_responsibilites')->textarea(['rows' => 6]) ?>

    <?= $form->field($model, 'job_other_qualifications')->textarea(['rows' => 6]) ?>

    <?= $form->field($model, 'job_desired_skill')->textarea(['rows' => 6]) ?>

    <?= $form->field($model, 'job_compensation')->textInput(['maxlength' => 255]) ?>

    <?= $form->field($model, 'job_max_applicants')->textInput() ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? Yii::t('app', 'Create') : Yii::t('app', 'Update'), ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
