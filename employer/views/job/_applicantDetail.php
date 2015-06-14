<?php

use yii\helpers\Html;
use yii\helpers\Url;
use common\models\Student;

/* @var $model common\models\StudentJobApplication */

$student = $model->student;
?>

<div class="modal-header">
    <h4 class="modal-title" style="font-weight:bold;"><?= $student->student_firstname." ".$student->student_lastname ?></h4>
    <img src="<?= $student->photo ?>" alt="" style="max-width:80px"
         class="img-circle pull-<?= $this->params['isArabic'] ? "left" : "right" ?>">
</div>
<div class="modal-body">                                                
    <h4>
        <?= $this->params['isArabic']?$student->degree->degree_name_ar:$student->degree->degree_name_en ?>,
        Year 4
    </h4>
    <p>
        <?= $this->params['isArabic']?$student->university->university_name_ar:$student->university->university_name_en ?>
    </p>
    
    <!-- Majors -->
    <h4>Major</h4>
    <ul>
        <?php foreach($student->majors as $major){ ?>
            <li><?= $this->params['isArabic']?$major->major_name_ar:$major->major_name_en ?></li>
        <?php } ?>
    </ul>
    
    <!-- GPA -->
    <h4>Current GPA</h4>
    <p>
        <?= Yii::$app->formatter->asDecimal($student->student_gpa,2) ?>
    </p>
    
    <!-- English Language Level -->
    <h4>English Language Level</h4>
    <p>
        <?= $student->englishLanguageLevel ?>
    </p>
    
    <!-- Nationality -->
    <h4>Gender</h4>
    <p>
        <?= $student->gender ?>
    </p>
    
    <!-- Nationality -->
    <h4>Nationality</h4>
    <p>
        <?= $this->params['isArabic']?$student->country->country_nationality_name_ar:$student->country->country_nationality_name_en ?>
    </p>
    
    <!-- Languages Spoken -->
    <h4>Languages Spoken</h4>
    <ul>
        <?php foreach($student->languages as $language){ ?>
            <li><?= $this->params['isArabic']?$language->language_name_ar:$language->language_name_en ?></li>
        <?php } ?>
    </ul>
    
    <!-- Transportation -->
    <h4>Transportation</h4>
    <p>
        <?= $student->transportation ?>
    </p>
    
    <!-- Skills -->
    <?php if($student->student_skill){ ?>
    <h4>Skills</h4>
    <p>
        <?= Yii::$app->formatter->asNtext($student->student_skill) ?>
    </p>
    <?php } ?>
    
    <!-- Hobbies -->
    <?php if($student->student_hobby){ ?>
    <h4>Hobbies</h4>
    <p>
        <?= Yii::$app->formatter->asNtext($student->student_hobby) ?>
    </p>
    <?php } ?>
    
    <!-- Hobbies -->
    <?php if($student->student_sport){ ?>
    <h4>Sports</h4>
    <p>
        <?= Yii::$app->formatter->asNtext($student->student_sport) ?>
    </p>
    <?php } ?>
    
    <!-- Clubs -->
    <?php if($student->student_club){ ?>
    <h4>Sports</h4>
    <p>
        <?= Yii::$app->formatter->asNtext($student->student_club) ?>
    </p>
    <?php } ?>
    
    <!-- Fun Fact -->
    <?php if($student->student_interestingfacts){ ?>
    <h4>Fun Fact</h4>
    <p>
        <?= Yii::$app->formatter->asNtext($student->student_interestingfacts) ?>
    </p>
    <?php } ?>
    
    <pre> <?= Yii::t("employer", "Applied on {dateApplied}", ['dateApplied' => Yii::$app->formatter->asDatetime($model->application_date_apply, 'short')]) ?></pre>                                                                                                                                                                                                               
</div>
<div class="modal-footer">
    <a href="#"
       class="btn btn-success btn-ripple"><?= Yii::t('app', "View CV") ?></a>
    <button type="button" class="btn btn-flat btn-ripple" data-dismiss="modal"><?= Yii::t('app', "Close") ?></button>
</div>