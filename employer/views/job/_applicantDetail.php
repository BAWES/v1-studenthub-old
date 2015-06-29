<?php

use yii\helpers\Html;
use yii\helpers\Url;
use common\models\Student;

/* @var $model common\models\StudentJobApplication */

$student = $model->student;
$job = $model->job;
?>

<div class="modal-header">
    <h4 class="modal-title" style="font-weight:bold;"><?= $student->student_firstname." ".$student->student_lastname ?></h4>
    <img src="<?= $student->photo ?>" alt="" style="max-width:80px"
         class="img-circle pull-<?= $this->params['isArabic'] ? "left" : "right" ?>">
</div>
<div class="modal-body">                                                
    <h4>
        <?= $this->params['isArabic']?$student->degree->degree_name_ar:$student->degree->degree_name_en ?>,
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
            echo "Graduate Class of $yearGraduating";
            echo Yii::t("employer", "Graduate Class of {yearGraduating}", ['yearGraduating' => $yearGraduating]);
        }else{
            //output how many years hes been studying
            echo Yii::t("employer", "{0, ordinal} Year", $yearsStudied);
        }
        ?>
    </h4>
    <p>
        <?= $this->params['isArabic']?$student->university->university_name_ar:$student->university->university_name_en ?>
    </p>
    
    <!-- Interview Question #1 -->
    <?php if($job->job_question_1){ ?>
        <h4><?= $job->job_question_1 ?></h4>
        <p>
            <?= $model->application_answer_1 ?>
        </p>
    <?php } ?>
        
    <!-- Interview Question #2 -->
    <?php if($job->job_question_2){ ?>
        <h4><?= $job->job_question_2 ?></h4>
        <p>
            <?= $model->application_answer_2 ?>
        </p>
    <?php } ?>
    
    <!-- Majors -->
    <h4><?= Yii::t('frontend', 'Major') ?></h4>
    <ul>
        <?php foreach($student->majors as $major){ ?>
            <li><?= $this->params['isArabic']?$major->major_name_ar:$major->major_name_en ?></li>
        <?php } ?>
    </ul>
    
    <!-- GPA -->
    <h4><?= Yii::t('frontend', 'Current GPA') ?></h4>
    <p>
        <?= Yii::$app->formatter->asDecimal($student->student_gpa,2) ?>
    </p>
    
    <!-- English Language Level -->
    <h4><?= Yii::t('frontend', 'English Language Level') ?></h4>
    <p>
        <?= $student->englishLanguageLevel ?>
    </p>
    
    <!-- Gender -->
    <h4><?= Yii::t('frontend', 'Gender') ?></h4>
    <p>
        <?= $student->gender ?>
    </p>
    
    <!-- Nationality -->
    <h4><?= Yii::t('frontend', 'Nationality') ?></h4>
    <p>
        <?= $this->params['isArabic']?$student->country->country_nationality_name_ar:$student->country->country_nationality_name_en ?>
    </p>
    
    <!-- Languages Spoken -->
    <h4><?= Yii::t('frontend', 'Languages Spoken') ?></h4>
    <ul>
        <?php foreach($student->languages as $language){ ?>
            <li><?= $this->params['isArabic']?$language->language_name_ar:$language->language_name_en ?></li>
        <?php } ?>
    </ul>
    
    <!-- Transportation -->
    <h4><?= Yii::t('frontend', 'Transportation') ?></h4>
    <p>
        <?= $student->transportation ?>
    </p>
    
    <!-- Skills -->
    <?php if($student->student_skill){ ?>
    <h4><?= Yii::t('frontend', 'Skills') ?></h4>
    <p>
        <?= Yii::$app->formatter->asNtext($student->student_skill) ?>
    </p>
    <?php } ?>
    
    <!-- Hobbies -->
    <?php if($student->student_hobby){ ?>
    <h4><?= Yii::t('frontend', 'Hobbies') ?></h4>
    <p>
        <?= Yii::$app->formatter->asNtext($student->student_hobby) ?>
    </p>
    <?php } ?>
    
    <!-- Hobbies -->
    <?php if($student->student_sport){ ?>
    <h4><?= Yii::t('frontend', 'Sports') ?></h4>
    <p>
        <?= Yii::$app->formatter->asNtext($student->student_sport) ?>
    </p>
    <?php } ?>
    
    <!-- Clubs -->
    <?php if($student->student_club){ ?>
    <h4><?= Yii::t('frontend', 'Sports') ?></h4>
    <p>
        <?= Yii::$app->formatter->asNtext($student->student_club) ?>
    </p>
    <?php } ?>
    
    <!-- Fun Fact -->
    <?php if($student->student_interestingfacts){ ?>
    <h4><?= Yii::t('frontend', 'Fun Fact') ?></h4>
    <p>
        <?= Yii::$app->formatter->asNtext($student->student_interestingfacts) ?>
    </p>
    <?php } ?>
    
    <pre> <?= Yii::t("employer", "Applied on {dateApplied}", ['dateApplied' => Yii::$app->formatter->asDatetime($model->application_date_apply, 'short')]) ?></pre>                                                                                                                                                                                                               
</div>
<div class="modal-footer">
    <?php if($student->student_cv){ ?>
        <a href="<?= $student->cv ?>" target="_blank" class="btn btn-success btn-ripple">
            <?= Yii::t('app', "View CV") ?>
        </a>
    <?php } ?>
    <button type="button" class="btn btn-flat btn-ripple" data-dismiss="modal"><?= Yii::t('app', "Close") ?></button>
</div>