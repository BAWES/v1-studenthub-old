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

$css = '
.ms-container{width:100% !important}
.checkbox label{font-size:1.5em; font-weight:bold; padding-top:1em; border-top:2px solid black; margin-top:0.3em; width:100%;}
.control-label{font-size:1em; display:block;}
';

$js = '
//Handle Premium Filter Checkboxes
$(":checkbox").change(function(){
    var nextObject = $(this).parent().parent().parent().next();

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
    $(".universitieZ").multiSelect("select_all");
    return false;
});

//Multiselect initialize
$(".multiselect").multiSelect({
    selectableHeader: "<div style=\'background:black; color:white; text-align:center; font-weight:bold; padding:3px;\'>Available</div>" 
                + "<input type=\'text\' style=\'width:100%\' class=\'search-input\' autocomplete=\'off\' placeholder=\'Search\'>",
    selectionHeader: "<div style=\'background:black; color:white; text-align:center; font-weight:bold; padding:3px;\'>Selected</div>"
                + "<input type=\'text\' style=\'width:100%\' class=\'search-input\' autocomplete=\'off\' placeholder=\'Search\'>",
    afterInit: function(ms){
    var that = this,
        $selectableSearch = that.$selectableUl.prev(),
        $selectionSearch = that.$selectionUl.prev(),
        selectableSearchString = "#"+that.$container.attr("id")+" .ms-elem-selectable:not(.ms-selected)",
        selectionSearchString = "#"+that.$container.attr("id")+" .ms-elem-selection.ms-selected";

    that.qs1 = $selectableSearch.quicksearch(selectableSearchString)
    .on("keydown", function(e){
      if (e.which === 40){
        that.$selectableUl.focus();
        return false;
      }
    });

    that.qs2 = $selectionSearch.quicksearch(selectionSearchString)
    .on("keydown", function(e){
      if (e.which == 40){
        that.$selectionUl.focus();
        return false;
      }
    });
  },
  afterSelect: function(){
    this.qs1.cache();
    this.qs2.cache();
  },
  afterDeselect: function(){
    this.qs1.cache();
    this.qs2.cache();
  }
});
';

$this->registerJs($js);
$this->registerCss($css);
backend\assets\MultiselectAsset::register($this);
?>

<div class="panel">
    <div class="col-md-8 col-md-offset-2">
        
         <?php
        $form = ActiveForm::begin();
        ?>

        <h1 style="margin-bottom:1em; margin-top:0.5em">Audience Targeting</h1>
        <?=
        $form->field($filter, 'universitiesSelected')->listBox(
                ArrayHelper::map(common\models\University::find()->all(), "university_id", "university_name_en"), [
            'class' => 'multiselect universitieZ',
            'multiple' => 'true',
        ])
        ?>

        <a class="btn btn-warning btn-block" style="margin-bottom:20px;" id="selectAllBtn">Select All Universities</a>

        <hr/>

        <!-- Premium Filters Header -->
        <div id="premium">
            <h1 style="margin-bottom:0; margin-top:1.5em;"><?= Yii::t("employer", "Premium Filters") ?></h1>


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
                <?=
                $form->field($filter, 'majorsSelected')->listBox(
                        ArrayHelper::map(common\models\Major::find()->all(), "major_id", "major_name_en"), [
                    'class' => 'multiselect',
                    'multiple' => 'true',
                ])
                ?>
            </div>

            <!-- Filter by Languages Spoken -->
            <?= $form->field($filter, 'languageFilter')->checkbox() ?>
            <div class="question" style="display: <?= $filter->languageFilter?"block":"none" ?>">
                <?=
                $form->field($filter, 'languagesSelected')->listBox(
                        ArrayHelper::map(common\models\Language::find()->all(), "language_id", "language_name_en"), [
                    'class' => 'multiselect',
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
                <?=
                $form->field($filter, 'nationalitiesSelected')->listBox(
                        ArrayHelper::map(common\models\Country::find()->orderBy("country_nationality_name_en")->all(), "country_id", "country_nationality_name_en"), [
                    'class' => 'multiselect',
                    'multiple' => 'true',
                ])
                ?>
            </div>


            <!-- Filter by Transport Availability -->
            <?= $form->field($filter, 'filter_transportation')->checkbox() ?>
        </div>

        <div class="row" style="margin-bottom:10px; margin-top:10px;">
            <?= Html::submitButton(Yii::t('employer', 'Update Filters & Re-broadcast') , ['class' => 'btn btn-danger btn-block btn-ripple'])?>
        </div>
    </div>

    <?php ActiveForm::end(); ?>

</div>