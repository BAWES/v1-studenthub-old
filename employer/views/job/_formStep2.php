<?php

use yii\helpers\Html;
use yii\helpers\Url;
use yii\bootstrap\ActiveForm;

/* @var $this yii\web\View */
/* @var $model common\models\Job */
/* @var $form yii\bootstrap\ActiveForm */

$fieldTemplate = "{label}\n{beginWrapper}\n"
        . "<div class='inputer'>\n<div class='input-wrapper'>\n"
        . "{input}\n"
        . "</div>\n</div>\n{hint}\n{error}\n"
        . "{endWrapper}";


$css = "
div.required label:after {
    content: ' *';
    color: red;
}";


$this->registerCss($css);

$form = ActiveForm::begin([
            'layout' => 'horizontal',
            'fieldConfig' => [
                'template' => $fieldTemplate,
                'horizontalCssClasses' => [
                    'label' => 'col-md-3',
                    'offset' => '',
                    'wrapper' => "col-md-5",
                    'error' => '',
                    'hint' => '',
                ],
            ],
        ]);
?>

<h3><?= Yii::t("employer", "Have a question for the applicants? (optional)") ?></h3>

<?=
$form->field($model, 'job_question_1')->textArea([
    'rows' => 2,
    'class' => 'form-control js-auto-size',
    'placeholder' => 'Which of our products have you used before, and what do you like most about them?',
])
?>

<?=
$form->field($model, 'job_question_2')->textArea([
    'rows' => 2,
    'class' => 'form-control js-auto-size',
    'placeholder' => 'Do you have experience working in social media?',
])
?>

<div class="row">
    <div class="col-md-5 col-md-offset-3">
        <div class="note note-warning note-left-striped">
            <h4><?= Yii::t("employer", "Tip") ?></h4>
            <p>
                <?= Yii::t("employer", "Decide carefully! You may not be able to change these questions without contacting us once you publish your job posting") ?>
            </p>
        </div><!--.note-->
    </div>
</div>

<div class="row" style="margin-bottom:10px; margin-top:10px;">
    <div class="col-md-5 col-md-offset-3">
        <?= Html::submitButton(Yii::t('employer', 'Next Step') , ['class' => 'btn btn-success btn-block btn-ripple'])
        ?>
    </div>
</div>

<div class="row">
    <div class="col-md-5 col-md-offset-3">
        <?= Html::a(Yii::t('employer', 'Save as Draft'), Url::current(), [
                'class' => 'btn btn-warning btn-block btn-ripple',
                'id' => 'saveAsDraft',
                'data' => [
                    'method' => 'post',
                    'params' => [
                        'draft' => 'yes',
                    ]
                ],
            ]) ?>
    </div>
</div>

<?php ActiveForm::end(); ?>