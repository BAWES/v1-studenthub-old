<?php

use yii\helpers\Html;
use yii\helpers\Url;
use yii\bootstrap\ActiveForm;

/* @var $this yii\web\View */
/* @var $form yii\bootstrap\ActiveForm */
/* @var $model \common\models\LoginForm */

$this->title = Yii::t("employer", 'Login');
$this->params['breadcrumbs'][] = $this->title;

$fieldTemplate = "{label}\n{beginWrapper}\n"
                        . "<div class='inputer'>\n<div class='input-wrapper'>\n"
                        . "{input}\n"
                        . "</div>\n</div>\n{hint}\n{error}\n"
                        . "{endWrapper}";
$checkboxTemplate = "<div class=\"checkboxer\">\n"
                        . "{input}\n"
                        . "{label}\n"
                        . "</div>\n{error}\n{hint}";

?>
<div class="panel">
    <div class="panel-heading">
        <div class="panel-title">
            <h4><?= Yii::t("employer", "Please fill out the following fields to login") ?></h4>
        </div>
    </div>

    <div class="panel-body">

        <div class="row">
            <div class="col-lg-5">
                <?php $form = ActiveForm::begin([
                    'id' => 'login-form',
                    'fieldConfig' => [
                        'template' => $fieldTemplate,
                        'checkboxTemplate' => $checkboxTemplate,
                    ],
                ]); ?>


                <?= $form->field($model, 'email')->input("email", ['placeholder' => "email@company.com"]) ?>
                <?= $form->field($model, 'password')->passwordInput(['placeholder' => "***"]) ?>
                <?= $form->field($model, 'rememberMe')->checkbox() ?>


                <div class="form-group">
                    <?= Html::submitButton(Yii::t("employer",'Login'), ['class' => 'btn btn-teal', 'name' => 'login-button']) ?>
                </div>


                <div style="color:#999;margin:1.5em 0">
                    <?= Yii::t("employer", "If you forgot your password you can") ?>
                    <?= Html::a(Yii::t("employer",'reset it'), ['site/request-password-reset']) ?>
                    <br/>
                    <?= Yii::t("employer", "Don't have an account? <a href='{url}'>Register</a>", [
                        'url' => Url::to(['site/registration']),
                    ]) ?>
                </div>



                <?php ActiveForm::end(); ?>
            </div>
        </div>
    </div>
</div>
