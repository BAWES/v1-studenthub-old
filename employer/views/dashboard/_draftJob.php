<?php

use yii\helpers\Html;
use yii\helpers\Url;

/* @var $model employer\models\Job */
?>

<div class="col-md-4" style="margin-top:10px;">
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
                    <?= $this->params['isArabic']? Yii::$app->user->identity->industry->industry_name_ar : Yii::$app->user->identity->industry->industry_name_en ?> <br>
                    <b> Job Type:</b> Part-Time<br><br>
                    Max number of Applicants: <b> 20 </b>
                </p>
            </div>
            
        </div><!--.card-body-->
        <div class="card-footer applicants">
            <a href="<?= Url::to(['job/update', 'id' => $model->job_id]) ?>"
                class="btn btn-floating"  style="position:absolute;right:70px; bottom:7px"><i class="ion-android-create"></i></a>
            <a href="<?= Url::to(['job/delete', 'id' => $model->job_id]) ?>"
               class="btn btn-floating" 
               data-method="post"
               data-confirm="<?= Yii::t('app', 'Are you sure you want to delete this draft?') ?>"
               style="position:absolute;right:15px; bottom:7px">
                <i class="ion-android-delete"></i>
            </a>
            <ul>
                <li class="pull-left" style="font-weight:bold;"><?= Yii::t("employer", "Draft") ?></li>
            </ul>
        </div>


    </div><!--.card-->
</div><!--.col-md-4-->