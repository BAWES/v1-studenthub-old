<?php

use yii\helpers\Html;
use yii\helpers\Url;
use common\models\Job;

/* @var $model common\models\StudentJobApplication */

$student = $model->student;
?>

<div class="col-md-4 col-sm-6">

    <div class="card card-user card-clickable card-clickable-over-content">

        <div class="card-heading heading-center text-color-white">
            <img src="<?= $student->photo ?>" alt="" class="user-image">
            <h3 class="card-title"><?= $student->student_firstname." ".$student->student_lastname ?></h3>
            <div class="subhead"><?= $this->params['isArabic']?$student->university->university_name_ar:$student->university->university_name_en ?></div>
        </div><!--.card-heading-->

        <div class="card-body">
            <div class="row">
                <div class="col-md-12 col-sm-12">
                    <p>
                        <?= $this->params['isArabic']?$student->degree->degree_name_ar."، ":$student->degree->degree_name_en.", " ?>
                         
                        <?php
                        $yearJoined = $student->student_enrolment_year;
                        $yearGraduating = $student->student_graduating_year;
                        $currentYear = date('Y');
                        
                        $yearsStudied = $currentYear - $yearJoined;
                        if($yearsStudied <= 0) $yearsStudied = 1;
                        
                        if($currentYear == $yearGraduating){
                            //output graduating this year
                            echo Yii::t("employer", "Graduating Soon");
                        }else if($yearGraduating < $currentYear){
                            //output that hes a graduate
                            echo Yii::t("employer", "Graduate Class of {yearGraduating}", ['yearGraduating' => $yearGraduating]);
                        }else{
                            //output how many years hes been studying
                            echo Yii::t("employer", "{0, ordinal} Year", $yearsStudied);
                        }
                        ?>
                        <br><br>
                        <i class="fa fa-graduation-cap" data-toggle="tooltip" data-placement="top" data-original-title="<?= Yii::t('frontend', 'Major') ?>"></i>
                        <?= $this->params['isArabic']?$student->majors[0]->major_name_ar:$student->majors[0]->major_name_en ?>
                    </p>
                </div>
                <div class="col-xs-6">
                    <p>
                        <i class="fa fa-calculator" data-toggle="tooltip" data-placement="top" data-original-title="<?= Yii::t('frontend', 'GPA') ?>"></i>
                        <?= Yii::$app->formatter->asDecimal($student->student_gpa, 2) ?>
                        
                        <br>
                        <i class="glyphicon glyphicon-globe" data-toggle="tooltip" data-placement="top" data-original-title="<?= Yii::t('frontend', 'Nationality') ?>"></i> 
                        <?= $this->params['isArabic']?$student->country->country_name_ar:$student->country->country_name_en ?>
                    </p>
                </div>
                <div class="col-xs-6">
                    <p>
                        <i class="fa fa-futbol-o" data-toggle="tooltip" data-placement="top" data-original-title="<?= Yii::t('employer', 'Sports') ?>"></i> 
                         <?= $student->student_sport?Yii::t('employer', 'Yes'):Yii::t('employer', 'No') ?>
                         
                        <br> 
                        <i class="fa fa-users" data-toggle="tooltip" data-placement="top" data-original-title="<?= Yii::t('employer', 'Clubs') ?>"></i> 
                        <?= $student->student_club?Yii::t('employer', 'Yes'):Yii::t('employer', 'No') ?>
                    </p>
                </div>
                <div class="col-xs-8">
                    <button class="btn btn-teal btn-sm contactDetail" 
                            data-student="<?= Url::to(['job/student-contact', 'applicationId' => $model->application_id]) ?>"
                            style="margin-top:1.5em" data-toggle="modal" data-target="#contactDetailsDialog">
                        <?= Yii::t('employer', 'Show Contact Details') ?>
                    </button>   
                </div>
            </div>
            <a class="btn btn-floating studentDetail" 
               data-student="<?= Url::to(['job/student-detail', 'applicationId' => $model->application_id]) ?>"
               data-toggle="modal" data-target="#studentDetail" 
               style="position:absolute; <?= $this->params['isArabic']?"left":"right" ?>:15px; bottom:15px">
                    <i class="fa fa-ellipsis-h"></i>
            </a>
        </div><!--.card-body-->                                            
    </div><!--.card-->
</div><!--.col-md-4-->