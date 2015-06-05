<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model common\models\JobSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="job-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'job_id') ?>

    <?= $form->field($model, 'jobtype_id') ?>

    <?= $form->field($model, 'employer_id') ?>

    <?= $form->field($model, 'filter_id') ?>

    <?= $form->field($model, 'job_title') ?>

    <?php // echo $form->field($model, 'job_pay') ?>

    <?php // echo $form->field($model, 'job_startdate') ?>

    <?php // echo $form->field($model, 'job_responsibilites') ?>

    <?php // echo $form->field($model, 'job_other_qualifications') ?>

    <?php // echo $form->field($model, 'job_desired_skill') ?>

    <?php // echo $form->field($model, 'job_compensation') ?>

    <?php // echo $form->field($model, 'job_question_1') ?>

    <?php // echo $form->field($model, 'job_question_2') ?>

    <?php // echo $form->field($model, 'job_max_applicants') ?>

    <?php // echo $form->field($model, 'job_current_num_applicants') ?>

    <?php // echo $form->field($model, 'job_status') ?>

    <?php // echo $form->field($model, 'job_price_per_applicant') ?>

    <?php // echo $form->field($model, 'job_updated_datetime') ?>

    <?php // echo $form->field($model, 'job_created_datetime') ?>

    <div class="form-group">
        <?= Html::submitButton(Yii::t('app', 'Search'), ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton(Yii::t('app', 'Reset'), ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
