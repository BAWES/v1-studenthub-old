<?php

use yii\helpers\Html;
use yii\helpers\Url;
use common\models\Job;

/* @var $model employer\models\Job */
?>

<div class="col-md-4 col-sm-6" style="margin-top:10px;">
    <div class="card card-user card-clickable card-clickable-over-content card-event">

        <div class="card-heading heading-center text-color-white" style="margin-bottom: 0px; height:132px">
            <h3 class="card-title"><?= $model->job_title? $model->job_title : Yii::t("employer", "No Title Set") ?></h3>
            <?php if($model->job_status != Job::STATUS_DRAFT) { ?>
            <a class="btn btn-danger btn-ripple jobShare" data-job="<?= Yii::$app->urlManagerFrontend->createUrl(['job/share-dialog', 'id' => $model->job_id]) ?>"
               style='position: absolute; bottom:0; left:0;' data-toggle="modal" data-target="#shareDialog"><span class="ion-android-share-alt"></span></a>
            <?php } ?>
        </div><!--.card-heading-->

        <div class="card-body applicants">
            <div class="calendar" style="width:85px">
                <div class="month"><?= Yii::$app->formatter->asDate($model->job_updated_datetime, 'LLLL') ?></div>
                <div class="date"><?= Yii::$app->formatter->asDate($model->job_updated_datetime, 'd') ?></div>
            </div>
            <div class="row">
                <div style='margin-bottom:0; padding-bottom: 0;'>
                    <b><?= Yii::t("employer", "Industry") ?>:</b> 
                    <?= $this->params['isArabic']? Yii::$app->user->identity->industry->industry_name_ar : Yii::$app->user->identity->industry->industry_name_en ?> 
                    <br>
                    
                    <b> <?= Yii::t("app", "Type") ?>:</b> 
                    <?= $this->params['isArabic']? $model->jobtype->jobtype_name_ar: $model->jobtype->jobtype_name_en?>
                    <br>
                    
                    <b> <?= Yii::t("app", "Paid") ?>:</b> 
                    <?= $model->job_pay? Yii::t("employer", 'Yes') : Yii::t("employer", 'No') ?>
                    <br>
                    
                    <b> <?= Yii::t("app", "Work Start Date") ?>:</b> 
                    <?= $model->job_startdate? Yii::$app->formatter->asDate($model->job_startdate) : Yii::t("employer", 'Flexible') ?>
                    <br><br>
                    
                    <?=  Yii::t("employer", "{currentApplicants, number} out of {maxApplicants, number} Applicants",[
                        'currentApplicants' => $model->job_current_num_applicants,
                        'maxApplicants' => $model->job_max_applicants,
                    ]) ?>
                    
                    <?php
                    //Calculate applicant progress percentage
                    $percentage = ($model->job_current_num_applicants / $model->job_max_applicants) * 100;
                    ?>
                    <div class="progress progress-xs active" style='margin-bottom:10px;'>
                        <div class="progress-bar progress-bar-warning" role="progressbar" aria-valuenow="<?= $percentage ?>" aria-valuemin="0" aria-valuemax="100" style="width: <?= $percentage ?>%">
                            <span class="sr-only"><?= $percentage ?>% Complete</span>
                        </div>
                    </div>
                    
                </div>
            </div>
            
            <?php
            $applicants = $model->getApplicants()->limit(8)->all();
            ?>
            <?php if($applicants){ ?>
            <ul id="users">
                <?php foreach($applicants as $student){ ?>
                    <li><a href="#student" style="cursor:default;" data-toggle="tooltip" data-placement="top" data-original-title="<?= $student->student_firstname ?>"><img src="<?= $student->photo ?>" alt=""></a></li>
                <?php } ?>
            </ul>
            <?php } ?>
            
        </div><!--.card-body-->
        
        <div class="card-footer applicants">
            <?php if($model->job_status != common\models\Job::STATUS_CLOSED){ ?>
            <a href="<?= Url::to(['job/update', 'id' => $model->job_id]) ?>"
                class="btn btn-floating hover-orange"  style="position:absolute;<?= $this->params['isArabic']?"left:70px;":"right:70px;"?> bottom:7px;"><i class="ion-android-create"></i></a>
            <?php } ?>
            
            <a href="#viewMore" data-job="<?= Url::to(['job/detail', 'id' => $model->job_id]) ?>"
               data-toggle="modal" data-target="#about-job"
               class="btn btn-floating hover-orange jobDetail"
               style="position:absolute; <?= $this->params['isArabic']?"left:15px;":"right:15px;"?> bottom:7px">
                <i class="fa fa-ellipsis-h"></i>
            </a>
            <ul>
                <li class="<?= $this->params['isArabic']?"pull-right":"pull-left"?>"><a href="<?= Url::to(['job/applicants', 'id' => $model->job_id]) ?>" class='btn btn-sm btn-teal fixmenow'><span><?= Yii::t('employer', 'View Applicants') ?></span></a></li>
            </ul>
        </div>


    </div><!--.card-->
</div><!--.col-md-4-->