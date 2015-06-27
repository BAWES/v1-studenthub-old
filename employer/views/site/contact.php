<?php
use yii\helpers\Html;
use yii\bootstrap\ActiveForm;
use yii\captcha\Captcha;

/* @var $this yii\web\View */
/* @var $form yii\bootstrap\ActiveForm */
/* @var $model \frontend\models\ContactForm */

$this->title = Yii::t("frontend", "Contact");
$this->params['breadcrumbs'][] = $this->title;

$fieldTemplate = "{label}\n{beginWrapper}\n"
                        . "<div class='inputer'>\n<div class='input-wrapper'>\n"
                        . "{input}\n"
                        . "</div>\n</div>\n{hint}\n{error}\n"
                        . "{endWrapper}";

$this->registerJsFile("https://www.google.com/recaptcha/api.js", ['position' => \yii\web\View::POS_HEAD]);
?>

<div class="panel">
    <div class="panel-heading">
        <div class="panel-title">
            <h4><?= Yii::t('frontend', 'If you have business inquiries or other questions, please fill out the following form to contact us. Thank you.') ?></h4>
        </div>
    </div>

    <div class="panel-body">
        
        <div class="row">
            <div class="col-lg-5 <?= $this->params['isArabic']?"col-lg-offset-7":"" ?>">
                <?php $form = ActiveForm::begin([
                    'id' => 'contact-form',
                    'fieldConfig' => [
                        'template' => $fieldTemplate,
                    ],
                ]); ?>
                
                
                    <?= $form->field($model, 'name') ?>
                    <?= $form->field($model, 'email') ?>
                    <?= $form->field($model, 'subject') ?>
                    <?= $form->field($model, 'body')->textArea(['rows' => 1, 'class' => 'form-control js-auto-size']) ?>
                    <?= $form->field($model, 'verifyCode', [
                        'template'=> "<br/>\n{beginWrapper}\n"
                                    . "<div class=''>\n<div class=''>\n"
                                    . "{input}\n"
                                    . "</div>\n</div>\n{hint}\n{error}\n"
                                    . "{endWrapper}"
                        ])->widget(\himiklab\yii2\recaptcha\ReCaptcha::className()) ?>
                
                    <div class="form-group" style="margin-top:30px;">
                        <?= Html::submitButton(Yii::t('app', 'Submit'), ['class' => 'btn btn-primary', 'name' => 'contact-button']) ?>
                    </div>
                <?php ActiveForm::end(); ?>
            </div>
        </div>
    </div>

</div>
