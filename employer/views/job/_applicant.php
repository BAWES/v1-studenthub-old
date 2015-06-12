<?php

use yii\helpers\Html;
use yii\helpers\Url;
use common\models\Job;

/* @var $model common\models\Student */
?>

<div class="col-md-4 col-sm-6">

    <div class="card card-user card-clickable card-clickable-over-content">

        <div class="card-heading heading-center text-color-white">
            <img src="<?= $model->photo ?>" alt="" class="user-image">
            <h3 class="card-title"><?= $model->student_firstname." ".$model->student_lastname ?></h3>
            <div class="subhead"><?= $this->params['isArabic']?$model->university->university_name_ar:$model->university->university_name_en ?></div>
        </div><!--.card-heading-->

        <div class="card-body">
            <div class="row">
                <div class="col-md-12 col-sm-12">
                    <p>Masters Degree, Year 4<br><br>
                        <i class="fa fa-graduation-cap" data-toggle="tooltip" data-placement="top" data-original-title="Degree"></i> Management Information Systems</p>
                </div>
                <div class="col-xs-6">
                    <p>
                        <i class="fa fa-calculator" data-toggle="tooltip" data-placement="top" data-original-title="GPA"></i> 3.0<br>
                        <i class="glyphicon glyphicon-globe" data-toggle="tooltip" data-placement="top" data-original-title="Nationality"></i> Kuwaiti
                    </p>
                </div>
                <div class="col-xs-6">
                    <p>
                        <i class="fa fa-futbol-o" data-toggle="tooltip" data-placement="top" data-original-title="Sport(s)"></i> Yes<br> 
                        <i class="fa fa-users" data-toggle="tooltip" data-placement="top" data-original-title="Club(s)"></i> Yes
                    </p>
                </div>
                <div class="col-xs-8">
                    <button class="btn btn-teal btn-sm" style="margin-top:1.5em" data-toggle="modal" data-target="#contactDetailsDialog">
                        Show Contact Details
                    </button>   
                </div>
            </div>
            <a class="btn btn-floating moredetails" data-toggle="modal" data-target="#panel-modal2" style="position:absolute; <?= $this->params['isArabic']?"left":"right" ?>:15px; bottom:15px"><i class="fa fa-ellipsis-h"></i></a>
        </div><!--.card-body-->                                            
    </div><!--.card-->
</div><!--.col-md-4-->