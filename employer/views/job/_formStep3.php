<?php

use yii\helpers\Html;
use yii\helpers\Url;
use yii\bootstrap\ActiveForm;
$employerOffice = \yii\helpers\ArrayHelper::map(\common\models\EmployerOffice::find()->all(),'office_id','office_name_en');
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

$js = '
var form = $("form#job-form");
var saveAsDraft = false;
$("#saveAsDraft").click(function(){
    saveAsDraft = true;
    $("<input>").attr("type", "hidden").attr("name", "draft").attr("value", "yes").appendTo(form);
    form.submit();
    
    return false;
});

// Disable client-side validation when saving as draft
form.on("beforeValidateAttribute", function (event, attribute,messages,deferreds) {
    if (saveAsDraft) { return false;   }
});
';

$this->registerJs($js);
$this->registerCss($css);

$form = ActiveForm::begin([
	'id' => 'job-form',
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
echo $form->errorSummary($officeModel);
?>

    <h3><?= Yii::t("employer", "Job is in which office location?") ?></h3>
<?=
$form->field($officeModel, 'office_id')->dropDownList($employerOffice,[
	'class' => 'form-control',
	'prompt' => Yii::t("employer", 'Select Office address'),
])->label('Office Address')
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
			]) ?>
        </div>
    </div>

<?php ActiveForm::end(); ?>