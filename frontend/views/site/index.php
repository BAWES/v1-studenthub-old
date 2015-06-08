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
$this->registerJsFile("@web/scripts/widget-video.js", ['depends' => 'yii\web\YiiAsset']);
$this->registerJs($js);
$this->registerCss($css);
?>

<!-- main row -->
<div class="row">
    <div class="card spanfix">
        <div class="panel-body" style="text-align:center;">
            <h2>Welcome to StudentHub!</h2>
            <p class="lead">This is where the magic happens!<br> Find 
                <span data-typer-targets="an Internship.,a job to Volunteer.,Part-Time Job.,a One-Time Job.,a Full-Time Job."></span></p>                                                            
            
            
            
            <div class="card card-video card-video-modal card-player-blue" style="background-color:white;box-shadow:none;margin:0;height: 100px;">
                <div class="card-body" style="height:100px">
                    <a href="#" class="play-button-container" data-toggle="modal" data-target="#videojs-modal-1">
                        <div class="play-button"></div>
                    </a>
                </div><!--.card-body-->

                <!-- In order to use different colors, write modal codes in card window -->
                <!-- If you want the video starts automatically after modal window shown, use data-modal-autoplay="true" in video markup -->
                <div class="modal fade video-js-modal" id="videojs-modal-1" tabindex="-1" role="dialog" aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-body">
                                <video id="videojs3" class="video-js video-js-responsive vjs-default-skin vjs-big-play-centered" controls preload="none" poster="<?= Url::to("@web/img/picjumbo/13.jpg") ?>">
                                    <source src="http://video-js.zencoder.com/oceans-clip.mp4" type="video/mp4">
                                    <source src="http://video-js.zencoder.com/oceans-clip.webm" type="video/webm">
                                    <source src="http://video-js.zencoder.com/oceans-clip.ogv" type="video/ogg">
                                    <p class="vjs-no-js">To view this video please enable JavaScript, and consider upgrading to a web browser that <a href="http://videojs.com/html5-video-support/" target="_blank">supports HTML5 video</a></p>
                                </video>
                            </div>
                        </div>
                    </div>
                </div><!--.modal-->
                <!-- End of Modal -->
            </div><!--.card-->
            <p class="lead">Check what is StudentHub</p>
            
            <a class="btn btn-lg btn-success" href="<?= Url::to(['register/index']) ?>">Sign Up Now</a>
            <a class="btn btn-lg btn-success" href="<?= Url::to(['site/login']) ?>">Login</a><br><br>                         
            <a class="btn btn-lg btn-teal" href="<?= Yii::$app->urlManagerEmployer->createUrl("site/index") ?>">Employer? Click here!</a>
        </div>
    </div>
</div>    


<!-- how to start -->
<div class="row" id='cardtutorial'>
    <div class="card">
        <div class="panel-body">
            <h2 style="text-align: center">How to Start</h2>
            <div class="col-md-3 col-sm-6">
                <div class="card card-iconic card-white tut">
                    <div class="card-body" style="color:black">
                        <i class="card-icon fa fa-sign-in"></i>
                        <h4 style="color:black">Sign Up</h4>
                        <p>Create an account and build your CV</p>
                    </div><!--.card-body-->
                </div><!--.card-->
            </div><!--.col-md-3-->

            <div class="col-md-3 col-sm-6">
                <div class="card card-iconic card-white tut">
                    <div class="card-body" style="color:black">
                        <i class="card-icon fa fa-envelope"></i>
                        <h4 style="color:black">Verify</h4>
                        <p>Verify your identity within the university</p>
                    </div><!--.card-body-->

                </div><!--.card-->
            </div><!--.col-md-3-->

            <div class="col-md-3 col-sm-6">
                <div class="card card-iconic card-white tut">
                    <div class="card-body" style="color:black">
                        <i class="card-icon fa fa-building-o"></i>
                        <h4 style="color:black">Find a Job</h4>
                        <p>Browse from available jobs that you qualify for</p>
                    </div><!--.card-body-->

                </div><!--.card-->
            </div><!--.col-md-3-->

            <div class="col-md-3 col-sm-6">
                <div class="card card-iconic card-white tut">
                    <div class="card-body" style="color:black">
                        <i class="card-icon fa fa-check-circle"></i>
                        <h4 style="color:black">Apply</h4>
                        <p>Apply to jobs with a single click</p>
                    </div><!--.card-body-->

                </div><!--.card-->
            </div><!--.col-md-3-->
        </div>
    </div>
</div>


<!-- companies row -->
<div class="row">
    <div class="card">
        <div class="panel-body">
            <h2 style="text-align: center">Employers on StudentHub</h2> 
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
