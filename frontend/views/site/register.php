<?php
use yii\helpers\Html;
use yii\bootstrap\ActiveForm;

/* @var $this yii\web\View */
/* @var $form yii\bootstrap\ActiveForm */
/* @var $model \common\models\Student */

$this->title = 'Register as a Student';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="site-signup">
    <h1><?= Html::encode($this->title) ?></h1>

    <p>Please fill out the following fields to signup:</p>

    <div class="row">
        <div class="col-lg-5">
            <?php $form = ActiveForm::begin(['id' => 'form-signup']); ?>
            
                <?= $form->field($model, 'student_email') ?>
                <?= $form->field($model, 'student_password_hash')->passwordInput() ?>
                <?= $form->field($model, 'student_firstname') ?>
                <?= $form->field($model, 'student_lastname') ?>
                <?= $form->field($model, 'student_dob') ?>
                <?= $form->field($model, 'student_status') ?>
                <?= $form->field($model, 'student_enrolment_year') ?>
                <?= $form->field($model, 'student_graduating_year') ?>
                <?= $form->field($model, 'student_gpa') ?>
                <?= $form->field($model, 'student_gender') ?>
                <?= $form->field($model, 'student_transportation') ?>
                <?= $form->field($model, 'student_contact_number') ?>
                <?= $form->field($model, 'student_interestingfacts') ?>
                <?= $form->field($model, 'student_photo') ?>
                <?= $form->field($model, 'student_cv') ?>
                <?= $form->field($model, 'student_skill') ?>
                <?= $form->field($model, 'student_hobby') ?>
                <?= $form->field($model, 'student_club') ?>
                <?= $form->field($model, 'student_sport') ?>
                <?= $form->field($model, 'student_email_preference') ?>
                
                <div class="form-group">
                    <?= Html::submitButton('Signup', ['class' => 'btn btn-primary', 'name' => 'signup-button']) ?>
                </div>
            <?php ActiveForm::end(); ?>
        </div>
    </div>
</div>
