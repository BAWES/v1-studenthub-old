<?php

use yii\helpers\Url;
use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model common\models\Job */

$this->title = $model->employer->employer_company_name." - ".$model->job_title;
$this->params['breadcrumbs'][] = Yii::t('frontend', 'Browse Jobs');

$css = ".toUpper{text-transform: uppercase;}";
$this->registerCss($css);
?>

<!-- Content Here -->
<div class="header">
    <div class="container">

        <div class="logo">
            <img src="<?= Url::to('@web/img') ?>/StudentHub-logo.jpg" alt="Logo">
        </div><!--.logo-->

        <div class="animated-selector">
            <ul class="navigation">
                <li data-anchor="slide1" data-nav-link>ABOUT THE COMPANY</li>
                <li data-anchor="slide2" data-nav-link>JOB INFORMATION</li>
                <li data-anchor="slide3" data-nav-link>SOCIAL MEDIA</li>
                <li data-anchor="slide4" data-nav-link>APPLY</li>
            </ul>
            <div class="selector"></div>
        </div><!--.animated-selector-->			
        <div class="hamburger-btn"></div><!--.hamburger-btn-->
    </div><!--.container-->
</div><!--.header-->

<div class="slide bg-image-with-shadow" style="background-image: url('<?= Url::to('@web/img') ?>/bg-overview.jpg'); " data-nav="remove">
    <div class="container" style="text-align: center">
        <h3 class="text-white text-center toUpper"><?= $model->job_title ?></h3>
        <p class="caption text-white text-center" style="font-size:1.2em;">
            <?= $model->employer->employer_company_name ?><br>
            <i style='font-size:0.8em'><?= $model->employer->industry->industry_name_en ?></i>
        </p>                        

        <a href="<?=Url::to(['site/index'])?>" class="btn btn-success btn-ripple">Apply to Jobs Like This</a>

        <a class="btn btn-large btn-floating btn-teal btn-next btn-next-center" data-anchor="slide4" data-nav-link><i class="ion-chevron-down"></i></a>

    </div><!--.container-->
</div><!--.slide-->

<div class="slide" data-nav="slide1">


    <div class="container">
        <div class="row">

            <h2 class="text-black text-center">ABOUT THE COMPANY</h2>
            <p class="caption text-center">
                <?= Yii::$app->formatter->asNtext($model->employer->employer_company_desc) ?>
            </p>

        </div><!--.row-->

        <a class="btn btn-large btn-floating btn-pink btn-next btn-next-left" data-anchor="slide2" data-nav-link><i class="ion-chevron-down"></i></a>

    </div><!--.container-->

</div><!--.slide-->

<div class="slide bg-light-grey" data-nav="slide2">		

    <div class="container">
        <div class="row">
            <div class="col-md-6">
                <h2 class="text-black text-center">JOB RESPONSIBILITIES</h2>
                <p class="caption text-center">
                    <?= Yii::$app->formatter->asNtext($model->job_responsibilites) ?>
                </p>
            </div><!--.col-->
            <div class="col-md-6">
                <h2 class="text-black text-center">DESIRED SKILLS</h2>
                <p class="caption text-center">
                    <?= Yii::$app->formatter->asNtext($model->job_desired_skill) ?>
                </p>                                                                   	
            </div>
        </div><!--.row-->
        <div class="row">
            <div class="col-md-4">
                <h4 class="text-black text-center"><i class="glyphicon glyphicon-education"></i>&nbsp; DESIRED MAJORS</h4>
                <p class="caption text-center" style="padding-top: 1em">Finance, Accounting, Business Administration</p>
            </div>
            <div class="col-md-4">
                <h4 class="text-black text-center"><i class="glyphicon glyphicon-calendar"></i>&nbsp; START DATE</h4>
                <p class="caption text-center" style="padding-top: 1em"><?= $model->job_startdate?Yii::$app->formatter->asDate($model->job_startdate):"Flexible"?></p>
            </div>
            <div class="col-md-4">
                <h4 class="text-black text-center"><i class="glyphicon glyphicon-briefcase"></i>&nbsp; JOB TYPE</h4>
                <p class="caption text-center" style="padding-top: 1em"><?= $model->jobtype->jobtype_name_en ?></p>
            </div>
        </div>
        <a class="btn btn-large btn-floating btn-amber btn-next btn-next-right" data-anchor="slide3" data-nav-link><i class="ion-chevron-down"></i></a>

    </div><!--.container-->
</div><!--.slide-->

<div class="slide bg-image-with-shadow" style="background-image: url('<?= Url::to('@web/img') ?>/bg-overview.jpg'); " data-nav="slide3">
    <div class="container">
        <h3 class="text-white text-center toUpper">Follow <?= $model->employer->employer_company_name ?> on</h3>

        <ul class="row list-horizontal white">
            <li class="col-sm-4" data-bottom-top="top:-50px" data-center="top:0px">
                <div class="list-icon">
                    <a href="" class="fa fa-instagram" style="color: white; text-decoration: none"></a>
                </div><!--.list-info-->
                <div class="list-info toUpper">
                    <h4><a href="#" style="color:white; text-decoration:none;">Instagram</a></h4>					
                </div><!--.list-icon-->

            </li>
            <li class="col-sm-4" data-bottom-top="top:-50px" data-center="top:0px">
                <div class="list-icon">
                    <a href="" class="fa fa-twitter"style="color: white; text-decoration: none"></a>
                </div><!--.list-icon-->
                <div class="list-info toUpper">
                    <h4><a href="#" style="color:white; text-decoration:none;">Twitter</a></h4>
                </div><!--.list-info-->


            </li>
            <li class="col-sm-4" data-bottom-top="top:-50px" data-center="top:0px">
                <div class="list-icon">
                    <a href="" class="fa fa-facebook" style="color:white; text-decoration:none"></a>
                </div><!--.list-icon-->
                <div class="list-info toUpper">
                    <h4><a href="#" style="color:white; text-decoration:none;">Facebook</a></h4>						
                </div><!--.list-info-->


            </li>
        </ul>                        

        <a class="btn btn-large btn-floating btn-teal btn-next btn-next-center" data-anchor="slide4" data-nav-link><i class="ion-chevron-down"></i></a>

    </div><!--.container-->
</div><!--.slide-->

<div class="slide" data-nav="slide4">


    <div class="container">
        <div class="row text-center">
            <h2 class="text-black text-center toUpper">Apply to jobs like this</h2>
            <a href="<?=Url::to(['site/index'])?>" class="btn btn-success btn-xl btn-ripple">Go to StudentHub</a>
        </div><!--.container-->
    </div><!--.slide-->
</div>				

<div class="footer bg-black">
    <div class="container">

        <ul class="social-list">
            <li><a href="https://www.facebook.com/studenthub.co" class="facebook"><i class="ion-social-facebook"></i></a></li>
            <li><a href="https://twitter.com/studenthubco" class="twitter"><i class="ion-social-twitter"></i></a></li>
            <li><a href="https://instagram.com/studenthubco/" class="instagram"><i class="ion-social-instagram"></i></a></li>
        </ul>

        <div class="copyright v-text">StudentHub &copy; <?= date('Y') ?></div>

    </div><!--.container-->
</div><!--.footer-->