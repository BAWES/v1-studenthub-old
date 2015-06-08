<?php
use yii\helpers\Url;

/* @var $this yii\web\View */
$this->title = 'Welcome to StudentHub';

$css = "
.spanfix span{display: inline !important;}
.card.card-video .play-button-container .play-button{background-color:white}
#owl-demo .item{
    margin: 3px;
}
#owl-demo .item img{
    display: block;
    width: 100%;
    height: auto;
}

#cardtutorial .tut{height:180px;}
";

$js = " 
$('[data-typer-targets]').typer({
    random: false,
    wholeWord: true
});

$('#companyList').owlCarousel({
    autoPlay: 4500, //Set AutoPlay to 3 seconds
});
";

\common\assets\HomePageAsset::register($this);
$this->registerCssFile("@web/plugins/video.js/dist/video-js/video-js.min.css");
$this->registerJsFile("@web/scripts/widget-video.js", ['depends' => 'yii\web\YiiAsset']);
$this->registerJsFile("@web/plugins/video.js/dist/video-js/video.js", ['depends' => 'yii\web\YiiAsset']);
$this->registerJs($js);
$this->registerCss($css);
?>

<!-- main row -->
<div class="row">
    <div class="card spanfix">
        <div class="panel-body" style="text-align:center;">
            <h2><?= Yii::t('frontend', 'Welcome to StudentHub!') ?></h2>
            <p class="lead"><?= Yii::t('frontend', 'Find') ?>
                <span data-typer-targets="<?= Yii::t('frontend', 'an Internship.')?>,
                      <?= Yii::t('frontend', 'a job to Volunteer.')?>,
                      <?= Yii::t('frontend', 'a Part-Time Job.')?>,
                      <?= Yii::t('frontend', 'a One-Time Job.')?>,
                      <?= Yii::t('frontend', 'a Full-Time Job.')?>"></span></p>                                                            
            
            
            
            <div class="card card-video card-video-modal card-player-blue" style="background-color:white;box-shadow:none;margin:0;height: 100px;">
                <div class="card-body" style="height:100px">
                    <a href="#" class="play-button-container" data-toggle="modal" data-target="#videoModal">
                        <div class="play-button"></div>
                    </a>
                </div><!--.card-body-->

                <div class="modal fade video-js-modal" id="videoModal" tabindex="-1" role="dialog" aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-body">
                                <iframe width="100%" height="315" src="https://www.youtube.com/embed/pMo4jYg2Tog" frameborder="0" allowfullscreen></iframe>
                            </div>
                        </div>
                    </div>
                </div><!--.modal-->
                <!-- End of Modal -->
            </div><!--.card-->
            
            <p class="lead"><?= Yii::t('frontend', 'Check out our video!') ?></p>
            
            <a class="btn btn-lg btn-success" href="<?= Url::to(['register/index']) ?>"><?= Yii::t('frontend', 'Sign Up Now') ?></a>
            <a class="btn btn-lg btn-success" href="<?= Url::to(['site/login']) ?>"><?= Yii::t('frontend', 'Login') ?></a><br/><br/>
            <a class="btn btn-lg btn-teal" href="<?= Yii::$app->urlManagerEmployer->createUrl("site/index") ?>"><?= Yii::t('frontend', 'Employer? Click here!') ?></a>
        </div>
    </div>
</div>    


<!-- how to start -->
<div class="row" id='cardtutorial'>
    <div class="card">
        <div class="panel-body">
            <h2 style="text-align: center"><?= Yii::t('frontend', 'How to Start') ?></h2>
            <div class="col-md-3 col-sm-6">
                <div class="card card-iconic card-white tut">
                    <div class="card-body" style="color:black">
                        <i class="card-icon fa fa-sign-in"></i>
                        <h4 style="color:black"><?= Yii::t('frontend', 'Sign Up') ?></h4>
                        <p><?= Yii::t('frontend', 'Create an account and build your CV') ?></p>
                    </div><!--.card-body-->
                </div><!--.card-->
            </div><!--.col-md-3-->

            <div class="col-md-3 col-sm-6">
                <div class="card card-iconic card-white tut">
                    <div class="card-body" style="color:black">
                        <i class="card-icon fa fa-envelope"></i>
                        <h4 style="color:black"><?= Yii::t('frontend', 'Verify') ?></h4>
                        <p><?= Yii::t('frontend', 'Verify your identity within the university') ?></p>
                    </div><!--.card-body-->

                </div><!--.card-->
            </div><!--.col-md-3-->

            <div class="col-md-3 col-sm-6">
                <div class="card card-iconic card-white tut">
                    <div class="card-body" style="color:black">
                        <i class="card-icon fa fa-building-o"></i>
                        <h4 style="color:black"><?= Yii::t('frontend', 'Find a Job') ?></h4>
                        <p><?= Yii::t('frontend', 'Browse from available jobs that you qualify for') ?></p>
                    </div><!--.card-body-->

                </div><!--.card-->
            </div><!--.col-md-3-->

            <div class="col-md-3 col-sm-6">
                <div class="card card-iconic card-white tut">
                    <div class="card-body" style="color:black">
                        <i class="card-icon fa fa-check-circle"></i>
                        <h4 style="color:black"><?= Yii::t('frontend', 'Apply') ?></h4>
                        <p><?= Yii::t('frontend', 'Apply to jobs with a single click') ?></p>
                    </div><!--.card-body-->

                </div><!--.card-->
            </div><!--.col-md-3-->
        </div>
    </div>
</div>


<!-- companies row -->
<div class="row" style='direction:ltr;'>
    <div class="card">
        <div class="panel-body">
            <h2 style="text-align: center"><?= Yii::t('frontend', 'Employers on StudentHub') ?></h2> 
            <div id="companyList" style="text-align:center">
                <div class="item"><img src="<?= Url::to("@web/images/employers/zain.jpg") ?>" alt="Zain"></div>
                <div class="item"><img src="<?= Url::to("@web/images/employers/ooredoo.jpg") ?>" alt="Ooredoo"></div>
                <div class="item"><img src="<?= Url::to("@web/images/employers/circuitplus.jpg") ?>" alt="Circuit Plus"></div>
                <div class="item"><img src="<?= Url::to("@web/images/employers/fashionet.jpg") ?>" alt="Fashionet"></div>
                <div class="item"><img src="<?= Url::to("@web/images/employers/ghaliah.jpg") ?>" alt="Ghaliah"></div>
                <div class="item"><img src="<?= Url::to("@web/images/employers/NBK.jpg") ?>" alt="NBK"></div>
                <div class="item"><img src="<?= Url::to("@web/images/employers/fashionet.jpg") ?>" alt="Fashionet"></div>
                <div class="item"><img src="<?= Url::to("@web/images/employers/ghaliah.jpg") ?>" alt="Ghaliah"></div>
                <div class="item"><img src="<?= Url::to("@web/images/employers/NBK.jpg") ?>" alt="NBK"></div>
            </div>   
        </div>
    </div>
</div> <!--.card-->
