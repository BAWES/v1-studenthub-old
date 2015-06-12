<?php

use yii\helpers\Html;
use yii\helpers\Url;

/* @var $model employer\models\Job */
?>

<div class="col-md-4 col-sm-6" style="margin-top:10px;">
    <div class="card card-user card-clickable card-clickable-over-content card-event">

        <div class="card-heading heading-center text-color-white" style="margin-bottom: 0px; height:132px">
            <h3 class="card-title"><?= $model->job_title? $model->job_title : Yii::t("employer", "No Title Set") ?></h3>

        </div><!--.card-heading-->

        <div class="card-body applicants">
            <div class="calendar" style="width:85px">
                <div class="month"><?= Yii::$app->formatter->asDate($model->job_updated_datetime, 'LLLL') ?></div>
                <div class="date"><?= Yii::$app->formatter->asDate($model->job_updated_datetime, 'd') ?></div>
            </div>
            <div class="row">
                <p>
                    <b><?= Yii::t("employer", "Industry") ?>:</b> 
                    <?= $this->params['isArabic']? Yii::$app->user->identity->industry->industry_name_ar : Yii::$app->user->identity->industry->industry_name_en ?> 
                    <br>
                    
                    <b> <?= Yii::t("app", "Type") ?>:</b> 
                    <?= $this->params['isArabic']? $model->jobtype->jobtype_name_ar: $model->jobtype->jobtype_name_en?>
                    <br>
                    
                    <b> <?= Yii::t("app", "Paid") ?>:</b> 
                    <?= $model->job_pay? Yii::t("employer", 'Yes') : Yii::t("employer", 'No') ?>
                    <br><br>
                </p>
            </div>
            
        </div><!--.card-body-->
        <div class="card-footer applicants">
            <a href="<?= Url::to(['job/update', 'id' => $model->job_id]) ?>"
                class="btn btn-floating hover-orange"  style="position:absolute;<?= $this->params['isArabic']?"left:70px;":"right:70px;"?> bottom:7px;"><i class="ion-android-create"></i></a>
            <a href="<?= Url::to(['job/delete', 'id' => $model->job_id]) ?>"
               class="btn btn-floating hover-red" 
               data-method="post"
               data-confirm="<?= Yii::t('app', 'Are you sure you want to delete this draft?') ?>"
               style="position:absolute; <?= $this->params['isArabic']?"left:15px;":"right:15px;"?> bottom:7px">
                <i class="ion-android-delete"></i>
            </a>
            <ul>
                <li class="<?= $this->params['isArabic']?"pull-right":"pull-left"?>" style="font-weight:bold;"><?= Yii::t("employer", "Draft") ?></li>
            </ul>
        </div>


    </div><!--.card-->
</div><!--.col-md-4-->