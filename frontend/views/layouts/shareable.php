<?php

use yii\helpers\Html;
use yii\web\View;
use common\assets\ShareableTemplateAsset;
use yii\helpers\Url;

/* @var $this \yii\web\View */
/* @var $content string */


ShareableTemplateAsset::register($this);

//Include Modernizr in head section
$this->registerJsFile(Url::to('@web/plugins/modernizr/modernizr.min.js'), ['position' => View::POS_HEAD]);
?>
<?php $this->beginPage() ?>
<!DOCTYPE html>
<!--[if lt IE 7]>      <html lang="<?= Yii::$app->language ?>" class="no-js lt-ie9 lt-ie8 lt-ie7" <?= $this->params['isArabic'] ? "dir='rtl'" : "" ?>> <![endif]-->
<!--[if IE 7]>         <html lang="<?= Yii::$app->language ?>" class="no-js lt-ie9 lt-ie8" <?= $this->params['isArabic'] ? "dir='rtl'" : "" ?>> <![endif]-->
<!--[if IE 8]>         <html lang="<?= Yii::$app->language ?>" class="no-js lt-ie9" <?= $this->params['isArabic'] ? "dir='rtl'" : "" ?>> <![endif]-->
<!--[if gt IE 8]><!--> <html lang="<?= Yii::$app->language ?>" class="no-js" <?= $this->params['isArabic'] ? "dir='rtl'" : "" ?>> <!--<![endif]-->
    <head>
        <meta charset="<?= Yii::$app->charset ?>">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">

        <?= Html::csrfMetaTags() ?>
        <title><?= Html::encode($this->title) ?></title>

        <meta name="description" content="StudentHub Recruitment Platform">
        <meta name="author" content="BAWES - Built Awesome">

        <meta name="viewport" content="width=device-width, height=device-height, initial-scale=1">
        <meta name="apple-mobile-web-app-capable" content="yes">
        <meta name="apple-mobile-web-app-status-bar-style" content="black-translucent">
        <meta name="apple-touch-fullscreen" content="yes">

        <!-- BEGIN SHORTCUT AND TOUCH ICONS -->
        <link rel="shortcut icon" href="<?= Url::to('@web/images/icons') ?>/favicon.ico" type="image/x-icon" />
        <link rel="apple-touch-icon" sizes="57x57" href="<?= Url::to('@web/images/icons') ?>/apple-touch-icon-57x57.png">
        <link rel="apple-touch-icon" sizes="60x60" href="<?= Url::to('@web/images/icons') ?>/apple-touch-icon-60x60.png">
        <link rel="apple-touch-icon" sizes="72x72" href="<?= Url::to('@web/images/icons') ?>/apple-touch-icon-72x72.png">
        <link rel="apple-touch-icon" sizes="76x76" href="<?= Url::to('@web/images/icons') ?>/apple-touch-icon-76x76.png">
        <link rel="apple-touch-icon" sizes="114x114" href="<?= Url::to('@web/images/icons') ?>/apple-touch-icon-114x114.png">
        <link rel="apple-touch-icon" sizes="120x120" href="<?= Url::to('@web/images/icons') ?>/apple-touch-icon-120x120.png">
        <link rel="apple-touch-icon" sizes="144x144" href="<?= Url::to('@web/images/icons') ?>/apple-touch-icon-144x144.png">
        <link rel="apple-touch-icon" sizes="152x152" href="<?= Url::to('@web/images/icons') ?>/apple-touch-icon-152x152.png">
        <link rel="apple-touch-icon" sizes="180x180" href="<?= Url::to('@web/images/icons') ?>/apple-touch-icon-180x180.png">
        <link rel="icon" type="image/png" href="<?= Url::to('@web/images/icons') ?>/favicon-16x16.png" sizes="16x16">
        <link rel="icon" type="image/png" href="<?= Url::to('@web/images/icons') ?>/favicon-32x32.png" sizes="32x32">
        <link rel="icon" type="image/png" href="<?= Url::to('@web/images/icons') ?>/favicon-96x96.png" sizes="96x96">
        <link rel="icon" type="image/png" href="<?= Url::to('@web/images/icons') ?>/android-chrome-192x192.png" sizes="192x192">
        <meta name="msapplication-square70x70logo" content="<?= Url::to('@web/images/icons') ?>/smalltile.png" />
        <meta name="msapplication-square150x150logo" content="<?= Url::to('@web/images/icons') ?>/mediumtile.png" />
        <meta name="msapplication-wide310x150logo" content="<?= Url::to('@web/images/icons') ?>/widetile.png" />
        <meta name="msapplication-square310x310logo" content="<?= Url::to('@web/images/icons') ?>/largetile.png" />
        <!-- END SHORTCUT AND TOUCH ICONS -->

        <?php $this->head() ?>
    </head>
    <body class="one-page">
        <?php $this->beginBody() ?>
        <div class="header">
            <div class="container">

                <div class="logo">
                    <img src="img/StudentHub-logo.jpg" alt="Logo">
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

        <div class="slide bg-image-with-shadow" style="background-image: url('img/bg-overview.jpg'); " data-nav="remove">
            <div class="container" style="text-align: center">
                <h3 class="text-white text-center"><?= Html::encode($this->title) ?></h3>
                <p class="caption text-white text-center">Company Name<br><i>Company Industry</i></p>                        

                <button type="button" class="btn btn-success btn-xl btn-ripple">Apply to Jobs Like This</button>

                <a class="btn btn-large btn-floating btn-teal btn-next btn-next-center" data-anchor="slide4" data-nav-link><i class="ion-chevron-down"></i></a>

            </div><!--.container-->
        </div><!--.slide-->



        <!-- content -->
        <?php //$content 
        ?>
        <!-- content -->

        <div class="slide" data-nav="slide1">


            <div class="container">
                <div class="row">

                    <h2 class="text-black text-center">ABOUT THE COMPANY</h2>
                    <p class="caption text-center">Stuff about the company Stuff about the company Stuff about the company Stuff about the company Stuff about the company Stuff about the company Stuff about the company Stuff about the company Stuff about the company Stuff about the company Stuff about the company Stuff about the company Stuff about the company Stuff about the company Stuff about the company Stuff about the company Stuff about the company Stuff about the company Stuff about the company Stuff about the company </p>

                </div><!--.row-->

                <a class="btn btn-large btn-floating btn-pink btn-next btn-next-left" data-anchor="slide2" data-nav-link><i class="ion-chevron-down"></i></a>

            </div><!--.container-->

        </div><!--.slide-->

        <div class="slide bg-light-grey" data-nav="slide2">		

            <div class="container">
                <div class="row">
                    <div class="col-md-6">
                        <h2 class="text-black text-center">JOB RESPONSIBILITIES</h2>
                        <p class="caption text-center">About the job About the job About the job About the job About the job About the job About the job About the job About the job About the job About the job About the job About the job About the job About the job </p>
                    </div><!--.col-->
                    <div class="col-md-6">
                        <h2 class="text-black text-center">COMPENSATION</h2>
                        <p class="caption text-center">About the job About the job About the job About the job About the job About the job About the job About the job About the job About the job About the job About the job About the job About the job About the job </p>                                                                   	
                    </div>
                </div><!--.row-->
                <div class="row">
                    <div class="col-md-4">
                        <h4 class="text-black text-center"><i class="glyphicon glyphicon-education"></i>&nbsp; DESIRED DEGREE</h4>
                        <p class="caption text-center" style="padding-top: 1em">Finance, Accounting, Business Administration</p>
                    </div>
                    <div class="col-md-4">
                        <h4 class="text-black text-center"><i class="glyphicon glyphicon-calendar"></i>&nbsp; START DATE</h4>
                        <p class="caption text-center" style="padding-top: 1em">Flexible</p>
                    </div>
                    <div class="col-md-4">
                        <h4 class="text-black text-center"><i class="glyphicon glyphicon-briefcase"></i>&nbsp; JOB TYPE</h4>
                        <p class="caption text-center" style="padding-top: 1em">Part-Time</p>
                    </div>
                </div>
                <a class="btn btn-large btn-floating btn-amber btn-next btn-next-right" data-anchor="slide3" data-nav-link><i class="ion-chevron-down"></i></a>

            </div><!--.container-->
        </div><!--.slide-->

        <div class="slide bg-image-with-shadow" style="background-image: url('img/bg-overview.jpg'); " data-nav="slide3">
            <div class="container">
                <h3 class="text-white text-center">FOLLOW US ON:</h3>

                <ul class="row list-horizontal white">
                    <li class="col-sm-4" data-bottom-top="top:-50px" data-center="top:0px">
                        <div class="list-icon">
                            <a href="" class="fa fa-instagram" style="color: white; text-decoration: none"></a>
                        </div><!--.list-info-->
                        <div class="list-info">
                            <h4><a href="#" style="color:white; text-decoration:none;">INSTAGRAM</a></h4>					
                        </div><!--.list-icon-->

                    </li>
                    <li class="col-sm-4" data-bottom-top="top:-50px" data-center="top:0px">
                        <div class="list-icon">
                            <a href="" class="fa fa-twitter"style="color: white; text-decoration: none"></a>
                        </div><!--.list-icon-->
                        <div class="list-info">
                            <h4><a href="#" style="color:white; text-decoration:none;">TWITTER</a></h4>
                        </div><!--.list-info-->


                    </li>
                    <li class="col-sm-4" data-bottom-top="top:-50px" data-center="top:0px">
                        <div class="list-icon">
                            <a href="" class="fa fa-facebook" style="color:white; text-decoration:none"></a>
                        </div><!--.list-icon-->
                        <div class="list-info">
                            <h4><a href="#" style="color:white; text-decoration:none;">FACEBOOK</a></h4>						
                        </div><!--.list-info-->


                    </li>
                </ul>                        

                <a class="btn btn-large btn-floating btn-teal btn-next btn-next-center" data-anchor="slide4" data-nav-link><i class="ion-chevron-down"></i></a>

            </div><!--.container-->
        </div><!--.slide-->

        <div class="slide" data-nav="slide4">


            <div class="container">
                <div class="row text-center">
                    <h2 class="text-black text-center">TO APPLY TO JOBS LIKE THIS</h2>
                    <button type="button" class="btn btn-success btn-xl btn-ripple">Click Here</button>
                </div><!--.container-->
            </div><!--.slide-->
        </div>				

        <div class="footer bg-black">
            <div class="container">

                <ul class="social-list">
                    <li><a href="javascript:;" class="facebook"><i class="ion-social-facebook"></i></a></li>
                    <li><a href="javascript:;" class="twitter"><i class="ion-social-twitter"></i></a></li>
                    <li><a href="javascript:;" class="pinterest"><i class="ion-social-github"></i></a></li>
                </ul>

                <div class="copyright v-text">STUDENTHUB &copy; <?= date('Y') ?></div>

            </div><!--.container-->
        </div><!--.footer-->

        <?php $this->endBody() ?>
    </body>
</html>
<?php $this->endPage() ?>
