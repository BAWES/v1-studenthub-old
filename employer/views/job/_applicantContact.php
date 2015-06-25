<?php

use yii\helpers\Html;
use yii\helpers\Url;
use common\models\Student;

/* @var $model common\models\StudentJobApplication */

Yii::$app->formatter->thousandSeparator = "";

$student = $model->student;
?>

<div class="modal-header">
    <h4 class="modal-title" style="font-weight:bold;"><?= $student->student_firstname." ".$student->student_lastname ?></h4>
</div>
<div class="modal-body">                                                
    <h4><?= Yii::t("employer", "Phone") ?></h4>
    <p>
        <a href="tel:<?= $student->student_contact_number ?>">
            <?= Yii::$app->formatter->asInteger($student->student_contact_number) ?>
        </a>
    </p>
    
    <h4><?= Yii::t("employer", "Email") ?></h4>
    <p>
        <a href="mailto:<?= $student->student_email ?>"><?= $student->student_email ?></a>
    </p>
    
</div>