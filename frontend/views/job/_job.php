<?php

use yii\helpers\Html;
use yii\helpers\Url;

/* @var $model common\models\Job */
?>


<div class="card card-user card-user-white" style="border-top: 5px solid #337ab7">

    <div class="card-heading heading-left" style="background:white; height:120px; margin-bottom: 0">
        <div class="logo" style="width:80px;height:80px;border:5px solid white ; position: absolute; top:20px; <?= $this->params['isArabic']?'right':'left'?>:25px;
             background-color: white;
             background-position: 50% 50%;
             background-size: contain;
             background-repeat: no-repeat;
             background-image: url(<?= $model->employer->logo ?>);">	
        </div>
        <h2 class="card-title text-color-black" <?= $this->params['isArabic']?"style='right:125px; left:auto;'":''?>><?= $model->employer->employer_company_name ?></h2>						
    </div><!--.card-heading-->

    <div class="card-body">
        <div class="progress-bar" role="progressbar" aria-valuenow="100" aria-valuemin="0" aria-valuemax="100" 
             style=" top:0; left:0;
             height:30px; position:absolute;width: 100%; background-color: #337ab7; margin-bottom:10px">
            <?= $this->params['isArabic']? $model->employer->industry->industry_name_ar : $model->employer->industry->industry_name_en ?>
        </div>
        
        <h4 style='margin-top:30px; margin-bottom:0;'><?= $model->job_title ?></h4>
        <h5 style='margin-top:0;'><?= $this->params['isArabic']? $model->jobtype->jobtype_name_ar:$model->jobtype->jobtype_name_en ?></h5>
        
        <p style='margin-bottom:0; font-size:0.9em'><?= Yii::t("frontend", 'Work start date is') ?> <?= $model->job_startdate? Yii::$app->formatter->asDate($model->job_startdate, 'long') : Yii::t("frontend", 'flexible') ?></p>					
    </div><!--.card-body-->

    <div class="card-footer">                                                                                                                                                
        <div class="btn-group btn-group-justified">
            <div class="btn-group">
                <a href="#loadDetail" data-job="<?= Url::to(['job/detail', 'id' => $model->job_id]) ?>" 
                   class="btn btn-indigo btn-ripple jobDetail" data-toggle="modal" data-target="#about-job"><i class="fa fa-info"></i></a>
            </div>
            <div class="btn-group">
                <a href="#sharablePage" class="btn btn-blue btn-ripple" data-toggle="modal" data-target="#share"><i class="fa fa-share-alt"></i></a>
            </div>
            <div class="btn-group">
                <a href="#jobApply" data-job="<?= Url::to(['job/apply', 'id' => $model->job_id]) ?>" 
                   class="btn btn-cyan btn-ripple" data-toggle="modal" data-target="#interviewQuestions"><?= Yii::t("frontend", "Apply") ?></a>
            </div>
        </div>
    </div><!--.card-footer-->

</div>
