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
                    <?= $this->params['isArabic']? Yii::$app->user->identity->industry->industry_name_ar : Yii::$app->user->identity->industry->industry_name_en ?> 
                    <br>
                    
                    <b> <?= Yii::t("app", "Type") ?>:</b> 
                    <?= $this->params['isArabic']? $model->jobtype->jobtype_name_ar: $model->jobtype->jobtype_name_en?>
                    <br>
                    
                    <b> <?= Yii::t("app", "Paid") ?>:</b> 
                    <?= $model->job_pay? Yii::t("employer", 'Yes') : Yii::t("employer", 'No') ?>
                    <br><br>
                    
                    
                    Max number of Applicants: <b> 20 </b><br> <br>
                </p>
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
            <a href="<?= Url::to(['job/update', 'id' => $model->job_id]) ?>"
                class="btn btn-floating hover-orange"  style="position:absolute;right:70px; bottom:7px;"><i class="ion-android-create"></i></a>
            <a href="#viewMore"
               data-toggle="modal" data-target="#job-more"
               class="btn btn-floating hover-orange"
               style="position:absolute;right:15px; bottom:7px">
                <i class="fa fa-ellipsis-h"></i>
            </a>
            <ul>
                <li class="pull-left"><a href="#"><?= Yii::$app->formatter->asInteger(100) ?> <?= Yii::t('employer', 'Applied') ?></a></li>
            </ul>
        </div>


    </div><!--.card-->
</div><!--.col-md-4-->