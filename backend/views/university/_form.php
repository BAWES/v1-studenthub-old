<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use kartik\widgets\SwitchInput

/* @var $this yii\web\View */
/* @var $model common\models\University */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="university-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'university_name')->textInput(['maxlength' => 255]) ?>

    <?= $form->field($model, 'university_domain')->textInput(['maxlength' => 255]) ?>

    <?= $form->field($model, 'university_require_verify')->widget(SwitchInput::classname(), []) ?>

    <?= $form->field($model, 'university_id_template')->textInput(['maxlength' => 255]) ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? Yii::t('app', 'Create') : Yii::t('app', 'Update'), ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
