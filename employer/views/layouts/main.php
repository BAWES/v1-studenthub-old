<?php

use yii\helpers\Html;
use common\widgets\Navigation;
use yii\web\View;
use yii\widgets\Breadcrumbs;
use common\assets\TemplateAsset;
use common\assets\ArabicAsset;
use common\widgets\Alert;
use yii\helpers\Url;
use common\models\Employer;
use yii\bootstrap\ActiveForm;

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

//Select dropdown in settings popup
//and the changing of notification preferences
$js = '
function isMobile(){
    var check = false;
  (function(a){if(/(android|bb\d+|meego).+mobile|avantgo|bada\/|blackberry|blazer|compal|elaine|fennec|hiptop|iemobile|ip(hone|od)|iris|kindle|lge |maemo|midp|mmp|mobile.+firefox|netfront|opera m(ob|in)i|palm( os)?|phone|p(ixi|re)\/|plucker|pocket|psp|series(4|6)0|symbian|treo|up\.(browser|link)|vodafone|wap|windows ce|xda|xiino/i.test(a)||/1207|6310|6590|3gso|4thp|50[1-6]i|770s|802s|a wa|abac|ac(er|oo|s\-)|ai(ko|rn)|al(av|ca|co)|amoi|an(ex|ny|yw)|aptu|ar(ch|go)|as(te|us)|attw|au(di|\-m|r |s )|avan|be(ck|ll|nq)|bi(lb|rd)|bl(ac|az)|br(e|v)w|bumb|bw\-(n|u)|c55\/|capi|ccwa|cdm\-|cell|chtm|cldc|cmd\-|co(mp|nd)|craw|da(it|ll|ng)|dbte|dc\-s|devi|dica|dmob|do(c|p)o|ds(12|\-d)|el(49|ai)|em(l2|ul)|er(ic|k0)|esl8|ez([4-7]0|os|wa|ze)|fetc|fly(\-|_)|g1 u|g560|gene|gf\-5|g\-mo|go(\.w|od)|gr(ad|un)|haie|hcit|hd\-(m|p|t)|hei\-|hi(pt|ta)|hp( i|ip)|hs\-c|ht(c(\-| |_|a|g|p|s|t)|tp)|hu(aw|tc)|i\-(20|go|ma)|i230|iac( |\-|\/)|ibro|idea|ig01|ikom|im1k|inno|ipaq|iris|ja(t|v)a|jbro|jemu|jigs|kddi|keji|kgt( |\/)|klon|kpt |kwc\-|kyo(c|k)|le(no|xi)|lg( g|\/(k|l|u)|50|54|\-[a-w])|libw|lynx|m1\-w|m3ga|m50\/|ma(te|ui|xo)|mc(01|21|ca)|m\-cr|me(rc|ri)|mi(o8|oa|ts)|mmef|mo(01|02|bi|de|do|t(\-| |o|v)|zz)|mt(50|p1|v )|mwbp|mywa|n10[0-2]|n20[2-3]|n30(0|2)|n50(0|2|5)|n7(0(0|1)|10)|ne((c|m)\-|on|tf|wf|wg|wt)|nok(6|i)|nzph|o2im|op(ti|wv)|oran|owg1|p800|pan(a|d|t)|pdxg|pg(13|\-([1-8]|c))|phil|pire|pl(ay|uc)|pn\-2|po(ck|rt|se)|prox|psio|pt\-g|qa\-a|qc(07|12|21|32|60|\-[2-7]|i\-)|qtek|r380|r600|raks|rim9|ro(ve|zo)|s55\/|sa(ge|ma|mm|ms|ny|va)|sc(01|h\-|oo|p\-)|sdk\/|se(c(\-|0|1)|47|mc|nd|ri)|sgh\-|shar|sie(\-|m)|sk\-0|sl(45|id)|sm(al|ar|b3|it|t5)|so(ft|ny)|sp(01|h\-|v\-|v )|sy(01|mb)|t2(18|50)|t6(00|10|18)|ta(gt|lk)|tcl\-|tdg\-|tel(i|m)|tim\-|t\-mo|to(pl|sh)|ts(70|m\-|m3|m5)|tx\-9|up(\.b|g1|si)|utst|v400|v750|veri|vi(rg|te)|vk(40|5[0-3]|\-v)|vm40|voda|vulc|vx(52|53|60|61|70|80|81|83|85|98)|w3c(\-| )|webc|whit|wi(g |nc|nw)|wmlb|wonu|x700|yas\-|your|zeto|zte\-/i.test(a.substr(0,4)))check = true})(navigator.userAgent||navigator.vendor||window.opera);
  return check;
}
if(isMobile()){
    $(".selectpicker").selectpicker("mobile");
}

$("#notificationForm select").change(function(){
    $("#notificationForm").submit();
});
';
$this->registerJs($js);


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
                    $menuItems[] = ['label' => Yii::t('frontend', 'Student Portal'), 'url' => Yii::$app->urlManagerFrontend->createUrl("site/index")];
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
                                            <?php
                                            $form = ActiveForm::begin([
                                                    'id' => 'notificationForm', 
                                                    'action' => ['setting/change-notification-preference'],
                                                ]); 
                                            ?>

                                                <?= $form->field(Yii::$app->user->identity, 'employer_email_preference')->dropDownList([
                                                    Employer::NOTIFICATION_DAILY => Yii::t('register', "Daily as jobs are posted"),
                                                    Employer::NOTIFICATION_WEEKLY => Yii::t('register', "Weekly Summary"),
                                                    Employer::NOTIFICATION_OFF => Yii::t('register', "Off"),
                                                ], ['class' => 'selectpicker', 'data-width' => 'auto']) ?>
                                            
                                            
                                            <?php ActiveForm::end(); ?>
                                        </li>                                                    
                                    </ul>                                                   
                                    <div class="legend"><?= Yii::t("frontend", "Account Information") ?></div>
                                    <ul>
                                        <li>
                                            <a href="<?= Url::to(['setting/update-personal-info']) ?>"><?= Yii::t('register', 'Update Personal Information') ?></a>
                                        </li>
                                        <li>
                                            <a href="<?= Url::to(['setting/update-company-info']) ?>"><?= Yii::t('register', 'Update Company Information') ?></a>
                                        </li>
                                        <li>
                                            <a href="<?= Url::to(['setting/update-social-details']) ?>"><?= Yii::t('register', 'Update Social Media Details') ?></a>
                                        </li>
                                        <li>
                                            <a href="<?= Url::to(['setting/update-logo']) ?>"><?= Yii::t('register', 'Update Company Logo') ?></a>
                                        </li>
                                        <li>
                                            <a href="<?= Url::to(['setting/change-password']) ?>"><?= Yii::t('register', 'Change Password') ?></a>
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
