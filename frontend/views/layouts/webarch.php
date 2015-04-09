<?php

use yii\helpers\Html;
use yii\bootstrap\Nav;
use yii\bootstrap\NavBar;
use yii\widgets\Breadcrumbs;
use frontend\assets\TemplateAsset;
use common\widgets\Alert;

/* @var $this \yii\web\View */
/* @var $content string */

TemplateAsset::register($this);
?>
<?php $this->beginPage() ?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="<?= Yii::$app->charset ?>">
        <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no" />
        <?= Html::csrfMetaTags() ?>
        <title><?= Html::encode($this->title) ?></title>

        <?php $this->head() ?>
    </head>
    <!-- END HEAD -->

    <!-- BEGIN BODY -->
    <body class="">
        <?php $this->beginBody() ?>
        <!-- BEGIN HEADER -->
        <div class="header navbar navbar-inverse "> 
            <!-- BEGIN TOP NAVIGATION BAR -->
            <div class="navbar-inner">
                <div class="header-seperation"> 
                    <ul class="nav pull-left notifcation-center" id="main-menu-toggle-wrapper" style="display:none">	
                        <li class="dropdown"> <a id="main-menu-toggle" href="#main-menu"  class="" > <div class="iconset top-menu-toggle-white"></div> </a> </li>		 
                    </ul>
                    <!-- BEGIN LOGO -->	
                    <a href="index.html"><img src="images/logo.png" class="logo" alt=""  data-src="images/logo.png" data-src-retina="images/logo2x.png" width="106" height="21"/></a>
                    <!-- END LOGO --> 
                    <ul class="nav pull-right notifcation-center">	
                        <li class="dropdown" id="header_task_bar"> <a href="index.html" class="dropdown-toggle active" data-toggle=""> <div class="iconset top-home"></div> </a> </li>
                        <li class="dropdown" id="header_inbox_bar" > <a href="email.html" class="dropdown-toggle" > <div class="iconset top-messages"></div>  <span class="badge" id="msgs-badge">2</span> </a></li>
                            
                    </ul>
                </div>
                <!-- END RESPONSIVE MENU TOGGLER --> 
                <div class="header-quick-nav" > 
                    <!-- BEGIN TOP NAVIGATION MENU -->
                    <div class="pull-left"> 
                        <ul class="nav quick-section">
                            <li class="quicklinks"> <a href="#" class="" id="layout-condensed-toggle" >
                                    <div class="iconset top-menu-toggle-dark"></div>
                                </a> </li>
                        </ul>
                        <ul class="nav quick-section">
                            <li class="quicklinks"> <a href="#" class="" >
                                    <div class="iconset top-reload"></div>
                                </a> </li>
                            <li class="quicklinks"> <span class="h-seperate"></span></li>
                            <li class="quicklinks"> <a href="#" class="" >
                                    <div class="iconset top-tiles"></div>
                                </a> </li>
                            <li class="m-r-10 input-prepend inside search-form no-boarder">
                                <span class="add-on"> <span class="iconset top-search"></span></span>
                                <input name="" type="text"  class="no-boarder " placeholder="Search Dashboard" style="width:250px;">
                            </li>
                        </ul>
                    </div>
                    <!-- END TOP NAVIGATION MENU -->
                    <!-- BEGIN CHAT TOGGLER -->
                    <div class="pull-right"> 
                        <div class="chat-toggler">	
                            <a href="#" class="dropdown-toggle" id="my-task-list" data-placement="bottom"  data-content='' data-toggle="dropdown" data-original-title="Notifications">
                                <div class="user-details"> 
                                    <div class="username">
                                        <span class="badge badge-important">3</span> 
                                        John <span class="bold">Smith</span>									
                                    </div>						
                                </div> 
                                <div class="iconset top-down-arrow"></div>
                            </a>	
                            <div id="notification-list" style="display:none">
                                <div style="width:300px">
                                    <div class="notification-messages info">
                                        <div class="user-profile">
                                            <img src="images/profiles/d.jpg"  alt="" data-src="images/profiles/d.jpg" data-src-retina="images/profiles/d2x.jpg" width="35" height="35">
                                        </div>
                                        <div class="message-wrapper">
                                            <div class="heading">
                                                David Nester - Commented on your wall
                                            </div>
                                            <div class="description">
                                                Meeting postponed to tomorrow
                                            </div>
                                            <div class="date pull-left">
                                                A min ago
                                            </div>										
                                        </div>
                                        <div class="clearfix"></div>									
                                    </div>	
                                    <div class="notification-messages danger">
                                        <div class="iconholder">
                                            <i class="icon-warning-sign"></i>
                                        </div>
                                        <div class="message-wrapper">
                                            <div class="heading">
                                                Server load limited
                                            </div>
                                            <div class="description">
                                                Database server has reached its daily capicity
                                            </div>
                                            <div class="date pull-left">
                                                2 mins ago
                                            </div>
                                        </div>
                                        <div class="clearfix"></div>
                                    </div>	
                                    <div class="notification-messages success">
                                        <div class="user-profile">
                                            <img src="images/profiles/h.jpg"  alt="" data-src="images/profiles/h.jpg" data-src-retina="images/profiles/h2x.jpg" width="35" height="35">
                                        </div>
                                        <div class="message-wrapper">
                                            <div class="heading">
                                                You haveve got 150 messages
                                            </div>
                                            <div class="description">
                                                150 newly unread messages in your inbox
                                            </div>
                                            <div class="date pull-left">
                                                An hour ago
                                            </div>									
                                        </div>
                                        <div class="clearfix"></div>
                                    </div>							
                                </div>				
                            </div>
                            <div class="profile-pic"> 
                                <img src="images/profiles/avatar_small.jpg"  alt="" data-src="images/profiles/avatar_small.jpg" data-src-retina="images/profiles/avatar_small2x.jpg" width="35" height="35" /> 
                            </div>       			
                        </div>
                        <ul class="nav quick-section ">
                            <li class="quicklinks"> 
                                <a data-toggle="dropdown" class="dropdown-toggle  pull-right " href="#" id="user-options">						
                                    <div class="iconset top-settings-dark "></div> 	
                                </a>
                                <ul class="dropdown-menu  pull-right" role="menu" aria-labelledby="user-options">
                                    <li><a href="user-profile.html"> My Account</a>
                                    </li>
                                    <li><a href="calender.html">My Calendar</a>
                                    </li>
                                    <li><a href="email.html"> My Inbox&nbsp;&nbsp;<span class="badge badge-important animated bounceIn">2</span></a>
                                    </li>
                                    <li class="divider"></li>                
                                    <li><a href="login.html"><i class="fa fa-power-off"></i>&nbsp;&nbsp;Log Out</a></li>
                                </ul>
                            </li> 
                            <li class="quicklinks"> <span class="h-seperate"></span></li> 
                        </ul>
                    </div>
                    <!-- END CHAT TOGGLER -->
                </div> 
                <!-- END TOP NAVIGATION MENU --> 

            </div>
            <!-- END TOP NAVIGATION BAR --> 
        </div>
        <!-- END HEADER -->
        <!-- BEGIN CONTAINER -->
        <div class="page-container row-fluid">
            <!-- BEGIN SIDEBAR -->
            <div class="page-sidebar" id="main-menu"> 
                <!-- BEGIN MINI-PROFILE -->
                <div class="page-sidebar-wrapper scrollbar-dynamic" id="main-menu-wrapper"> 
                    <div class="user-info-wrapper">	
                        <div class="profile-wrapper">
                            <img src="images/profiles/avatar.jpg"  alt="" data-src="images/profiles/avatar.jpg" data-src-retina="images/profiles/avatar2x.jpg" width="69" height="69" />
                        </div>
                        <div class="user-info">
                            <div class="greeting">Welcome</div>
                            <div class="username">John <span class="semi-bold">Smith</span></div>
                            <div class="status">Status<a href="#"><div class="status-icon green"></div>Online</a></div>
                        </div>
                    </div>
                    <!-- END MINI-PROFILE -->

                    <!-- BEGIN SIDEBAR MENU -->	
                    <p class="menu-title">BROWSE <span class="pull-right"><a href="javascript:;"><i class="fa fa-refresh"></i></a></span></p>
                    <ul>	
                        <li class="start active "> <a href="index.html"> <i class="icon-custom-home"></i> <span class="title">Dashboard</span> <span class="selected"></span> <span class="badge badge-important pull-right">5</span></a> </li>
                        <li class=""> <a href="email.html"> <i class="fa fa-envelope"></i> <span class="title">Email</span>  <span class=" badge badge-disable pull-right ">203</span></a> </li>      
                        <li class=""> <a href="../frontend/index.html"> <i class="fa fa-flag"></i>  <span class="title">Frontend</span></a></li>   
                        <li class=""> <a href="javascript:;"> <i class="fa fa fa-adjust"></i> <span class="title">Themes</span> <span class="arrow "></span> </a>
                            <ul class="sub-menu">
                                <li > <a href="theme_coporate.html">Coporate </a> </li>
                                <li > <a href="theme_simple.html">Simple</a> </li>
                                <li > <a href="theme_elegant.html">Elegant</a> </li>
                            </ul>
                        </li>    
                        <li class=""> <a href="javascript:;"> <i class="fa fa-file-text"></i> <span class="title">Layouts</span> <span class="arrow "></span> </a>
                            <ul class="sub-menu">
                                <li > <a href="layout_options.html"> Layout Options </a> </li>
                                <li > <a href="boxed_layout.html">Boxed Layout </a> </li>
                                <li > <a href="boxed_layout_v2.html">Inner Boxed Layout </a> </li>
                                <li > <a href="extended_layout.html">Extended Layout</a> </li>
                                <li > <a href="RTL.html">RTL Layout</a> </li>
                                <li > <a href="horizontal_menu.html">Horizontal Menu</a> </li>
                                <li > <a href="horizontal_menu_boxed.html">Horizontal Menu & Boxed</a> </li>
                            </ul>
                        </li>     
                        <li class=""> <a href="javascript:;"> <i class="icon-custom-ui"></i> <span class="title">UI Elements</span> <span class="arrow "></span> </a>
                            <ul class="sub-menu">
                                <li > <a href="typography.html"> Typography </a> </li>
                                <li > <a href="messages_notifications.html"> Messages & Notifications </a> </li>
                                <li > <a href="icons.html">Icons</a> </li>
                                <li > <a href="buttons.html">Buttons</a> </li>		 
                                <li > <a href="tabs_accordian.html"> Tabs & Accordions </a> </li>
                                <li > <a href="sliders.html">Sliders</a> </li>
                                <li > <a href="group_list.html">Group list </a> </li>
                            </ul>
                        </li>
                        <li class=""> <a href="javascript:;"> <i class="icon-custom-form"></i> <span class="title">Forms</span> <span class="arrow "></span> </a>
                            <ul class="sub-menu">
                                <li > <a href="form_elements.html">Form Elements </a> </li>
                                <li > <a href="form_validations.html">Form Validations</a> </li>
                            </ul>
                        </li>
                        <li class=""> <a href="javascript:;"> <i class="icon-custom-portlets"></i> <span class="title">Grids</span> <span class="arrow "></span> </a>
                            <ul class="sub-menu">
                                <li > <a href="grids_simple.html">Simple Grids</a> </li>
                                <li > <a href="grids_draggable.html">Draggable Grids </a> </li>
                            </ul>
                        </li>
                        <li class=""> <a href="javascript:;"> <i class="icon-custom-thumb"></i> <span class="title">Tables</span> <span class="arrow "></span> </a>
                            <ul class="sub-menu">
                                <li > <a href="tables.html"> Basic Tables </a> </li>
                                <li > <a href="datatables.html"> Data Tables </a> </li>
                            </ul>
                        </li>
                        <li class=""> <a href="javascript:;"> <i class="icon-custom-map"></i> <span class="title">Maps</span> <span class="arrow "></span> </a>
                            <ul class="sub-menu">
                                <li > <a href="google_map.html"> Google Maps </a> </li>
                                <li > <a href="vector_map.html"> Vector Maps </a> </li>
                            </ul>
                        </li>
                        <li class=""> <a href="charts.html"> <i class="icon-custom-chart"></i> <span class="title">Charts</span> </a> </li>    
                        <li class=""> <a href="javascript:;"> <i class="icon-custom-extra"></i> <span class="title">Extra</span> <span class="arrow "></span> </a>
                            <ul class="sub-menu">
                                <li > <a href="user-profile.html"> User Profile </a> </li>
                                <li > <a href="time_line.html"> Time line </a> </li>
                                <li > <a href="support_ticket.html"> Support Ticket </a> </li>
                                <li > <a href="gallery.html"> Gallery</a> </li>
                                <li class=""><a href="calender.html"> Calendar</a> </li>
                                <li > <a href="search_results.html"> Search Results </a> </li>
                                <li > <a href="invoice.html"> Invoice </a> </li>
                                <li > <a href="404.html"> 404 Page </a> </li>
                                <li > <a href="500.html"> 500 Page </a> </li>
                                <li > <a href="blank_template.html"> Blank Page </a> </li>
                                <li > <a href="login.html"> Login </a> </li>
                                <li > <a href="login_v2.html">Login v2</a> </li>
                                <li > <a href="lockscreen.html"> Lockscreen </a> </li>
                            </ul>
                        </li>
                        <li class=""> <a href="javascript:;"> <i class="fa fa-folder-open"></i> <span class="title">Menu Levels</span> <span class="arrow "></span> </a>
                            <ul class="sub-menu">
                                <li > <a href="javascript:;"> Level 1 </a> </li>
                                <li > <a href="javascript:;">  <span class="title">Level 2</span> <span class="arrow "></span> </a>
                                    <ul class="sub-menu">
                                        <li > <a href="javascript:;"> Sub Menu </a> </li>
                                        <li > <a href="ujavascript:;"> Sub Menu </a> </li>
                                    </ul>
                                </li>
                            </ul>
                        </li>
                    </ul>
                    <div class="clearfix"></div>
                    <!-- END SIDEBAR MENU --> 
                </div>
            </div>
            <a href="#" class="scrollup">Scroll</a>
            <!-- END SIDEBAR --> 
            
            <!-- BEGIN PAGE CONTENT-->
            <div class="page-content">
                <div id="portlet-config" class="modal hide">
                    <div class="modal-header">
                        <button data-dismiss="modal" class="close" type="button"></button>
                        <h3>Widget Settings</h3>
                    </div>
                    <div class="modal-body"> Widget settings form goes here </div>
                </div>
                <div class="clearfix"></div>

                <div class="content">
                    <?=
                    Breadcrumbs::widget([
                        'links' => isset($this->params['breadcrumbs']) ? $this->params['breadcrumbs'] : [],
                    ])
                    ?>
                    <?= Alert::widget() ?>
                    <?= $content ?>
                </div>
            </div>

        </div>
        
        <?php $this->endBody() ?>
    </body>
</html>
<?php $this->endPage() ?>
