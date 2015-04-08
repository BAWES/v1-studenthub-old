<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use kartik\switchinput\SwitchInput;
use kartik\file\FileInput;

/* @var $this yii\web\View */
/* @var $model common\models\University */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="university-form">

    <?php $form = ActiveForm::begin(['options' => ['enctype' => 'multipart/form-data']]); ?>

    <?= $form->field($model, 'university_name_en')->textInput(['maxlength' => 255]) ?>

    <?= $form->field($model, 'university_name_ar')->textInput(['maxlength' => 255]) ?>

    <?= $form->field($model, 'university_domain')->textInput(['maxlength' => 255]) ?>

    <?= $form->field($model, 'university_require_verify')->widget(SwitchInput::classname(), []) ?>

    <?= $form->field($model, 'university_id_template')->widget(FileInput::classname(), [
        'options' => ['accept' => 'image/*'],
    ]) ?>

    <?= $form->field($model, 'university_logo')->fileInput() ?>

    <?= $form->field($model, 'university_graphic')->fileInput() ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? Yii::t('app', 'Create') : Yii::t('app', 'Update'), ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
