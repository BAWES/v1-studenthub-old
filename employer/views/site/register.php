<?php

use yii\helpers\Html;
use yii\bootstrap\ActiveForm;

/* @var $this yii\web\View */
/* @var $form yii\bootstrap\ActiveForm */
/* @var $model \common\models\Employer */

$this->title = 'Register as an Employer';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="panel">
    <div class="panel-heading">
        <div class="panel-title">
            <h4><?= Yii::t('employer', 'Sign up and start recruiting today!') ?></h4>
        </div>
    </div>

    <div class="panel-body">
        <?php
        $form = ActiveForm::begin([
                    'id' => 'form-signup',
                    'layout' => 'horizontal',
                    'fieldConfig' => [
                        'options' => [
                            'class' => 'inputer floating-label',
                        ],
                        'template' => "{beginWrapper}\n{input}\n{label}\n{endWrapper}\n{hint}\n{error}",
                        'horizontalCssClasses' => [
                            'label' => '',
                            'offset' => '',
                            'wrapper' => 'input-wrapper',
                            'error' => '',
                            'hint' => '',
                        ],
                    ],
        ]);
        ?>

        <div class="row">
            <div class="col-lg-6">


                <?= $form->field($model, 'employer_email') ?>
                <?= $form->field($model, 'employer_password_hash')->passwordInput() ?>
                <?= $form->field($model, 'employer_company_name') ?>
                <?= $form->field($model, 'employer_contact_firstname') ?>
                <?= $form->field($model, 'employer_contact_lastname') ?>
                <?= $form->field($model, 'employer_email_preference') ?>

            </div>
        </div>

        <br/>
        <div class="form-group">
            <?= Html::submitButton('Signup', ['class' => 'btn btn-primary', 'name' => 'signup-button']) ?>
        </div>
    </div>
</div>
<?php ActiveForm::end(); ?>