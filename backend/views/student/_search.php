<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model common\models\StudentSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="student-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'student_id') ?>

    <?= $form->field($model, 'degree_id') ?>

    <?= $form->field($model, 'country_id') ?>

    <?= $form->field($model, 'university_id') ?>

    <?= $form->field($model, 'student_firstname') ?>

    <?php // echo $form->field($model, 'student_lastname') ?>

    <?php // echo $form->field($model, 'student_dob') ?>

    <?php // echo $form->field($model, 'student_status') ?>

    <?php // echo $form->field($model, 'student_enrolment_year') ?>

    <?php // echo $form->field($model, 'student_graduating_year') ?>

    <?php // echo $form->field($model, 'student_gpa') ?>

    <?php // echo $form->field($model, 'student_english_level') ?>

    <?php // echo $form->field($model, 'student_gender') ?>

    <?php // echo $form->field($model, 'student_transportation') ?>

    <?php // echo $form->field($model, 'student_contact_number') ?>

    <?php // echo $form->field($model, 'student_interestingfacts') ?>

    <?php // echo $form->field($model, 'student_photo') ?>

    <?php // echo $form->field($model, 'student_cv') ?>

    <?php // echo $form->field($model, 'student_skill') ?>

    <?php // echo $form->field($model, 'student_hobby') ?>

    <?php // echo $form->field($model, 'student_club') ?>

    <?php // echo $form->field($model, 'student_sport') ?>

    <?php // echo $form->field($model, 'student_experience_company') ?>

    <?php // echo $form->field($model, 'student_experience_position') ?>

    <?php // echo $form->field($model, 'student_verification_attachment') ?>

    <?php // echo $form->field($model, 'student_email_verification') ?>

    <?php // echo $form->field($model, 'student_id_verification') ?>

    <?php // echo $form->field($model, 'student_id_number') ?>

    <?php // echo $form->field($model, 'student_email_preference') ?>

    <?php // echo $form->field($model, 'student_email') ?>

    <?php // echo $form->field($model, 'student_auth_key') ?>

    <?php // echo $form->field($model, 'student_password_hash') ?>

    <?php // echo $form->field($model, 'student_password_reset_token') ?>

    <?php // echo $form->field($model, 'student_language_pref') ?>

    <?php // echo $form->field($model, 'student_banned') ?>

    <?php // echo $form->field($model, 'student_limit_email') ?>

    <?php // echo $form->field($model, 'student_updated_datetime') ?>

    <?php // echo $form->field($model, 'student_datetime') ?>

    <div class="form-group">
        <?= Html::submitButton(Yii::t('app', 'Search'), ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton(Yii::t('app', 'Reset'), ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
