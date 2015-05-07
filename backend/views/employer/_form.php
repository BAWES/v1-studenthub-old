<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model common\models\Employer */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="employer-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'industry_id')->textInput() ?>

    <?= $form->field($model, 'city_id')->textInput() ?>

    <?= $form->field($model, 'employer_company_name')->textInput(['maxlength' => 255]) ?>

    <?= $form->field($model, 'employer_logo')->textInput(['maxlength' => 128]) ?>

    <?= $form->field($model, 'employer_website')->textInput(['maxlength' => 255]) ?>

    <?= $form->field($model, 'employer_company_desc')->textarea(['rows' => 6]) ?>

    <?= $form->field($model, 'employer_num_employees')->textInput() ?>

    <?= $form->field($model, 'employer_contact_firstname')->textInput(['maxlength' => 255]) ?>

    <?= $form->field($model, 'employer_contact_lastname')->textInput(['maxlength' => 255]) ?>

    <?= $form->field($model, 'employer_contact_number')->textInput(['maxlength' => 64]) ?>

    <?= $form->field($model, 'employer_email_preference')->textInput() ?>

    <?= $form->field($model, 'employer_email')->textInput(['maxlength' => 255]) ?>

    <?= $form->field($model, 'employer_password_hash')->textInput(['maxlength' => 255]) ?>

    <?= $form->field($model, 'employer_password_reset_token')->textInput(['maxlength' => 255]) ?>

    <?= $form->field($model, 'employer_language_pref')->textInput(['maxlength' => 64]) ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? Yii::t('app', 'Create') : Yii::t('app', 'Update'), ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
