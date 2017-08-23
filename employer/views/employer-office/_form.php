<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model common\models\EmployerOffice */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="employer-office-form">

    <?php $form = ActiveForm::begin(); ?>
    <div class="row">
        <div class="col-md-4">
            <?= $form->field($model, 'office_name_en')->textInput(['maxlength' => true]) ?>
        </div>
        <div class="col-md-4">
            <?= $form->field($model, 'office_name_ar')->textInput(['maxlength' => true]) ?>
        </div>
        <div class="col-md-4">
            <?= $form->field($model, 'office_longitude')->textInput(['maxlength' => true]) ?>
        </div>
    </div>
    <div class="row">
    <div class="col-md-4">
            <?= $form->field($model, 'office_latitude')->textInput(['maxlength' => true]) ?>
        </div>
        <div class="col-md-4">
            <?= $form->field($model, 'city_id')->dropDownList(\yii\helpers\ArrayHelper::map(\common\models\City::find()->all(),'city_id','city_name_en'),['prompt'=>'Please select city']) ?>
        </div>
        <div class="col-md-4">
            <?= $form->field($model, 'office_address')->textarea(['rows' => 6]) ?>
        </div>
    </div>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? Yii::t('app', 'Create') : Yii::t('app', 'Update'), ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
        <?= Html::a(Yii::t('app', 'Back'), ['index'], ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
