<?php

use yii\helpers\Html;
use yii\bootstrap\ActiveForm;
use yii\helpers\ArrayHelper;
use yii\helpers\Url;

/* @var $this yii\web\View */
/* @var $model common\models\Job */
/* @var $form yii\bootstrap\ActiveForm */

$fieldTemplate = "{label}\n{beginWrapper}\n"
        . "<div class='inputer'>\n<div class='input-wrapper'>\n"
        . "{input}\n"
        . "</div>\n</div>\n{hint}\n{error}\n"
        . "{endWrapper}";
$selectTemplate = "{label}\n{beginWrapper}\n"
        . "<div class=''>\n<div class=''>\n"
        . "{input}"
        . "</div>\n</div>\n{hint}\n{error}\n"
        . "{endWrapper}";
$checkboxTemplate = "<span class='control-label col-md-3 col-xs-4'>{label}</span>\n"
        . "<div class='col-md-5 col-xs-8'>"
        . "{input}\n\n{error}\n{hint}"
        . "</div>";

//Set Datepicker Locale to AR if language selected
$datePickerLocale = "";
if ($this->params['isArabic']) {
    $datePickerLocale = "
   locale: {
            applyLabel: 'Submit',
            cancelLabel: 'Cancel',
            fromLabel: 'From',
            toLabel: 'To',
            customRangeLabel: 'Custom',
            daysOfWeek: ['الأحد', 'الإثنين', 'الثلاثاء', 'الأربعاء', 'الخميس', 'الجمعة','السبت'],
            monthNames: ['يناير', 'فبراير', 'مارس', 'أبريل', 'مايو', 'يونيو', 'يوليو', 'أغسطس', 'سبتمبر', 'أكتوبر', 'نوفمبر', 'ديسمبر'],
            firstDay: 1
        }     
";
}


$css = "
div.required label:after {
    content: ' *';
    color: red;
}";

$js = '
function isMobile(){
    var check = false;
  (function(a){if(/(android|bb\d+|meego).+mobile|avantgo|bada\/|blackberry|blazer|compal|elaine|fennec|hiptop|iemobile|ip(hone|od)|iris|kindle|lge |maemo|midp|mmp|mobile.+firefox|netfront|opera m(ob|in)i|palm( os)?|phone|p(ixi|re)\/|plucker|pocket|psp|series(4|6)0|symbian|treo|up\.(browser|link)|vodafone|wap|windows ce|xda|xiino/i.test(a)||/1207|6310|6590|3gso|4thp|50[1-6]i|770s|802s|a wa|abac|ac(er|oo|s\-)|ai(ko|rn)|al(av|ca|co)|amoi|an(ex|ny|yw)|aptu|ar(ch|go)|as(te|us)|attw|au(di|\-m|r |s )|avan|be(ck|ll|nq)|bi(lb|rd)|bl(ac|az)|br(e|v)w|bumb|bw\-(n|u)|c55\/|capi|ccwa|cdm\-|cell|chtm|cldc|cmd\-|co(mp|nd)|craw|da(it|ll|ng)|dbte|dc\-s|devi|dica|dmob|do(c|p)o|ds(12|\-d)|el(49|ai)|em(l2|ul)|er(ic|k0)|esl8|ez([4-7]0|os|wa|ze)|fetc|fly(\-|_)|g1 u|g560|gene|gf\-5|g\-mo|go(\.w|od)|gr(ad|un)|haie|hcit|hd\-(m|p|t)|hei\-|hi(pt|ta)|hp( i|ip)|hs\-c|ht(c(\-| |_|a|g|p|s|t)|tp)|hu(aw|tc)|i\-(20|go|ma)|i230|iac( |\-|\/)|ibro|idea|ig01|ikom|im1k|inno|ipaq|iris|ja(t|v)a|jbro|jemu|jigs|kddi|keji|kgt( |\/)|klon|kpt |kwc\-|kyo(c|k)|le(no|xi)|lg( g|\/(k|l|u)|50|54|\-[a-w])|libw|lynx|m1\-w|m3ga|m50\/|ma(te|ui|xo)|mc(01|21|ca)|m\-cr|me(rc|ri)|mi(o8|oa|ts)|mmef|mo(01|02|bi|de|do|t(\-| |o|v)|zz)|mt(50|p1|v )|mwbp|mywa|n10[0-2]|n20[2-3]|n30(0|2)|n50(0|2|5)|n7(0(0|1)|10)|ne((c|m)\-|on|tf|wf|wg|wt)|nok(6|i)|nzph|o2im|op(ti|wv)|oran|owg1|p800|pan(a|d|t)|pdxg|pg(13|\-([1-8]|c))|phil|pire|pl(ay|uc)|pn\-2|po(ck|rt|se)|prox|psio|pt\-g|qa\-a|qc(07|12|21|32|60|\-[2-7]|i\-)|qtek|r380|r600|raks|rim9|ro(ve|zo)|s55\/|sa(ge|ma|mm|ms|ny|va)|sc(01|h\-|oo|p\-)|sdk\/|se(c(\-|0|1)|47|mc|nd|ri)|sgh\-|shar|sie(\-|m)|sk\-0|sl(45|id)|sm(al|ar|b3|it|t5)|so(ft|ny)|sp(01|h\-|v\-|v )|sy(01|mb)|t2(18|50)|t6(00|10|18)|ta(gt|lk)|tcl\-|tdg\-|tel(i|m)|tim\-|t\-mo|to(pl|sh)|ts(70|m\-|m3|m5)|tx\-9|up(\.b|g1|si)|utst|v400|v750|veri|vi(rg|te)|vk(40|5[0-3]|\-v)|vm40|voda|vulc|vx(52|53|60|61|70|80|81|83|85|98)|w3c(\-| )|webc|whit|wi(g |nc|nw)|wmlb|wonu|x700|yas\-|your|zeto|zte\-/i.test(a.substr(0,4)))check = true})(navigator.userAgent||navigator.vendor||window.opera);
  return check;
}
if(isMobile()){
    $(".selectpicker").selectpicker("mobile");
}

//Mobile Date selection fix for new form
if (!isMobile()) {
    $("input[type=date]")
        .attr("type", "text")
        .daterangepicker({
            // Consistent format with the HTML5 picker
            showDropdowns: true,
            singleDatePicker: true,
            format: "YYYY/MM/DD",
            ' . $datePickerLocale . '
    });
}

$(".switchSelect").bootstrapSwitch();


var saveAsDraft = false;

$("#saveAsDraft").click(function(){
    saveAsDraft = true;
});

// Disable client-side validation when saving as draft
$("form").on("beforeValidateAttribute", function (event, attribute,messages,deferreds) {
    if (saveAsDraft) { return false;   }
});
';


\employer\assets\SwitchInputAsset::register($this);
\employer\assets\DateRangeInputAsset::register($this);

$this->registerJs($js);
$this->registerCss($css);

$form = ActiveForm::begin([
            'layout' => 'horizontal',
            'fieldConfig' => [
                'template' => $fieldTemplate,
                'horizontalCheckboxTemplate' => $checkboxTemplate,
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

<h3>Job Details</h3>

<?= $form->field($model, 'job_title',[
    'horizontalCssClasses' => [
                    'label' => 'col-md-3 col-xs-4',
                    'wrapper' => "col-md-5 col-xs-8",
                ],
])->textInput(['maxlength' => 255, 'placeholder' => 'Project Manager']) ?>

<?=
$form->field($model, 'jobtype_id', [
    'template' => $selectTemplate,
    'horizontalCssClasses' => [
                    'label' => 'col-md-3 col-xs-4',
                    'wrapper' => "col-md-5 col-xs-8",
                ],
])->dropDownList(
        ArrayHelper::map(common\models\Jobtype::find()->all(), "jobtype_id", $this->params['isArabic'] ? "jobtype_name_ar" : "jobtype_name_en"), [
    'class' => 'selectpicker',
    'data-width' => '100%'
])
?>



<?=
$form->field($model, 'job_pay')->checkbox([
    'class' => 'switchSelect',
    'data-on-text' => 'Yes',
    'data-on-color' => 'success',
    'data-off-text' => 'No',
    'data-off-color' => 'danger',
    'checked',
])
?>

<?=
$form->field($model, 'job_responsibilites')->textArea([
    'rows' => 2,
    'class' => 'form-control js-auto-size',
    'placeholder' => 'A short description about the job',
])
?>

<?=
$form->field($model, 'job_desired_skill')->textArea([
    'rows' => 2,
    'class' => 'form-control js-auto-size',
    'placeholder' => 'Teamwork / time management / photoshop',
])
?>

<?=
$form->field($model, 'job_other_qualifications')->textArea([
    'rows' => 1,
    'class' => 'form-control js-auto-size',
    'placeholder' => 'etc..',
])
?>

<?= $form->field($model, 'job_startdate')->input('date',['placeholder' => Yii::t('employer', 'Leave blank to show "flexible start date"')]) ?>

<?= $form->field($model, 'job_compensation')->textInput(['maxlength' => 255, 'placeholder' => 'Recommendation Letter / $$$ / Free lunch']) ?>


<div class="row">
    <div class="col-md-5 col-md-offset-3">
        <div class="note note-warning note-left-striped">
            <h4>Note</h4>
            <p>
                A listing will not be approved if it has application URLs or an email alias within the description. All students should apply for this job through StudentHub
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