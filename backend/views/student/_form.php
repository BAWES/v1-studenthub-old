<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model common\models\Student */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="student-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'degree_id')->textInput() ?>

    <?= $form->field($model, 'country_id')->textInput() ?>

    <?= $form->field($model, 'university_id')->textInput() ?>

    <?= $form->field($model, 'student_firstname')->textInput(['maxlength' => 255]) ?>

    <?= $form->field($model, 'student_lastname')->textInput(['maxlength' => 255]) ?>

    <?= $form->field($model, 'student_dob')->textInput() ?>

    <?= $form->field($model, 'student_status')->textInput() ?>

    <?= $form->field($model, 'student_enrolment_year')->textInput(['maxlength' => 4]) ?>

    <?= $form->field($model, 'student_graduating_year')->textInput(['maxlength' => 4]) ?>

    <?= $form->field($model, 'student_gpa')->textInput(['maxlength' => 10]) ?>

    <?= $form->field($model, 'student_english_level')->textInput() ?>

    <?= $form->field($model, 'student_gender')->textInput() ?>

    <?= $form->field($model, 'student_transportation')->textInput() ?>

    <?= $form->field($model, 'student_contact_number')->textInput(['maxlength' => 64]) ?>

    <?= $form->field($model, 'student_interestingfacts')->textarea(['rows' => 6]) ?>

    <?= $form->field($model, 'student_photo')->textInput(['maxlength' => 255]) ?>

    <?= $form->field($model, 'student_cv')->textInput(['maxlength' => 255]) ?>

    <?= $form->field($model, 'student_skill')->textarea(['rows' => 6]) ?>

    <?= $form->field($model, 'student_hobby')->textarea(['rows' => 6]) ?>

    <?= $form->field($model, 'student_club')->textarea(['rows' => 6]) ?>

    <?= $form->field($model, 'student_sport')->textarea(['rows' => 6]) ?>

    <?= $form->field($model, 'student_experience_company')->textInput(['maxlength' => 255]) ?>

    <?= $form->field($model, 'student_experience_position')->textInput(['maxlength' => 255]) ?>

    <?= $form->field($model, 'student_verification_attachment')->textInput(['maxlength' => 255]) ?>

    <?= $form->field($model, 'student_id_number')->textInput(['maxlength' => 128]) ?>

    <?= $form->field($model, 'student_email_preference')->textInput() ?>

    <?= $form->field($model, 'student_email')->textInput(['maxlength' => 255]) ?>

    <?= $form->field($model, 'student_password_hash')->textInput(['maxlength' => 255]) ?>

    <?= $form->field($model, 'student_language_pref')->textInput(['maxlength' => 64]) ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? Yii::t('app', 'Create') : Yii::t('app', 'Update'), ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
