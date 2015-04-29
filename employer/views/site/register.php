<?php
use yii\helpers\Html;
use yii\bootstrap\ActiveForm;

/* @var $this yii\web\View */
/* @var $form yii\bootstrap\ActiveForm */
/* @var $model \common\models\Employer */

$this->title = 'Register as an Employer';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="site-signup">
    <h1><?= Html::encode($this->title) ?></h1>

    <p>Please fill out the following fields to signup:</p>

    <div class="row">
        <div class="col-lg-5">
            <?php $form = ActiveForm::begin(['id' => 'form-signup']); ?>
            
                <?= $form->field($model, 'employer_email') ?>
                <?= $form->field($model, 'employer_password_hash')->passwordInput() ?>
                <?= $form->field($model, 'employer_company_name') ?>
                <?= $form->field($model, 'employer_contact_firstname') ?>
                <?= $form->field($model, 'employer_contact_lastname') ?>
                <?= $form->field($model, 'employer_email_preference') ?>
                
                <div class="form-group">
                    <?= Html::submitButton('Signup', ['class' => 'btn btn-primary', 'name' => 'signup-button']) ?>
                </div>
            <?php ActiveForm::end(); ?>
        </div>
    </div>
</div>
