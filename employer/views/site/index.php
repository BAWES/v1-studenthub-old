<?php

use yii\helpers\Url;

/* @var $this yii\web\View */
$this->title = 'StudentHub - Hire Students and Fresh Graduates in Kuwait';
$this->registerMetaTag([
      'name' => 'description',
      'content' => 'Easily hire students and fresh graduates in Kuwait using our online recruitment platform. We manually verify all applicants to make sure you receive accurate data.'
]);


$css = "
.spanfix span{display: inline !important;}
.card.card-video .play-button-container .play-button{background-color:white}
#positionList .item{
    margin: 3px;
}
#positionList .item img{
    display: none;
    width: 100%;
    height: auto;
}

#filterList button{
border-radius: 50%;width: 125px;height: 125px;text-align: center;line-height: 125px;font-size:small;
}

#cardtutorial .tut{height:180px;}
";

$js = " 
$('[data-typer-targets]').typer({
    random: false,
    wholeWord: true
});

$('#positionList').owlCarousel({
    autoPlay: 4000,
});

$('#companyList').owlCarousel({
    autoPlay: 4500,
});

$('#filterList').owlCarousel({
    autoPlay: 3000,
    items: 8,
});

$('#positionList .item img').show();
";

\common\assets\HomePageAsset::register($this);
$this->registerCssFile("@web/plugins/video.js/dist/video-js/video-js.min.css");
$this->registerJs($js);
$this->registerCss($css);
?>

<!-- main row -->
<div class="row">
    <div class="card spanfix"  id="frontendCard" style="background: white url(<?= $this->params['isArabic']?Url::to("@web/images/guybg-ar.png"):Url::to("@web/images/guybg.png") ?>);
    background-size: contain;
    background-repeat: no-repeat;
    background-position: <?= $this->params['isArabic']?"0 0":"100% 0" ?> ;">
        <div class="panel-body" style="text-align:center;">
            <h1 style='font-size:38px;'><?= Yii::t('frontend', 'Hire students today!') ?></h1>
            <p class="lead"><?= Yii::t('frontend', 'Find the perfect candidate!') ?></p>                                                            



            <div class="card card-video card-video-modal card-player-blue" style="background:none;box-shadow:none;margin:0;height: 100px;">
                <div class="card-body" style="height:100px">
                    <a href="#" class="play-button-container" data-toggle="modal" data-target="#videoModal">
                        <div class="play-button"></div>
                    </a>
                </div><!--.card-body-->

                <div class="modal fade video-js-modal" id="videoModal" tabindex="-1" role="dialog" aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-body">
                                <iframe width="100%" height="315" src="<?= $this->params['isArabic']?"https://www.youtube.com/embed/y2bWymwHjeU":"https://www.youtube.com/embed/fOjTsGc9fEc"?>" frameborder="0" allowfullscreen></iframe>
                            </div>
                        </div>
                    </div>
                </div><!--.modal-->
                <!-- End of Modal -->
            </div><!--.card-->

            <p class="lead"><?= Yii::t('frontend', 'Check out our video!') ?></p>

            <a class="btn btn-lg btn-success" href="<?= Url::to(['site/registration']) ?>"><?= Yii::t('frontend', 'Sign Up Now') ?></a>
            <a class="btn btn-lg btn-success" href="<?= Url::to(['site/login']) ?>"><?= Yii::t('frontend', 'Login') ?></a>
        </div>
    </div>
</div>    


<!-- Positions Available -->
<div class="row" style='direction:ltr;'>
    <div class="card">   
        <div class="panel-body">
            <h2 style="text-align: center"><?= Yii::t('frontend', 'Positions Available') ?></h2>
            <div id="positionList" style="text-align:center">
                <?php
                $jobTypeFolder = "jobtypes";
                if($this->params['isArabic']){
                    $jobTypeFolder = "jobtypes-ar";
                }
                ?>
                <div class="item"><img src="<?= Url::to("@web/images/$jobTypeFolder/Full-time.jpg") ?>" alt="Full-Time"></div>
                <div class="item"><img src="<?= Url::to("@web/images/$jobTypeFolder/part-time.jpg") ?>" alt="Part-Time"></div>
                <div class="item"><img src="<?= Url::to("@web/images/$jobTypeFolder/one-time.jpg") ?>" alt="One-Time"></div>
                <div class="item"><img src="<?= Url::to("@web/images/$jobTypeFolder/Internship.jpg") ?>" alt="Internship"></div>
                <div class="item"><img src="<?= Url::to("@web/images/$jobTypeFolder/volunteer.jpg") ?>" alt="Volunteer"></div>
            </div>                    
        </div>
    </div>
</div>


<!-- companies row -->
<div class="row" style='direction:ltr;'>
    <div class="card">
        <div class="panel-body">
            <h2 style="text-align: center"><?= Yii::t('frontend', 'Employers on StudentHub') ?></h2> 
            <div id="companyList" style="text-align:center">
                <div class="item"><img src="<?= Url::to("@web/images/employers/richter.jpg") ?>" alt="Richter"></div>
                <div class="item"><img src="<?= Url::to("@web/images/employers/ghaliah.jpg") ?>" alt="Ghaliah"></div>
                <div class="item"><img src="<?= Url::to("@web/images/employers/agility.jpg") ?>" alt="Agility"></div>
                <div class="item"><img src="<?= Url::to("@web/images/employers/warba.jpg") ?>" alt="Warba Bank"></div>
                <div class="item"><img src="<?= Url::to("@web/images/employers/scientific.jpg") ?>" alt="Scientific Center"></div>
                <div class="item"><img src="<?= Url::to("@web/images/employers/elevation.jpg") ?>" alt="Elevation Burger"></div>
                <div class="item"><img src="<?= Url::to("@web/images/employers/ooredoo.jpg") ?>" alt="Ooredoo"></div>
                <div class="item"><img src="<?= Url::to("@web/images/employers/gulfbank.jpg") ?>" alt="Gulf Bank"></div>
            </div>
            
            <div class="row" style="text-align:center">
                <a class="btn btn-teal" href="<?= Url::to(['site/employers']) ?>">
                    <?= Yii::t('frontend', 'View the full list') ?>
                </a>
            </div>
        </div>
    </div>
</div> <!--.card-->


<!-- Filters Available -->
<div class="row" style='direction:ltr;'>
    <div class="card">
        <div class="panel-body" style="text-align:center">
            <h2 style="text-align: center"> <?= Yii::t('frontend', 'You can target students by') ?></h2> 
            <div id=filterList style="text-align:center">
                <button type="button" class="btn btn-default" data-toggle="button" style="margin-bottom: 15px">
                    <?= Yii::t('frontend', 'GPA') ?>
                </button>
                <button type="button" class="btn btn-default" data-toggle="button">
                    <?= Yii::t('frontend', 'NATIONALITY') ?>
                </button>                        
                <button type="button" class="btn btn-default" data-toggle="button">
                    <?= Yii::t('frontend', 'DEGREE') ?>
                </button>
                <button type="button" class="btn btn-default" data-toggle="button">
                    <?= Yii::t('frontend', 'GRADUATION') ?>
                </button>
                <button type="button" class="btn btn-default" data-toggle="button">
                    <?= Yii::t('frontend', 'MAJOR') ?>
                </button>
                <button type="button" class="btn btn-default" data-toggle="button">
                    <?= Yii::t('frontend', 'LANGUAGE') ?>
                </button>                                              
                <button type="button" class="btn btn-default" data-toggle="button">
                    <?= Yii::t('frontend', 'UNIVERSITY') ?>
                </button>
                <button type="button" class="btn btn-default" data-toggle="button">
                    <?= Yii::t('frontend', 'AND MORE') ?>
                </button>
            </div>
        </div>
    </div>
</div>

<!-- demo row -->
<div class="row" style='direction:ltr;'>
    <div class="card">
        <div class="panel-body" style="text-align: center">
            <h2><?= Yii::t('frontend', 'Having Doubts?') ?></h2>
            <a class="btn btn-teal btn-xl" href="<?= Yii::$app->urlManagerFrontend->createUrl("site/demo") ?>">
                <?= Yii::t('frontend', 'Try a demo of our platform') ?>
            </a>
        </div>
    </div>
</div> <!--.card-->