<?php

use yii\helpers\Url;
use yii\helpers\Html;
use yii\bootstrap\ActiveForm;
use yii\helpers\ArrayHelper;

/* @var $this yii\web\View */
/* @var $model employer\models\Job */
/* @var $filter employer\models\Filter */
/* @var $form yii\bootstrap\ActiveForm */

$this->title = "Update Job Filter";

$this->params['breadcrumbs'][] = ['label' => Yii::t('employer', 'Dashboard'), 'url' => ['dashboard/index']];
$this->params['breadcrumbs'][] = $this->title;

$js = '
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


//Select all universities from dropdown
$("#selectAllBtn").click(function(){
    $(".univSelect").selectpicker("selectAll");
    return false;
});
';

$this->registerJs($js);
?>

<div class="panel">
    <h1>Update Job Filter</h1>

    <?php
    $form = ActiveForm::begin();
    ?>

    <h3 style="margin-bottom:0; margin-top:0">Audience Targetting</h3>

    <?=
    $form->field($filter, 'universitiesSelected')->listBox(
            ArrayHelper::map(common\models\University::find()->all(), "university_id", "university_name_en"), [
        'class' => 'selectpicker univSelect',
        'title' => Yii::t('employer', 'Select Universities'),
        'multiple' => 'true',
        'data-width' => '100%'
    ])
    ?>

    <div class="row">
        <div class="col-md-5 col-md-offset-3">
            <a class="btn btn-teal btn-xs btn-ripple" style="margin-bottom:20px;" id="selectAllBtn"><?= Yii::t("employer", "Select All Universities") ?></a>
        </div>
    </div>


    <!-- Premium Filters Header -->
    <div id="premium">
        <h3 style="margin-bottom:0; margin-top:1.5em;"><?= Yii::t("employer", "Premium Filters") ?></h3>


        <!-- Filter by Degree -->
        <?= $form->field($filter, 'degreeFilter')->checkbox() ?>
        <div class="question" style="display: <?= $filter->degreeFilter?"block":"none" ?>">
            <?= $form->field($filter, 'degree_id')->dropDownList(
                    ArrayHelper::map(common\models\Degree::find()->all(), "degree_id", "degree_name_en"), [
                'class' => 'selectpicker',
                'prompt' => Yii::t('employer', 'Select a Degree'),
                'data-width' => '100%'
            ])
            ?>
        </div>

        <!-- Filter by GPA -->
        <?= $form->field($filter, 'gpaFilter')->checkbox() ?>
        <div class="question" style="display: <?= $filter->gpaFilter?"block":"none" ?>">
            <?= $form->field($filter, 'filter_gpa')->input("number", ['placeholder' => '3.0', 'step' => 'any']) ?>
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
            <?= $form->field($filter, 'filter_graduation_year_start')->dropDownList($graduationYearOptions, [
                            'class' => 'selectpicker', 
                            'data-width' => '100%',
                            'prompt' => Yii::t('employer', 'Select Year'),
                            ]) ?>
            <?= $form->field($filter, 'filter_graduation_year_end')->dropDownList($graduationYearOptions, [
                            'class' => 'selectpicker', 
                            'data-width' => '100%',
                            'prompt' => Yii::t('employer', 'Select Year'),
                            ]) ?>
        </div>


        <!-- Filter by Majors -->
        <?= $form->field($filter, 'majorFilter')->checkbox() ?>
        <div class="question" style="display: <?= $filter->majorFilter?"block":"none" ?>">
            <?= $form->field($filter, 'majorsSelected')->listBox(
                    ArrayHelper::map(common\models\Major::find()->all(), "major_id", "major_name_en"), [
                'class' => 'selectize-majors',
                'placeholder' => Yii::t("employer", "Select as many as you'd like"),
                'multiple' => 'true',
            ])
            ?>
        </div>

        <!-- Filter by Languages Spoken -->
        <?= $form->field($filter, 'languageFilter')->checkbox() ?>
        <div class="question" style="display: <?= $filter->languageFilter?"block":"none" ?>">
            <?= $form->field($filter, 'languagesSelected')->listBox(
                    ArrayHelper::map(common\models\Language::find()->all(), "language_id", "language_name_en"), [
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
            <?= $form->field($filter, 'filter_english_level')->dropDownList($englishLevelOptions, [
                            'class' => 'selectpicker', 
                            'data-width' => '100%',
                            'prompt' => Yii::t('employer', 'Select Language Level'),
                            ]) ?>
        </div>


        <!-- Filter by Nationality -->
        <?= $form->field($filter, 'nationalityFilter')->checkbox() ?>
        <div class="question" style="display: <?= $filter->nationalityFilter?"block":"none" ?>">
            <?= $form->field($filter, 'nationalitiesSelected')->listBox(
                    ArrayHelper::map(common\models\Country::find()->orderBy("country_nationality_name_en")->all(), "country_id", "country_nationality_name_en"), [
                'class' => 'selectize-countries',
                'placeholder' => Yii::t("employer", "Select as many as you'd like"),
                'multiple' => 'true',
            ])
            ?>
        </div>


        <!-- Filter by Transport Availability -->
        <?= $form->field($filter, 'filter_transportation')->checkbox() ?>
    </div>

    <div class="row" style="margin-bottom:10px; margin-top:10px;">
        <div class="col-md-5 col-md-offset-3">
            <?= Html::submitButton(Yii::t('employer', 'Review & Post Job') , ['class' => 'btn btn-success btn-block btn-ripple'])
            ?>
        </div>
    </div>

    <?php ActiveForm::end(); ?>

</div>