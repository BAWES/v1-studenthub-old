<?php

use yii\helpers\Html;
use yii\helpers\Url;
use common\models\Student;

/* @var $model common\models\Student */
?>

<div class="modal-header">
    <h4 class="modal-title" style="font-weight:bold;"><?= $model->student_firstname." ".$model->student_lastname ?></h4>
    <img src="<?= $model->photo ?>" alt="" style="max-width:80px"
         class="img-circle pull-<?= $this->params['isArabic'] ? "left" : "right" ?>">
    <i style="font-size:70px; color:<?=$model->student_gender == Student::GENDER_MALE?"#3e50b4":"#e81d62"?>;
       position:absolute; top:180px; <?= $this->params['isArabic'] ? "left" : "right" ?>:50px;"
         class="ion ion-<?=$model->student_gender == Student::GENDER_MALE?"man":"woman"?>"></i>
</div>
<div class="modal-body">                                                
    <h4>
        <?= $this->params['isArabic']?$model->degree->degree_name_ar:$model->degree->degree_name_en ?>,
        Year 4
    </h4>
    <p>
        <?= $this->params['isArabic']?$model->university->university_name_ar:$model->university->university_name_en ?>
    </p>
    
    <!-- Majors -->
    <h4>Major</h4>
    <ul>
        <?php foreach($model->majors as $major){ ?>
            <li><?= $this->params['isArabic']?$major->major_name_ar:$major->major_name_en ?></li>
        <?php } ?>
    </ul>
    
    <!-- GPA -->
    <h4>Current GPA</h4>
    <p>
        <?= Yii::$app->formatter->asDecimal($model->student_gpa,2) ?>
    </p>
    
    
        <b>Nationality:</b> Kuwaiti<br> 
        <b>Languages:</b> English, Arabic, Spanish<br>
        <b>English Language Level:</b> Fair<br><br>                                                    
        <b>Sport(s):</b> Football, Basketball, Volleyball<br>
        <b>Club(s):</b> Anime Club, Film Club<br>
        <b>Have a method of Transportation:</b> Yes<br><br>
        <b>Skill(s):</b> Teamwork, Time Management, Photoshop, Microsoft Office<br>
        <b>Hobbies:</b> Cooking, Playing Guitar, Playing Video Games<br>
        <b>Fun Fact:</b> I like to travel<br><br>
        <b>Applied:</b> 01/01/2001                                                                                                                                                                                                                
    </p>
</div>
<div class="modal-footer">
    <a href="#"
       class="btn btn-success btn-ripple"><?= Yii::t('app', "View CV") ?></a>
    <button type="button" class="btn btn-flat btn-ripple" data-dismiss="modal"><?= Yii::t('app', "Close") ?></button>
</div>