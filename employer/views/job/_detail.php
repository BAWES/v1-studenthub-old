<?php

use yii\helpers\Html;
use yii\helpers\Url;

/* @var $model employer\models\Job */
?>

<div class="modal-header">
    <h4 class="modal-title" style="text-align: center"><?= $model->employer->employer_company_name ?></h4>
</div>
<div class="modal-body">
    <h3 style="text-align: center; margin-bottom: 1em"><?= $model->job_title ?></h3>
    <div class="panel-group accordion" id="accordion">


        <div class="panel">
            <div class="panel-heading active">
                <a class="panel-title" data-parent="#accordion" data-toggle="collapse" href="#collapseAbout">
                    <?= Yii::t("employer", "About the Company") ?>
                </a>
            </div>
            <div id="collapseAbout" class="panel-collapse collapse">
                <div class="panel-body">
                    <?= Yii::$app->formatter->asNtext($model->employer->employer_company_desc) ?>
                </div>
            </div>
        </div>


        <div class="panel">
            <div class="panel-heading active">
                <a class="panel-title" data-parent="#accordion" data-toggle="collapse" href="#collapseResponsibility">
                    <?= Yii::t("employer", "Responsibilities") ?>
                </a>
            </div>
            <div id="collapseResponsibility" class="panel-collapse collapse">
                <div class="panel-body">
                    <?= Yii::$app->formatter->asNtext($model->job_responsibilites) ?>
                </div>
            </div>
        </div>


        <div class="panel">
            <div class="panel-heading active">
                <a class="panel-title" data-parent="#accordion" data-toggle="collapse" href="#collapse4">
                    <?= Yii::t("employer", "Desired Skills") ?>
                </a>
            </div>
            <div id="collapse4" class="panel-collapse collapse">
                <div class="panel-body">
                    <?= Yii::$app->formatter->asNtext($model->job_desired_skill) ?>
                </div>
            </div>
        </div>


        <?php if($model->job_other_qualifications){ ?>
        <div class="panel">
            <div class="panel-heading active">
                <a class="panel-title" data-parent="#accordion" data-toggle="collapse" href="#collapseQualif">
                    <?= Yii::t("employer", "Other Qualifications") ?>
                </a>
            </div>
            <div id="collapseQualif" class="panel-collapse collapse">
                <div class="panel-body">
                    <?= Yii::$app->formatter->asNtext($model->job_other_qualifications) ?>
                </div>
            </div>
        </div>
        <?php } ?>


        <?php if($model->job_compensation){ ?>
        <div class="panel">
            <div class="panel-heading active">
                <a class="panel-title" data-parent="#accordion" data-toggle="collapse" href="#collapseCompensation">
                    <?= Yii::t("employer", "Compensation") ?>
                </a>
            </div>
            <div id="collapseCompensation" class="panel-collapse collapse">
                <div class="panel-body">
                    <?= Yii::$app->formatter->asNtext($model->job_compensation) ?>
                </div>
            </div>
        </div>
        <?php } ?>

        <?php if($model->job_question_1 || $model->job_question_2){ ?>
        <div class="panel">
            <div class="panel-heading active">
                <a class="panel-title" data-parent="#accordion" data-toggle="collapse" href="#collapseQuestions">
                    <?= Yii::t("employer", "Interview Questions") ?>
                </a>
            </div>
            <div id="collapseQuestions" class="panel-collapse collapse">
                <div class="panel-body">
                    
                    <?php if($model->job_question_1){ ?>
                    <b><?= Yii::t("employer", "Question") ?></b>
                    <div class="well">
                        <?= Yii::$app->formatter->asNtext($model->job_question_1) ?>
                    </div>
                    <?php } ?>
                    
                    <?php if($model->job_question_2){ ?>
                    <b><?= Yii::t("employer", "Question") ?></b>
                    <div class="well">
                        <?= Yii::$app->formatter->asNtext($model->job_question_2) ?>
                    </div>
                    <?php } ?>
                </div>
            </div>
        </div>
        <?php } ?>


        <div class="panel">
            <div class="panel-heading active">
                <a class="panel-title" data-parent="#accordion" data-toggle="collapse" href="#collapseFilters">
                    <?= Yii::t("employer", "Applied Filters") ?>
                </a>
            </div>
            <div id="collapseFilters" class="panel-collapse collapse">
                <div class="panel-body">
                    <?php
                    $filter = $model->filter;
                    if(!$filter->premiumFilterCount){
                        echo Yii::t("employer", "No filters selected");
                    }else{ 
                        //Degree Filter
                        if($filter->degree){
                            echo "<p>";
                            echo "<b>".Yii::t("employer", "Degree")."</b><br/>";
                            echo $this->params['isArabic']?$filter->degree->degree_name_ar:$filter->degree->degree_name_en;
                            echo "</p>";
                        }
                        
                        //GPA Filter
                        if($filter->filter_gpa){
                            echo "<p>";
                            echo "<b>".Yii::t("employer", "Minimum GPA")."</b><br/>";
                            echo Yii::$app->formatter->asDecimal($filter->filter_gpa, 2);
                            echo "</p>";
                        }
                        
                        //Graduation Year Filter
                        if($filter->filter_graduation_year_start){
                            Yii::$app->formatter->thousandSeparator = "";
                            echo "<p>";
                            echo "<b>".Yii::t("employer", "Graduation Year")."</b><br/>";
                            echo Yii::$app->formatter->asInteger($filter->filter_graduation_year_start)
                                    ." - "
                                    .Yii::$app->formatter->asInteger($filter->filter_graduation_year_end);
                            echo "</p>";
                        }
                        
                        //English Level Filter
                        if($filter->filter_english_level){
                            $levelOutput = "";
                            switch($filter->filter_english_level){
                                case \common\models\Student::ENGLISH_WEAK:
                                    $levelOutput = Yii::t('register', 'Weak');
                                    break;
                                case \common\models\Student::ENGLISH_FAIR:
                                    $levelOutput = Yii::t('register', 'Fair');
                                    break;
                                case \common\models\Student::ENGLISH_GOOD:
                                    $levelOutput = Yii::t('register', 'Good');
                                    break;
                            }
                            
                            echo "<p>";
                            echo "<b>".Yii::t("employer", "English Level")."</b><br/>";
                            echo $levelOutput;
                            echo "</p>";
                        }
                        
                        //Transportation Filter
                        if($filter->filter_transportation){
                            echo "<p>";
                            echo "<b>".Yii::t("employer", "Transportation")."</b><br/>";
                            echo Yii::t("employer", "Student must have a method of transportation");
                            echo "</p>";
                        }
                        
                        //Nationality Filter
                        if($filter->countries){
                            echo "<p>";
                            echo "<b>".Yii::t("employer", "Nationalities")."</b><br/>";
                            foreach($filter->countries as $nationality){
                                echo "- ";
                                echo $this->params['isArabic']?$nationality->country_nationality_name_ar:$nationality->country_nationality_name_en."<br/>";
                            }
                            echo "</p>";             
                        }
                        
                        //Major Filter
                        if($filter->majors){
                            echo "<p>";
                            echo "<b>".Yii::t("employer", "Majors")."</b><br/>";
                            foreach($filter->majors as $major){
                                echo "- ";
                                echo $this->params['isArabic']?$major->major_name_ar:$major->major_name_en."<br/>";
                            }
                            echo "</p>";             
                        }
                        
                        //Language Filter
                        if($filter->languages){
                            echo "<p>";
                            echo "<b>".Yii::t("employer", "Languages")."</b><br/>";
                            foreach($filter->languages as $language){
                                echo "- ";
                                echo $this->params['isArabic']?$language->language_name_ar:$language->language_name_en."<br/>";
                            }
                            echo "</p>";             
                        }
                        
                    } 
                    ?>
                </div>
            </div>
        </div>


        <div class="panel">
            <div class="panel-heading active">
                <a class="panel-title" data-parent="#accordion" data-toggle="collapse" href="#collapseUniv">
                    <?= Yii::t("employer", "Targeted Universities") ?>
                </a>
            </div>
            <div id="collapseUniv" class="panel-collapse collapse">
                <div class="panel-body">
                    <ul class="list-material">
                        <?php foreach ($model->filter->universities as $university) { ?>
                            <li class="has-action-left">
                                <div class="list-action-left">
                                    <?php if ($university->university_logo) { ?>
                                        <img src="<?= Url::to('@web/images/universities/' . $university->university_logo) ?>" class="face-radius" alt="">
                                    <?php } ?>
                                </div>
                                <div class="list-content">
                                    <span class="title">&nbsp;<?= $this->params['isArabic'] ? $university->university_name_ar : $university->university_name_en ?></span>
                                </div>
                            </li>
                        <?php } ?>
                    </ul>
                </div>
            </div>
        </div>        

    </div>
</div>
<div class="modal-footer">
    <button type="button" class="btn btn-teal" data-dismiss="modal">Edit</button>
    <button type="button" class="btn btn-teal" data-dismiss="modal">Close</button>
</div>