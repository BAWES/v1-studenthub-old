<?php

use yii\helpers\Html;
use yii\helpers\Url;
use yii\bootstrap\ActiveForm;
use yii\helpers\ArrayHelper;

/* @var $this yii\web\View */
/* @var $model common\models\Job */
/* @var $filter employer\models\Filter */
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
$checkboxTemplate = "<div class=\"checkboxer\" style='margin-left:1em;'>\n"
                        . "{input}\n"
                        . "{label}\n"
                        . "</div>\n{error}\n{hint}";


$css = "
div.required label:after {
    content: ' *';
    color: red;
}
.checkboxer input[type='checkbox'] + label{
    margin-bottom:0;
}
";

$js = '
function isMobile(){
    var check = false;
  (function(a){if(/(android|bb\d+|meego).+mobile|avantgo|bada\/|blackberry|blazer|compal|elaine|fennec|hiptop|iemobile|ip(hone|od)|iris|kindle|lge |maemo|midp|mmp|mobile.+firefox|netfront|opera m(ob|in)i|palm( os)?|phone|p(ixi|re)\/|plucker|pocket|psp|series(4|6)0|symbian|treo|up\.(browser|link)|vodafone|wap|windows ce|xda|xiino/i.test(a)||/1207|6310|6590|3gso|4thp|50[1-6]i|770s|802s|a wa|abac|ac(er|oo|s\-)|ai(ko|rn)|al(av|ca|co)|amoi|an(ex|ny|yw)|aptu|ar(ch|go)|as(te|us)|attw|au(di|\-m|r |s )|avan|be(ck|ll|nq)|bi(lb|rd)|bl(ac|az)|br(e|v)w|bumb|bw\-(n|u)|c55\/|capi|ccwa|cdm\-|cell|chtm|cldc|cmd\-|co(mp|nd)|craw|da(it|ll|ng)|dbte|dc\-s|devi|dica|dmob|do(c|p)o|ds(12|\-d)|el(49|ai)|em(l2|ul)|er(ic|k0)|esl8|ez([4-7]0|os|wa|ze)|fetc|fly(\-|_)|g1 u|g560|gene|gf\-5|g\-mo|go(\.w|od)|gr(ad|un)|haie|hcit|hd\-(m|p|t)|hei\-|hi(pt|ta)|hp( i|ip)|hs\-c|ht(c(\-| |_|a|g|p|s|t)|tp)|hu(aw|tc)|i\-(20|go|ma)|i230|iac( |\-|\/)|ibro|idea|ig01|ikom|im1k|inno|ipaq|iris|ja(t|v)a|jbro|jemu|jigs|kddi|keji|kgt( |\/)|klon|kpt |kwc\-|kyo(c|k)|le(no|xi)|lg( g|\/(k|l|u)|50|54|\-[a-w])|libw|lynx|m1\-w|m3ga|m50\/|ma(te|ui|xo)|mc(01|21|ca)|m\-cr|me(rc|ri)|mi(o8|oa|ts)|mmef|mo(01|02|bi|de|do|t(\-| |o|v)|zz)|mt(50|p1|v )|mwbp|mywa|n10[0-2]|n20[2-3]|n30(0|2)|n50(0|2|5)|n7(0(0|1)|10)|ne((c|m)\-|on|tf|wf|wg|wt)|nok(6|i)|nzph|o2im|op(ti|wv)|oran|owg1|p800|pan(a|d|t)|pdxg|pg(13|\-([1-8]|c))|phil|pire|pl(ay|uc)|pn\-2|po(ck|rt|se)|prox|psio|pt\-g|qa\-a|qc(07|12|21|32|60|\-[2-7]|i\-)|qtek|r380|r600|raks|rim9|ro(ve|zo)|s55\/|sa(ge|ma|mm|ms|ny|va)|sc(01|h\-|oo|p\-)|sdk\/|se(c(\-|0|1)|47|mc|nd|ri)|sgh\-|shar|sie(\-|m)|sk\-0|sl(45|id)|sm(al|ar|b3|it|t5)|so(ft|ny)|sp(01|h\-|v\-|v )|sy(01|mb)|t2(18|50)|t6(00|10|18)|ta(gt|lk)|tcl\-|tdg\-|tel(i|m)|tim\-|t\-mo|to(pl|sh)|ts(70|m\-|m3|m5)|tx\-9|up(\.b|g1|si)|utst|v400|v750|veri|vi(rg|te)|vk(40|5[0-3]|\-v)|vm40|voda|vulc|vx(52|53|60|61|70|80|81|83|85|98)|w3c(\-| )|webc|whit|wi(g |nc|nw)|wmlb|wonu|x700|yas\-|your|zeto|zte\-/i.test(a.substr(0,4)))check = true})(navigator.userAgent||navigator.vendor||window.opera);
  return check;
}
if(isMobile()){
    $(".selectpicker").selectpicker("mobile");
}

var form = $("form");
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

//Major type and select
$(".selectize").selectize({
    selectOnTab: true,
});

//Handle Premium Filter Checkboxes
$(":checkbox").change(function(){
    var nextObject = $(this).parent().parent().next();

    if($(this).is(":checked")){
        //Show questions
        if(nextObject.hasClass("question")){
            nextObject.show();
        }
    }else{
        //Hide Questions
        if(nextObject.hasClass("question")){
            nextObject.hide();
        }
    }
});

$("#selectAllBtn").click(function(){
    $(".univSelect").selectpicker("selectAll");
    return false;
});
';


\employer\assets\SelectizeAsset::register($this);

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

<h3><?= Yii::t("employer", "Audience Targetting") ?></h3>

<?=
$form->field($filter, 'universitiesSelected', ['template' => $selectTemplate])->listBox(
        ArrayHelper::map(common\models\University::find()->all(), "university_id", $this->params['isArabic'] ? "university_name_ar" : "university_name_en"), [
    'class' => 'selectpicker univSelect',
    'title' => Yii::t('employer', 'Select Universities'),
    'multiple' => 'true',
    'data-width' => '100%'
])
?>

<div class="row">
    <div class="col-md-5 col-md-offset-3">
        <a class="btn btn-teal btn-sm button-striped button-full-striped btn-ripple" style="margin-bottom:20px;" id="selectAllBtn"><?= Yii::t("employer", "Select All Universities") ?></a>
    </div>
</div>


<?= $form->field($filter, 'numberOfApplicants')->input("number", ['placeholder' => 'Minimum 20']) ?>


<!-- Premium Filters Header -->
<h3 style="margin-bottom:0;"><?= Yii::t("employer", "Premium Filters") ?></h3>
<h5><?= Yii::t("employer", "Each option increases applicant cost by 0.250 fils") ?></h5>


<!-- Filter by Degree -->
<?= $form->field($filter, 'degreeFilter')->checkbox() ?>
<div class="question" style="display: <?= $filter->degreeFilter?"block":"none" ?>">
    <?= $form->field($filter, 'degree_id', ['template' => $selectTemplate])->dropDownList(
            ArrayHelper::map(common\models\Degree::find()->all(), "degree_id", $this->params['isArabic'] ? "degree_name_ar" : "degree_name_en"), [
        'class' => 'selectpicker',
        'prompt' => Yii::t('employer', 'Select a Degree'),
        'data-width' => '100%'
    ])
    ?>
</div>

<!-- Filter by GPA -->
<?= $form->field($filter, 'gpaFilter')->checkbox() ?>
<div class="question" style="display: <?= $filter->gpaFilter?"block":"none" ?>">
    <?= $form->field($filter, 'filter_gpa')->input("number", ['placeholder' => '3.0']) ?>
</div>


<!-- Filter by Graduation Years (range) -->
<?php
//Graduation year options
$graduationYearOptions = [];
$currentYear = date("Y") - 3;
$numberOfYears = 8;
Yii::$app->formatter->thousandSeparator = "";
for ($i = 0; $i < $numberOfYears; $i++) {
    $yearOption = $currentYear + $i;
    $graduationYearOptions[$yearOption] = Yii::$app->formatter->asInteger($yearOption);
} ?>
<?= $form->field($filter, 'graduationFilter')->checkbox() ?>
<div class="question" style="display: <?= $filter->graduationFilter?"block":"none" ?>">
    <?= $form->field($filter, 'filter_graduation_year_start',[
                    'template' => $selectTemplate,
                ])->dropDownList($graduationYearOptions, [
                    'class' => 'selectpicker', 
                    'data-width' => '100%',
                    'prompt' => Yii::t('employer', 'Select Year'),
                    ]) ?>
    <?= $form->field($filter, 'filter_graduation_year_end',[
                    'template' => $selectTemplate,
                ])->dropDownList($graduationYearOptions, [
                    'class' => 'selectpicker', 
                    'data-width' => '100%',
                    'prompt' => Yii::t('employer', 'Select Year'),
                    ]) ?>
</div>


<!-- Filter by Majors -->
<?= $form->field($filter, 'majorFilter')->checkbox() ?>
<div class="question" style="display: <?= $filter->majorFilter?"block":"none" ?>">
    <?= $form->field($filter, 'majorsSelected', ['template' => $selectTemplate])->listBox(
            ArrayHelper::map(common\models\Major::find()->all(), "major_id", $this->params['isArabic'] ? "major_name_ar" : "major_name_en"), [
        'class' => 'selectize',
        'placeholder' => Yii::t("employer", "Select as many as you'd like"),
        'multiple' => 'true',
    ])
    ?>
</div>

<!-- Filter by Languages Spoken -->
<?= $form->field($filter, 'languageFilter')->checkbox() ?>
<div class="question" style="display: <?= $filter->languageFilter?"block":"none" ?>">
    <?= $form->field($filter, 'languagesSelected', ['template' => $selectTemplate])->listBox(
            ArrayHelper::map(common\models\Language::find()->all(), "language_id", $this->params['isArabic'] ? "language_name_ar" : "language_name_en"), [
        'class' => 'selectize',
        'placeholder' => Yii::t("employer", "Select as many as you'd like"),
        'multiple' => 'true',
    ])
    ?>
</div>

<!-- Filter by English Language Level -->
<?php
$englishLevelOptions = [
    \common\models\Student::ENGLISH_WEAK => Yii::t('register', 'Weak'),
    \common\models\Student::ENGLISH_FAIR => Yii::t('register', 'Fair'),
    \common\models\Student::ENGLISH_GOOD => Yii::t('register', 'Good'),
];
?>
<?= $form->field($filter, 'englishFilter')->checkbox() ?>
<div class="question" style="display: <?= $filter->englishFilter?"block":"none" ?>">
    <?= $form->field($filter, 'filter_english_level',[
                    'template' => $selectTemplate,
                ])->dropDownList($englishLevelOptions, [
                    'class' => 'selectpicker', 
                    'data-width' => '100%',
                    'prompt' => Yii::t('employer', 'Select Language Level'),
                    ]) ?>
</div>


<!-- Filter by Nationality -->
<?= $form->field($filter, 'nationalityFilter')->checkbox() ?>
<div class="question" style="display: <?= $filter->nationalityFilter?"block":"none" ?>">
    <?= $form->field($filter, 'nationalitiesSelected', ['template' => $selectTemplate])->listBox(
            ArrayHelper::map(common\models\Country::find()->orderBy("country_nationality_name_en")->all(), "country_id", $this->params['isArabic'] ? "country_nationality_name_ar" : "country_nationality_name_en"), [
        'class' => 'selectize',
        'placeholder' => Yii::t("employer", "Select as many as you'd like"),
        'multiple' => 'true',
    ])
    ?>
</div>


<!-- Filter by Transport Availability -->
<?= $form->field($filter, 'filter_transportation')->checkbox() ?>


<!-- Finalize -->
<div class="row">
    <div class="col-md-5 col-md-offset-3">
        <div class="note note-warning note-left-striped">
            <h4><?= Yii::t("employer", "Note") ?></h4>
            <p>
                <?= Yii::t("employer", "You will not be able to change these filters once you publish your job posting") ?>
            </p>
        </div><!--.note-->
    </div>
</div>

<div class="row" style="margin-bottom:10px; margin-top:10px;">
    <div class="col-md-5 col-md-offset-3">
        <?= Html::submitButton(Yii::t('employer', 'Preview & Post Job') , ['class' => 'btn btn-success btn-block btn-ripple'])
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