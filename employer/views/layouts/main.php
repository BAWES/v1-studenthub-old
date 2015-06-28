<?php

use yii\helpers\Html;
use common\widgets\Navigation;
use yii\web\View;
use yii\widgets\Breadcrumbs;
use common\assets\TemplateAsset;
use common\assets\ArabicAsset;
use common\widgets\Alert;
use yii\helpers\Url;

/* @var $this \yii\web\View */
/* @var $content string */

//Get Notifications and Number
$notifications = $numNotifications = 0;
if(!Yii::$app->user->isGuest){
    $notifications = Yii::$app->user->identity->notifications;
    $numNotifications = Yii::$app->user->identity->unreadNotificationCount;
}

//Disable Search
$searchEnabled = false;

//RTL Settings
if ($this->params['isArabic']) {
    //ArabicAsset depends on TemplateAsset - adds some css fixes
    ArabicAsset::register($this);
} else {
    //TemplateAsset includes YiiAsset (jQuery) and this templates core assets
    TemplateAsset::register($this);
}

//Include Modernizr in head section
$this->registerJsFile(Url::to('@web/plugins/modernizr/modernizr.min.js'), ['position' => View::POS_HEAD]);

//Google Analytics JS
$analytics = "
  (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
  (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
  m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
  })(window,document,'script','//www.google-analytics.com/analytics.js','ga');

  ga('create', 'UA-64467043-1', 'auto');
  ga('send', 'pageview');
";
$this->registerJs($analytics);

//Initialize on Document Ready (via jQuery)
$jsInclude = "
Pleasure.init();
Layout.init();
";
$this->registerJs($jsInclude, View::POS_READY, 'my-options');
$this->registerCss(".logo{font-family: 'RobotoDraft', sans-serif !important;}");

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

        <meta name="viewport" content="width=device-width, initial-scale=1">
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
        
        <!-- Allows apple mobile webapp -->
        <script>(function(a,b,c){if(c in b&&b[c]){var d,e=a.location,f=/^(a|html)$/i;a.addEventListener("click",function(a){d=a.target;while(!f.test(d.nodeName))d=d.parentNode;"href"in d&&(d.href.indexOf("http")||~d.href.indexOf(e.host))&&(a.preventDefault(),e.href=d.href)},!1)}})(document,window.navigator,"standalone")</script>   
        

<?php $this->head() ?>
    </head>
    <body class="theme-teal <?= $this->params['isArabic'] ? "layout-rtl" : "" ?>">
        <?php $this->beginBody() ?>

        <div class="nav-bar-container">

            <!-- BEGIN ICONS -->
            <div class="nav-menu">
                <div class="hamburger">
                    <span class="patty"></span>
                    <span class="patty"></span>
                    <span class="patty"></span>
                    <span class="patty"></span>
                    <span class="patty"></span>
                    <span class="patty"></span>
                </div><!--.hamburger-->
            </div><!--.nav-menu-->

<?php if (!Yii::$app->user->isGuest) { ?>

                <?php if ($searchEnabled) { ?>
                    <div class="nav-search">
                        <span class="search"></span>
                    </div><!--.nav-search-->
    <?php } ?>

                <div class="nav-user">
                    <div class="user">
                        <img src="<?= Yii::$app->user->identity->logo ?>" alt="">
                        <span class="badge"><?= Yii::$app->formatter->asInteger($numNotifications) ?></span>
                    </div><!--.user-->
                    <div class="cross">
                        <span class="line"></span>
                        <span class="line"></span>
                    </div><!--.cross-->
                </div><!--.nav-user-->
<?php } ?>

            <?php if (Yii::$app->language == 'en-US') { ?>
                <a href="<?= Url::to(['/site/arabic']) ?>">
                    <div class="nav-language">
                        <img src="<?= Url::to('@web/images/arabic.png') ?>" alt="العربية" title="العربية">
                    </div>
                </a>
<?php } else { ?>
                <a href="<?= Url::to(['/site/english']) ?>">
                    <div class="nav-language">
                        <img src="<?= Url::to('@web/images/english.png') ?>" alt="English" title="English">
                    </div>
                </a>
<?php } ?>
            <!-- END OF ICONS -->

            <div class="nav-bar-border"></div><!--.nav-bar-border-->

            <!-- BEGIN OVERLAY HELPERS -->
            <div class="overlay">
                <div class="starting-point">
                    <span></span>
                </div><!--.starting-point-->
                <div class="logo"><?= Yii::$app->name ?></div><!--.logo-->
            </div><!--.overlay-->

            <div class="overlay-secondary"></div><!--.overlay-secondary-->
            <!-- END OF OVERLAY HELPERS -->

        </div><!--.nav-bar-container-->

        <div class="content" <?= $this->params['isArabic'] ? 'style="direction:rtl"' : '' ?>>

            <div class="page-header full-content bg-teal" style="<?= isset($this->blocks['header-tabs']) ? 'min-height: 141px;' : '' ?>">
                <div class="row">
                    <div class="col-sm-6">
                        <?php /*<h1><?= Html::encode($this->title) ?></h1>*/ ?>
                        <a href="<?= Url::to(['site/index']) ?>">
                            <?= Html::img("@web/images/studenthub-white.png", ['style' => 'max-width:190px; padding-top:5px;']) ?>
                        </a>
                    </div><!--.col-->
                    <div class="col-sm-6">
                        <?=
                        Breadcrumbs::widget([
                            'homeLink' => [
                                'label' => '<i class="ion-home"></i>',
                                'encode' => false,
                                'url' => \Yii::$app->getHomeUrl(),
                            ],
                            'tag' => 'ol',
                            'links' => isset($this->params['breadcrumbs']) ? $this->params['breadcrumbs'] : [],
                        ])
                        ?>
                    </div><!--.col-->
                </div><!--.row-->

                <?php
                if (isset($this->blocks['header-tabs'])) {
                    echo $this->blocks['header-tabs'];
                }
                ?>
            </div><!--.page-header-->

            <!-- content -->
            <?= Alert::widget() ?>
            <?= $content ?>
            <!-- content -->

        </div><!--.content-->

        <div class="layer-container">

            <!-- BEGIN MENU LAYER -->
            <div class="menu-layer">
                <?php
                $menuItems = [];

                if (Yii::$app->user->isGuest) {
                    $menuItems[] = ['label' => Yii::t('frontend', 'Home'), 'url' => ['/site/index']];
                    $menuItems[] = ['label' => Yii::t('frontend', 'Contact'), 'url' => ['/site/contact']];
                    $menuItems[] = ['label' => Yii::t('frontend', 'Register'), 'url' => ['/site/register']];
                    $menuItems[] = ['label' => Yii::t('frontend', 'Login'), 'url' => ['/site/login']];
                } else {
                    $menuItems[] = ['label' => Yii::t('employer', 'Dashboard'), 'url' => ['/dashboard/index']];
                    $menuItems[] = ['label' => Yii::t('employer', 'Buy Credit'), 'url' => ['/credit/index']];
                    $menuItems[] = ['label' => Yii::t('employer', 'Payment History'), 'url' => ['/payment/index']];
                    $menuItems[] = ['label' => Yii::t('frontend', 'Contact'), 'url' => ['/site/contact']];
                    $menuItems[] = [
                        'label' => Yii::t('frontend', 'Logout'),
                        'url' => ['/site/logout'],
                        'linkOptions' => ['data-method' => 'post']
                    ];
                }

                //Link to Student Portal
                $menuItems[] = ['label' => Yii::t('frontend', 'Student Portal'), 'url' => Yii::$app->urlManagerFrontend->createUrl("site/index")];

                echo Navigation::widget(['items' => $menuItems]);
                ?>
            </div><!--.menu-layer-->
            <!-- END OF MENU LAYER -->

            <!-- BEGIN SEARCH LAYER -->
            <?php if (!Yii::$app->user->isGuest && $searchEnabled) { ?>
                <div class="search-layer">
                    <div class="search">
                        <form action="pages-search-results.html">
                            <div class="form-group">
                                <input type="text" id="input-search" class="form-control" placeholder="type something">
                                <button type="submit" class="btn btn-default disabled"><i class="ion-search"></i></button>
                            </div>
                        </form>
                    </div><!--.search-->

                    <div class="results">
                        <div class="row">
                            <div class="col-md-4">
                                <div class="result result-users">
                                    <h4>USERS <small>(3)</small></h4>

                                    <ul class="list-material">
                                        <li class="has-action-left">
                                            <a href="#" class="hidden"><i class="ion-android-delete"></i></a>
                                            <a href="#" class="visible">
                                                <div class="list-action-left">
                                                    <img src="img/faces/1.jpg" class="face-radius" alt="">
                                                </div>
                                                <div class="list-content">
                                                    <span class="title">Pari Subramanium</span>
                                                    <span class="caption">Legacy Response Assistant</span>
                                                </div>
                                            </a>
                                        </li>
                                        <li class="has-action-left">
                                            <a href="#" class="hidden"><i class="ion-android-delete"></i></a>
                                            <a href="#" class="visible">
                                                <div class="list-action-left">
                                                    <img src="img/faces/10.jpg" class="face-radius" alt="">
                                                </div>
                                                <div class="list-content">
                                                    <span class="title">Andrew Fox</span>
                                                    <span class="caption">National Branding Technician</span>
                                                </div>
                                            </a>
                                        </li>
                                        <li class="has-action-left">
                                            <a href="#" class="hidden"><i class="ion-android-delete"></i></a>
                                            <a href="#" class="visible">
                                                <div class="list-action-left">
                                                    <img src="img/faces/11.jpg" class="face-radius" alt="">
                                                </div>
                                                <div class="list-content">
                                                    <span class="title">Lieke Vermeulen</span>
                                                    <span class="caption">Global Tactics Consultant</span>
                                                </div>
                                            </a>
                                        </li>
                                    </ul>

                                </div><!--.results-user-->
                            </div><!--.col-->
                            <div class="col-md-4">
                                <div class="result result-posts">
                                    <h4>POSTS <small>(5)</small></h4>

                                    <ul class="list-material">
                                        <li class="has-action-left">
                                            <a href="#" class="hidden"><i class="ion-android-delete"></i></a>
                                            <a href="#" class="visible">
                                                <div class="list-action-left">
                                                    <img src="img/picjumbo/1.jpg" class="img-radius" alt="">
                                                </div>
                                                <div class="list-content">
                                                    <span class="title">Mobile Trends for 2015</span>
                                                    <span class="caption">Collaboratively administrate empowered markets via plug-and-play networks.</span>
                                                </div>
                                            </a>
                                        </li>
                                        <li class="has-action-left">
                                            <a href="#" class="hidden"><i class="ion-android-delete"></i></a>
                                            <a href="#" class="visible">
                                                <div class="list-action-left">
                                                    <img src="img/picjumbo/10.jpg" class="img-radius" alt="">
                                                </div>
                                                <div class="list-content">
                                                    <span class="title">Interview with Phillip Riley</span>
                                                    <span class="caption">Dynamically procrastinate B2C users after installed base benefits.</span>
                                                </div>
                                            </a>
                                        </li>
                                        <li class="has-action-left">
                                            <a href="#" class="hidden"><i class="ion-android-delete"></i></a>
                                            <a href="#" class="visible">
                                                <div class="list-action-left">
                                                    <img src="img/picjumbo/11.jpg" class="img-radius" alt="">
                                                </div>
                                                <div class="list-content">
                                                    <span class="title">Workspaces</span>
                                                    <span class="caption">Dramatically visualize customer directed convergence without revolutionary ROI.</span>
                                                </div>
                                            </a>
                                        </li>
                                        <li class="has-action-left">
                                            <a href="#" class="hidden"><i class="ion-android-delete"></i></a>
                                            <a href="#" class="visible">
                                                <div class="list-action-left">
                                                    <img src="img/picjumbo/5.jpg" class="img-radius" alt="">
                                                </div>
                                                <div class="list-content">
                                                    <span class="title">Graphics &amp; Multimedia</span>
                                                    <span class="caption">Efficiently unleash cross-media information without cross-media value.</span>
                                                </div>
                                            </a>
                                        </li>
                                        <li class="has-action-left">
                                            <a href="#" class="hidden"><i class="ion-android-delete"></i></a>
                                            <a href="#" class="visible">
                                                <div class="list-action-left">
                                                    <img src="img/picjumbo/6.jpg" class="img-radius" alt="">
                                                </div>
                                                <div class="list-content">
                                                    <span class="title">Interactive Storytelling</span>
                                                    <span class="caption">Quickly maximize timely deliverables for real-time schemas.</span>
                                                </div>
                                            </a>
                                        </li>
                                    </ul>

                                </div><!--.results-posts-->
                            </div><!--.col-->
                            <div class="col-md-4">
                                <div class="result result-files">
                                    <h4>FILES <small>(0)</small></h4>
                                    <p>No results were found</p>
                                </div><!--.results-files-->
                            </div><!--.col-->

                        </div><!--.row-->
                    </div><!--.results-->
                </div><!--.search-layer-->
            <?php } ?>
            <!-- END OF SEARCH LAYER -->

            <!-- BEGIN USER LAYER -->
            <?php if (!Yii::$app->user->isGuest) { ?>
                <!-- BEGIN USER LAYER -->
                <div class="user-layer">
                    <ul class="nav nav-tabs nav-justified" role="tablist">
                        <li class="active"><a href="#notifications" data-toggle="tab"><?= Yii::t("frontend", "Notifications") ?> <span class="badge"><?= Yii::$app->formatter->asInteger($numNotifications) ?></span></a></li>
                        <li><a href="#credit" data-toggle="tab"><?= Yii::t("employer", "Credit") ?></a></li>
                        <li><a href="#settings" data-toggle="tab"><?= Yii::t("frontend", "Settings") ?></a></li>
                    </ul>

                    <div class="row no-gutters tab-content">

                        <div class="tab-pane fade  in active" id="notifications">
                            <div class="col-md-6 col-md-offset-3">
                                <div class="row" style="margin-bottom:5px;">
                                    <div class="col-xs-10 col-xs-offset-1">
                                        <a href="<?= Url::to(['site/clear-notifications']) ?>" 
                                           class="btn btn-success btn-block">
                                            <?= Yii::t("frontend", "Mark All as Read") ?>
                                        </a>
                                    </div>
                                </div>
                                
                                <ul class="list-material">
                                    
                                    <?php foreach($notifications as $notification){ ?>
                                        <?php if($notification->job){ ?>
                                        <li class="has-action-left has-action-right has-long-story">
                                            <a href="<?= Url::to(['job/applicants', 'id' => $notification->job_id]) ?>" class="visible">
                                                <div class="list-action-left">
                                                    <img src="<?= $notification->student->photo ?>" class="face-radius" alt="">
                                                </div>
                                                <div class="list-content">

                                                    <span class="caption" style="margin-left:10px;">
                                                        <?= Yii::t("frontend", "{student} applied for the job",[
                                                            'student' => $notification->student->student_firstname." ".$notification->student->student_lastname,
                                                        ]) ?>
                                                        <br/> 
                                                        <b><?= $notification->job->job_title ?></b>
                                                    </span>

                                                </div>
                                                <div class="list-action-right">
                                                    <span class="top">
                                                        <?= Yii::$app->formatter->asRelativeTime($notification->notification_datetime) ?>
                                                    </span>
                                                    <?php if($notification->notification_viewed == common\models\NotificationEmployer::VIEWED_FALSE){ ?>
                                                        <i class="ion-record text-green bottom"></i>
                                                    <?php }else{ ?>
                                                        <i class="ion-record text-grey bottom"></i>
                                                    <?php } ?>
                                                </div>
                                            </a>
                                        </li>
                                        <?php } ?>
                                    <?php } ?>
                                    
                                    
                                </ul>

                            </div><!--.col-->
                        </div><!--.tab-pane #notifications-->
                        
                        <div class="tab-pane fade" id="credit" style="padding-top:20px;">
                            
                            <div class="col-md-6 col-md-offset-3 col-xs-10 col-xs-offset-1" style="text-align:center;">
                                
                                    <p><?= Yii::t("employer", "Buying credit allows you to post jobs quickly without having to go through payment processing.") ?></p>
                                    
                                    <h4 style="margin-bottom:0;"><?= Yii::t("employer", "Current Credit") ?></h4>
                                    <h2 style="margin-top:0;"><?= Yii::$app->formatter->asDecimal(Yii::$app->user->identity->employer_credit, 3) ?> <?= Yii::t("employer", "KD") ?></h2>
                                    <a href="<?= Url::to(['credit/index']) ?>" class="btn btn-success btn-block btn-lg"><?= Yii::t("employer", "Buy Credit") ?></a>

                            </div><!--.col-->

                            
                        </div><!--.tab-pane #credit-->

                        <div class="tab-pane fade" id="settings">
                            <div class="col-md-6 col-md-offset-3">

                                <div class="settings-panel" style="padding-top:0;">
                                    <div class="legend"><?= Yii::t("frontend", "Notification Preferences") ?></div>
                                    <ul>
                                        <li>
                                            <button type="button" class="btn dropdown-toggle btn-default" data-toggle="dropdown" title="Daily as jobs are posted"><span class="filter-option pull-left">Daily as jobs are posted</span>&nbsp;<span class="caret"></span></button>
                                        </li>                                                    
                                    </ul>                                                   
                                    <div class="legend"><?= Yii::t("frontend", "Account Information") ?></div>
                                    <ul>
                                        <li>
                                            <a href="">Change Password </a>                                                                
                                        </li>
                                        <li>
                                            <a href="">Personal Information </a>
                                        </li>
                                        <li>
                                            <a href="">University Information </a>
                                        </li>
                                        <li>
                                            <a href="">Contact Information </a>
                                        </li>
                                        <li>
                                            <a href="">Other Information </a>
                                        </li>
                                    </ul>                                                                                                                                                           


                                </div><!--.settings-panel-->

                            </div><!--.col-->
                        </div><!--.tab-pane #settings-->

                    </div><!--.row-->
                    
                </div><!--.user-layer-->
                <!-- END OF USER LAYER -->
            <?php } ?>
            <!-- END OF USER LAYER -->

        </div><!--.layer-container-->

        <?php $this->endBody() ?>
    </body>
</html>
<?php $this->endPage() ?>
