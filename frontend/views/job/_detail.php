<?php

use yii\helpers\Html;
use yii\helpers\Url;

/* @var $model employer\models\Job */
/* @var $jobAlreadyApplied boolean */
?>

<div class="modal-header">
    <h4 class="modal-title" style="text-align: center"><?= $model->employer->employer_company_name ?></h4>
</div>
<div class="modal-body">
    <h3 style="text-align: center; margin-bottom: 1em"><?= $model->job_title ?></h3>
    <div class="panel-group accordion" id="accordion">


        <div class="panel">
            <div class="panel-heading">
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
            <div class="panel-heading">
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
            <div class="panel-heading">
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
            <div class="panel-heading">
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
            <div class="panel-heading">
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

    </div>
    
    <?php if($model->job_pay){ ?>
    <div class="alert alert-danger"><span class="ion-android-favorite"></span> <strong><?= Yii::t('frontend', 'Woohoo!') ?></strong> <?= Yii::t('frontend',"This job pays!") ?></div>
    <?php } ?>
</div>
<div class="modal-footer">
    <?php
        $hasQuestions = $model->hasInterviewQuestions()?true:false;
    ?>
    
    <button type="button" class="btn btn-flat btn-ripple" data-dismiss="modal"><?= Yii::t('app',"Close") ?></button>
    
    <a href="#jobApply" data-job="<?= $model->job_id ?>" <?= $hasQuestions?"data-questions='".Url::to(['job/questions', 'id' => $model->job_id])."'":"" ?>
       class="job-apply btn btn-ripple <?= $jobAlreadyApplied?"disabled btn-success":"btn-cyan" ?> <?= $hasQuestions?"job-hasQuestions":"" ?>" style="font-weight:bold;">
        <?= $jobAlreadyApplied?"<i class='glyphicon glyphicon-ok'></i>":Yii::t("frontend", "Apply") ?>
    </a>
</div>