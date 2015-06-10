<?php

use yii\helpers\Html;
use yii\helpers\Url;
use common\models\Job;

/* @var $model employer\models\Job */
?>

<div class="col-md-4" style="margin-top:10px;">
    <div class="card card-user card-clickable card-clickable-over-content card-event">

        <div class="card-heading heading-center text-color-white" style="margin-bottom: 0px; height:132px">
            <h3 class="card-title"><?= $model->job_title? $model->job_title : Yii::t("employer", "No Title Set") ?></h3>
            <?php if($model->job_status != Job::STATUS_DRAFT) { ?>
            <a class="btn btn-danger btn-ripple jobShare" data-job="<?= Yii::$app->urlManagerFrontend->createAbsoluteUrl(['job/share-dialog', 'id' => $model->job_id]) ?>"
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
                        'currentApplicants' => 0,
                        'maxApplicants' => 20,
                    ]) ?>
                    <div class="progress progress-xs active" style='margin-bottom:10px;'>
                        <div class="progress-bar progress-bar-warning" role="progressbar" aria-valuenow="80" aria-valuemin="0" aria-valuemax="100" style="width: 80%">
                            <span class="sr-only">80% Complete</span>
                        </div>
                    </div>
                    
                </div>
            </div>
            
            <ul id="users">
                <li><a href="#" data-toggle="tooltip" data-placement="top" data-original-title="Emanuele Costa"><img src="img/faces/1.jpg" alt=""></a></li>
                <li><a href="#" data-toggle="tooltip" data-placement="top" data-original-title="Sjors Huisman"><img src="img/faces/2.jpg" alt=""></a></li>
                <li><a href="#" data-toggle="tooltip" data-placement="top" data-original-title="Isla Olsen"><img src="img/faces/3.jpg" alt=""></a></li>
                <li><a href="#" data-toggle="tooltip" data-placement="top" data-original-title="Lydia Gagné"><img src="img/faces/4.jpg" alt=""></a></li>
                <li><a href="#" data-toggle="tooltip" data-placement="top" data-original-title="Nicoline Thomsen"><img src="img/faces/5.jpg" alt=""></a></li>
                <li><a href="#" data-toggle="tooltip" data-placement="top" data-original-title="Christian Roth"><img src="img/faces/6.jpg" alt=""></a></li>
                <li><a href="#" data-toggle="tooltip" data-placement="top" data-original-title="Jonas Verbeke"><img src="img/faces/7.jpg" alt=""></a></li>
            </ul>
            
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
                <li class="<?= $this->params['isArabic']?"pull-right":"pull-left"?>"><a href="#" class='btn btn-sm btn-teal fixmenow'><span><?= Yii::t('employer', 'View Applicants') ?></span></a></li>
            </ul>
        </div>


    </div><!--.card-->
</div><!--.col-md-4-->