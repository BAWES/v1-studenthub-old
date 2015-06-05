<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model common\models\Country */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="country-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'country_name_en')->textInput(['maxlength' => 255]) ?>

    <?= $form->field($model, 'country_name_ar')->textInput(['maxlength' => 255]) ?>

    <?= $form->field($model, 'country_nationality_name_en')->textInput(['maxlength' => 255]) ?>

    <?= $form->field($model, 'country_nationality_name_ar')->textInput(['maxlength' => 255]) ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? Yii::t('app', 'Create') : Yii::t('app', 'Update'), ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
