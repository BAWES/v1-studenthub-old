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


//RTL Settings
if($this->params['isArabic']){
    //ArabicAsset depends on TemplateAsset - adds some css fixes
    ArabicAsset::register($this);
}
else{
    //TemplateAsset includes YiiAsset (jQuery) and this templates core assets
    TemplateAsset::register($this);
}

//Include Modernizr in head section
$this->registerJsFile(Url::to('@web/plugins/modernizr/modernizr.min.js'), ['position' => View::POS_HEAD]);

//Initialize on Document Ready (via jQuery)
$jsInclude = "
Pleasure.init();
Layout.init();
";
$this->registerJs($jsInclude, View::POS_READY, 'my-options');


?>
<?php $this->beginPage() ?>
<!DOCTYPE html>
<!--[if lt IE 7]>      <html lang="<?= Yii::$app->language ?>" class="no-js lt-ie9 lt-ie8 lt-ie7" <?= $this->params['isArabic']?"dir='rtl'":"" ?>> <![endif]-->
<!--[if IE 7]>         <html lang="<?= Yii::$app->language ?>" class="no-js lt-ie9 lt-ie8" <?= $this->params['isArabic']?"dir='rtl'":"" ?>> <![endif]-->
<!--[if IE 8]>         <html lang="<?= Yii::$app->language ?>" class="no-js lt-ie9" <?= $this->params['isArabic']?"dir='rtl'":"" ?>> <![endif]-->
<!--[if gt IE 8]><!--> <html lang="<?= Yii::$app->language ?>" class="no-js" <?= $this->params['isArabic']?"dir='rtl'":"" ?>> <!--<![endif]-->
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
    <body class="<?= $this->params['isArabic']?"layout-rtl":"" ?>">
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
            <div class="nav-search">
                <span class="search"></span>
            </div><!--.nav-search-->

            <div class="nav-user">
                <div class="user">
                    <img src="<?= Yii::$app->user->identity->photo ?>" alt="">
                    <span class="badge">3</span>
                </div><!--.user-->
                <div class="cross">
                    <span class="line"></span>
                    <span class="line"></span>
                </div><!--.cross-->
            </div><!--.nav-user-->
            <?php } ?>
            
            <?php if(Yii::$app->language == 'en-US'){ ?>
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

        <div class="content" <?= $this->params['isArabic']?'style="direction:rtl"':'' ?>>

            <div class="page-header full-content" style="<?= isset($this->blocks['header-tabs'])?'min-height: 141px;':'' ?>">
                <div class="row">
                    <div class="col-sm-6">
                        <h1><?= Html::encode($this->title) ?></h1>
                    </div><!--.col-->
                    <div class="col-sm-6">
                        <?= Breadcrumbs::widget([
                            'homeLink' => [
                                'label' => '<i class="ion-home"></i>',
                                'encode' => false,
                                'url' => \Yii::$app->getHomeUrl(),
                            ],
                            'tag' => 'ol',
                            'links' => isset($this->params['breadcrumbs']) ? $this->params['breadcrumbs'] : [],
                        ]) ?>
                    </div><!--.col-->
                </div><!--.row-->
                
                <?php
                if (isset($this->blocks['header-tabs'])){
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
                $menuItems = [
                    ['label' => Yii::t('frontend','Home'), 'url' => ['/site/index']],
                    ['label' => Yii::t('frontend','Contact'), 'url' => ['/site/contact']],
                    
                ];
                if (Yii::$app->user->isGuest) {
                    $menuItems[] = ['label' => Yii::t('frontend','Register'), 'url' => ['/register/index']];
                    $menuItems[] = ['label' => Yii::t('frontend','Login'), 'url' => ['/site/login']];
                } else {
                    $menuItems[] = [
                        'label' => 'Test',
                        'items' => [
                            [
                                'label' => 'Student Registration',
                                'url' => ['/register/index'],
                            ],
                        ]
                    ];
                    $menuItems[] = [
                        'label' => Yii::t('frontend','Logout'),
                        'url' => ['/site/logout'],
                        'linkOptions' => ['data-method' => 'post']
                    ];
                }
                
                echo Navigation::widget(['items' => $menuItems]);
                ?>
            </div><!--.menu-layer-->
            <!-- END OF MENU LAYER -->

            <!-- BEGIN SEARCH LAYER -->
            <?php if (!Yii::$app->user->isGuest) { ?>
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
            <div class="user-layer">
                <ul class="nav nav-tabs nav-justified" role="tablist">
                    <li class="active"><a href="#messages" data-toggle="tab">Messages</a></li>
                    <li><a href="#notifications" data-toggle="tab">Notifications <span class="badge">3</span></a></li>
                    <li><a href="#settings" data-toggle="tab">Settings</a></li>
                </ul>

                <div class="row no-gutters tab-content">

                    <div class="tab-pane fade in active" id="messages">
                        <div class="col-md-4">
                            <div class="message-list-overlay"></div>

                            <ul class="list-material message-list">
                                <li class="has-action-left has-action-right">
                                    <a href="#" class="visible" data-message-id="1">
                                        <div class="list-action-left">
                                            <img src="img/faces/1.jpg" class="face-radius" alt="">
                                        </div>
                                        <div class="list-content">
                                            <span class="title">Pari Subramanium</span>
                                            <span class="caption">Collaboratively administrate empowered markets via plug-and-play networks. Dynamically procrastinate B2C users after installed base benefits.</span>
                                        </div>
                                        <div class="list-action-right">
                                            <span class="top">15 min</span>
                                            <i class="ion-android-done bottom"></i>
                                        </div>
                                    </a>
                                </li>
                                <li class="has-action-left has-action-right">
                                    <a href="#" class="visible" data-message-id="2">
                                        <div class="list-action-left">
                                            <img src="img/faces/10.jpg" class="face-radius" alt="">
                                        </div>
                                        <div class="list-content">
                                            <span class="title">Andrew Fox</span>
                                            <span class="caption">Dramatically visualize customer directed convergence without revolutionary ROI. Efficiently unleash cross-media information without cross-media value.</span>
                                        </div>
                                        <div class="list-action-right">
                                            <span class="top">2 hr</span>
                                            <i class="ion-android-done bottom"></i>
                                        </div>
                                    </a>
                                </li>
                                <li class="has-action-left has-action-right">
                                    <a href="#" class="visible" data-message-id="3">
                                        <div class="list-action-left">
                                            <img src="img/faces/11.jpg" class="face-radius" alt="">
                                        </div>
                                        <div class="list-content">
                                            <span class="title">Lieke Vermeulen</span>
                                            <span class="caption">Quickly maximize timely deliverables for real-time schemas. Dramatically maintain clicks-and-mortar solutions without functional solutions.</span>
                                        </div>
                                        <div class="list-action-right">
                                            <span class="top">Yesterday</span>
                                            <i class="ion-android-volume-off bottom"></i>
                                        </div>
                                    </a>
                                </li>
                                <li class="has-action-left has-action-right">
                                    <a href="#" class="visible" data-message-id="4">
                                        <div class="list-action-left">
                                            <img src="img/faces/2.jpg" class="face-radius" alt="">
                                        </div>
                                        <div class="list-content">
                                            <span class="title">Benjamin Beck</span>
                                            <span class="caption">Completely synergize resource sucking relationships via premier niche markets. Professionally cultivate one-to-one customer service with robust ideas.</span>
                                        </div>
                                        <div class="list-action-right">
                                            <span class="top">1 week ago</span>
                                            <i class="ion-android-done bottom"></i>
                                        </div>
                                    </a>
                                </li>
                                <li class="has-action-left has-action-right">
                                    <a href="#" class="visible" data-message-id="5">
                                        <div class="list-action-left">
                                            <img src="img/faces/12.jpg" class="face-radius" alt="">
                                        </div>
                                        <div class="list-content">
                                            <span class="title">Joshua Harris</span>
                                            <span class="caption">Dynamically innovate resource-leveling customer service for state of the art customer service. Objectively innovate empowered manufactured products whereas parallel platforms.</span>
                                        </div>
                                        <div class="list-action-right">
                                            <span class="top">Jan 10, 2015</span>
                                            <i class="ion-android-done bottom"></i>
                                        </div>
                                    </a>
                                </li>
                                <li class="has-action-left has-action-right">
                                    <a href="#" class="visible" data-message-id="1">
                                        <div class="list-action-left">
                                            <img src="img/faces/13.jpg" class="face-radius" alt="">
                                        </div>
                                        <div class="list-content">
                                            <span class="title">Lisa Cooper</span>
                                            <span class="caption">Holisticly predominate extensible testing procedures for reliable supply chains. Dramatically engage top-line web services vis-a-vis cutting-edge deliverables.</span>
                                        </div>
                                        <div class="list-action-right">
                                            <span class="top">Jan 5, 2015</span>
                                            <i class="ion-android-done bottom"></i>
                                        </div>
                                    </a>
                                </li>
                                <li class="has-action-left has-action-right">
                                    <a href="#" class="visible" data-message-id="2">
                                        <div class="list-action-left">
                                            <img src="img/faces/16.jpg" class="face-radius" alt="">
                                        </div>
                                        <div class="list-content">
                                            <span class="title">Matthew Harris</span>
                                            <span class="caption">Globally incubate standards compliant channels before scalable benefits. </span>
                                        </div>
                                        <div class="list-action-right">
                                            <span class="top">Jan 4, 2015</span>
                                            <i class="ion-android-done bottom"></i>
                                        </div>
                                    </a>
                                </li>
                                <li class="has-action-left has-action-right">
                                    <a href="#" class="visible" data-message-id="3">
                                        <div class="list-action-left">
                                            <img src="img/faces/17.jpg" class="face-radius" alt="">
                                        </div>
                                        <div class="list-content">
                                            <span class="title">Diana Nguyen</span>
                                            <span class="caption">Happy new yeaar!!</span>
                                        </div>
                                        <div class="list-action-right">
                                            <span class="top">Jan 1, 2015</span>
                                            <i class="ion-android-done bottom"></i>
                                        </div>
                                    </a>
                                </li>
                            </ul>
                        </div><!--.col-->
                        <div class="col-md-8">
                            <div class="message-send-container">

                                <div class="messages">
                                    <div class="message left">
                                        <div class="message-text">Hello!</div>
                                        <img src="img/faces/1.jpg" class="user-picture" alt="">
                                    </div>
                                    <div class="message right">
                                        <div class="message-text">Hi!</div>
                                        <div class="message-text">Credibly innovate granular internal or "organic" sources whereas high standards in web-readiness. Energistically scale future-proof core competencies vis-a-vis impactful experiences.</div>
                                        <img src="img/faces/tolga-ergin.jpg" class="user-picture" alt="">
                                    </div>
                                    <div class="message left">
                                        <div class="message-text">Dramatically synthesize integrated schemas with optimal networks.</div>
                                        <img src="img/faces/1.jpg" class="user-picture" alt="">
                                    </div>
                                    <div class="message right">
                                        <div class="message-text">Interactively procrastinate high-payoff content</div>
                                        <img src="img/faces/tolga-ergin.jpg" class="user-picture" alt="">
                                    </div>
                                    <div class="message left">
                                        <div class="message-text">Globally incubate standards compliant channels before scalable benefits. Quickly disseminate superior deliverables whereas web-enabled applications. Quickly drive clicks-and-mortar catalysts for change before vertical architectures.</div>
                                        <div class="message-text">Credibly reintermediate backend ideas for cross-platform models. Continually reintermediate integrated processes through technically sound intellectual capital. Holistically foster superior methodologies without market-driven best practices.</div>
                                        <img src="img/faces/1.jpg" class="user-picture" alt="">
                                    </div>
                                    <div class="message right">
                                        <div class="message-text">Distinctively exploit optimal alignments for intuitive bandwidth</div>
                                        <img src="img/faces/tolga-ergin.jpg" class="user-picture" alt="">
                                    </div>
                                    <div class="message left">
                                        <div class="message-text">Quickly coordinate e-business applications through</div>
                                        <img src="img/faces/1.jpg" class="user-picture" alt="">
                                    </div>
                                </div><!--.messages-->

                                <div class="send-message">
                                    <div class="input-group">
                                        <div class="inputer inputer-blue">
                                            <div class="input-wrapper">
                                                <textarea rows="1" id="send-message-input" class="form-control js-auto-size" placeholder="Message"></textarea>
                                            </div>
                                        </div><!--.inputer-->
                                        <span class="input-group-btn">
                                            <button id="send-message-button" class="btn btn-blue" type="button">Send</button>
                                        </span>
                                    </div>
                                </div><!--.send-message-->

                            </div><!--.message-send-container-->
                        </div><!--.col-->

                        <div class="mobile-back">
                            <div class="mobile-back-button"><i class="ion-android-arrow-back"></i></div>
                        </div><!--.mobile-back-->
                    </div><!--.tab-pane #messages-->

                    <div class="tab-pane fade" id="notifications">

                        <div class="col-md-6 col-md-offset-3">

                            <ul class="list-material has-hidden">
                                <li class="has-action-left has-action-right has-long-story">
                                    <a href="#" class="hidden"><i class="ion-android-delete"></i></a>
                                    <a href="#" class="visible">
                                        <div class="list-action-left">
                                            <i class="ion-bag icon text-indigo"></i>
                                        </div>
                                        <div class="list-content">
                                            <span class="caption">Collaboratively administrate empowered markets via plug-and-play networks. Dynamically procrastinate B2C users after installed base benefits.</span>
                                        </div>
                                        <div class="list-action-right">
                                            <span class="top">2 hr</span>
                                            <i class="ion-record text-green bottom"></i>
                                        </div>
                                    </a>
                                </li>
                                <li class="has-action-left has-action-right has-long-story">
                                    <a href="#" class="hidden"><i class="ion-android-delete"></i></a>
                                    <a href="#" class="visible">
                                        <div class="list-action-left">
                                            <i class="ion-image text-green icon"></i>
                                        </div>
                                        <div class="list-content">
                                            <span class="caption">Dramatically visualize customer directed convergence without revolutionary ROI. Efficiently unleash cross-media information without cross-media value.</span>
                                        </div>
                                        <div class="list-action-right">
                                            <span class="top">16:55</span>
                                            <i class="ion-record text-green bottom"></i>
                                        </div>
                                    </a>
                                </li>
                                <li class="has-action-left has-action-right has-long-story">
                                    <a href="#" class="hidden"><i class="ion-android-delete"></i></a>
                                    <a href="#" class="visible">
                                        <div class="list-action-left">
                                            <img src="img/faces/13.jpg" class="face-radius" alt="">
                                        </div>
                                        <div class="list-content">
                                            <span class="caption">Quickly maximize timely deliverables for real-time schemas. Dramatically maintain clicks-and-mortar solutions without functional solutions.</span>
                                        </div>
                                        <div class="list-action-right">
                                            <span class="top">Yesterday</span>
                                            <i class="ion-record text-green bottom"></i>
                                        </div>
                                    </a>
                                </li>
                                <li class="has-action-left has-action-right has-long-story">
                                    <a href="#" class="hidden"><i class="ion-android-delete"></i></a>
                                    <a href="#" class="visible">
                                        <div class="list-action-left">
                                            <img src="img/faces/14.jpg" class="face-radius" alt="">
                                        </div>
                                        <div class="list-content">
                                            <span class="caption">Completely synergize resource sucking relationships via premier niche markets. Professionally cultivate one-to-one customer service with robust ideas.</span>
                                        </div>
                                        <div class="list-action-right">
                                            <span class="top">2 days ago</span>
                                            <i class="ion-android-done bottom"></i>
                                        </div>
                                    </a>
                                </li>
                                <li class="has-action-left has-action-right has-long-story">
                                    <a href="#" class="hidden"><i class="ion-android-delete"></i></a>
                                    <a href="#" class="visible">
                                        <div class="list-action-left">
                                            <i class="ion-location text-light-blue icon"></i>
                                        </div>
                                        <div class="list-content">
                                            <span class="caption">Dynamically innovate resource-leveling customer service for state of the art customer service. Objectively innovate empowered manufactured products whereas parallel platforms.</span>
                                        </div>
                                        <div class="list-action-right">
                                            <span class="top">1 week ago</span>
                                            <i class="ion-android-done bottom"></i>
                                        </div>
                                    </a>
                                </li>
                                <li class="has-action-left has-action-right has-long-story">
                                    <a href="#" class="hidden"><i class="ion-android-delete"></i></a>
                                    <a href="#" class="visible">
                                        <div class="list-action-left">
                                            <i class="ion-bookmark text-deep-orange icon"></i>
                                        </div>
                                        <div class="list-content">
                                            <span class="caption">Holisticly predominate extensible testing procedures for reliable supply chains. Dramatically engage top-line web services vis-a-vis cutting-edge deliverables.</span>
                                        </div>
                                        <div class="list-action-right">
                                            <span class="top">10 Jan</span>
                                            <i class="ion-android-done bottom"></i>
                                        </div>
                                    </a>
                                </li>
                                <li class="has-action-left has-action-right has-long-story">
                                    <a href="#" class="hidden"><i class="ion-android-delete"></i></a>
                                    <a href="#" class="visible">
                                        <div class="list-action-left">
                                            <i class="ion-locked icon"></i>
                                        </div>
                                        <div class="list-content">
                                            <span class="caption">Phosfluorescently engage worldwide methodologies with web-enabled technology.</span>
                                        </div>
                                        <div class="list-action-right">
                                            <span class="top">9 Jan</span>
                                            <i class="ion-android-done bottom"></i>
                                        </div>
                                    </a>
                                </li>
                                <li class="has-action-left has-action-right has-long-story">
                                    <a href="#" class="hidden"><i class="ion-android-delete"></i></a>
                                    <a href="#" class="visible">
                                        <div class="list-action-left">
                                            <img src="img/faces/17.jpg" class="face-radius" alt="">
                                        </div>
                                        <div class="list-content">
                                            <span class="caption">Synergistically evolve 2.0 technologies rather than just in time initiatives. Quickly deploy strategic networks with compelling e-business. Credibly pontificate highly efficient manufactured products and enabled data.</span>
                                        </div>
                                        <div class="list-action-right">
                                            <span class="top">7 Jan</span>
                                            <i class="ion-android-done bottom"></i>
                                        </div>
                                    </a>
                                </li>
                                <li class="has-action-left has-action-right has-long-story">
                                    <a href="#" class="hidden"><i class="ion-android-delete"></i></a>
                                    <a href="#" class="visible">
                                        <div class="list-action-left">
                                            <i class="ion-navigate text-indigo icon"></i>
                                        </div>
                                        <div class="list-content">
                                            <span class="caption">Objectively pursue diverse catalysts for change for interoperable meta-services. Dramatically mesh low-risk high-yield alignments before transparent e-tailers.</span>
                                        </div>
                                        <div class="list-action-right">
                                            <span class="top">7 Jan</span>
                                            <i class="ion-android-done bottom"></i>
                                        </div>
                                    </a>
                                </li>
                            </ul>

                        </div><!--.col-->
                    </div><!--.tab-pane #notifications-->

                    <div class="tab-pane fade" id="settings">
                        <div class="col-md-6 col-md-offset-3">

                            <div class="settings-panel">
                                <p class="text-grey">Here's where you can check your settings of Pleasure Admin Panel. If you need an extra information from us, do not hesitate to contact.</p>

                                <div class="legend">Privacy Controls</div>
                                <ul>
                                    <li>
                                        Show my profile on search results
                                        <div class="switcher switcher-indigo pull-right">
                                            <input id="settings1" type="checkbox" hidden="hidden" checked="checked">
                                            <label for="settings1"></label>
                                        </div><!--.switcher-->
                                    </li>
                                    <li>
                                        Only God can judge me
                                        <div class="switcher switcher-indigo pull-right">
                                            <input id="settings2" type="checkbox" hidden="hidden" checked="checked">
                                            <label for="settings2"></label>
                                        </div><!--.switcher-->
                                    </li>
                                    <li>
                                        Review tags people add to your own posts
                                        <div class="switcher switcher-indigo pull-right">
                                            <input id="settings3" type="checkbox" hidden="hidden">
                                            <label for="settings3"></label>
                                        </div><!--.switcher-->
                                    </li>
                                </ul>

                                <div class="legend">Notifications</div>
                                <ul>
                                    <li>
                                        Activity that involves you
                                        <div class="switcher switcher-indigo pull-right">
                                            <input id="settings4" type="checkbox" hidden="hidden" checked="checked">
                                            <label for="settings4"></label>
                                        </div><!--.switcher-->
                                    </li>
                                    <li>
                                        Birthdays
                                        <div class="switcher switcher-indigo pull-right">
                                            <input id="settings5" type="checkbox" hidden="hidden">
                                            <label for="settings5"></label>
                                        </div><!--.switcher-->
                                    </li>
                                    <li>
                                        Calendar events
                                        <div class="switcher switcher-indigo pull-right">
                                            <input id="settings6" type="checkbox" hidden="hidden">
                                            <label for="settings6"></label>
                                        </div><!--.switcher-->
                                    </li>
                                </ul>

                                <div class="legend">Newsletter</div>
                                <ul>
                                    <li>
                                        Friend requests
                                        <div class="checkboxer checkboxer-indigo pull-right">
                                            <input type="checkbox" id="checkboxSettings1" value="option1" checked="checked">
                                            <label for="checkboxSettings1"></label>
                                        </div>
                                    </li>
                                    <li>
                                        People you may know
                                        <div class="checkboxer checkboxer-indigo pull-right">
                                            <input type="checkbox" id="checkboxSettings2" value="option1">
                                            <label for="checkboxSettings2"></label>
                                        </div>
                                    </li>
                                </ul>

                            </div><!--.settings-panel-->

                        </div><!--.col-->
                    </div><!--.tab-pane #settings-->

                </div><!--.row-->
            </div><!--.user-layer-->
            <?php } ?>
            <!-- END OF USER LAYER -->

        </div><!--.layer-container-->

    <?php $this->endBody() ?>
    </body>
</html>
<?php $this->endPage() ?>
