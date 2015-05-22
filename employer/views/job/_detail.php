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
                    <?= Yii::t("employer", "Skills") ?>
                </a>
            </div>
            <div id="collapse4" class="panel-collapse collapse">
                <div class="panel-body">
                    <?= Yii::$app->formatter->asNtext($model->job_desired_skill) ?>
                </div>
            </div>
        </div>


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

        <div class="panel">
            <div class="panel-heading active">
                <a class="panel-title" data-parent="#accordion" data-toggle="collapse" href="#collapseQuestions">
                    <?= Yii::t("employer", "Interview Questions") ?>
                </a>
            </div>
            <div id="collapseQuestions" class="panel-collapse collapse">
                <div class="panel-body">
                    <b>Question 1</b>
                    <div class="well">
                        It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. The point of using Lorem Ipsum is that.
                    </div>
                    
                    <b>Question 2</b>
                    <div class="well">
                        It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. The point of using Lorem Ipsum is that.
                    </div>
                </div>
            </div>
        </div>


        <div class="panel">
            <div class="panel-heading active">
                <a class="panel-title" data-parent="#accordion" data-toggle="collapse" href="#collapseFilters">
                    <?= Yii::t("employer", "Applied Filters") ?>
                </a>
            </div>
            <div id="collapseFilters" class="panel-collapse collapse">
                <div class="panel-body">
                    Applied filters listed here
                </div>
            </div>
        </div>


        <div class="panel">
            <div class="panel-heading active">
                <a class="panel-title" data-parent="#accordion" data-toggle="collapse" href="#collapseUniv">
                    <?= Yii::t("employer", "Targetted Universities") ?>
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