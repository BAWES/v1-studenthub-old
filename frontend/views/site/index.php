<?php
/* @var $this yii\web\View */
$this->title = 'Welcome to StudentHub';
?>

<?php
//Define block for header navigation/scrollable tabs
$this->beginBlock('header-tabs');
?>
<div class="header-tabs scrollable-tabs sticky">
    <ul class="nav nav-tabs tabs-active-text-white tabs-active-border-yellow">
        <li class="active"><a href="#glyphicons" data-toggle="tab">Students</a></li>
        <li><a href="#fontawesome" data-toggle="tab">Employers</a></li>
    </ul>
</div>
<?php $this->endBlock(); ?>


<div class="row">
    <div class="col-md-12">
        <div class="panel">
            <div class="panel-body">

                <div class="tab-content with-panel">
                    <div class="tab-pane active text-style" id="glyphicons">

                        <div class="well">
                            Here are some of the glyphicons. You can see the full icon list on <a href="http://glyphicons.com/" target="_blank">Glyphicon website</a>.
                        </div>

                        <div class="list-fonticons">
                            <ul class="clearfix">
                                <li>
                                    <span class="glyphicon glyphicon-asterisk"></span>
                                    <span class="glyphicon-text">glyphicon glyphicon-asterisk</span>
                                </li>

                                <li>
                                    <span class="glyphicon glyphicon-plus"></span>
                                    <span class="glyphicon-text">glyphicon glyphicon-plus</span>
                                </li>

                          

                            </ul>
                        </div><!--.list-fonticons-->
                    </div><!--tab-pane-->

                    <div class="tab-pane text-style" id="fontawesome">

                        <div class="well">
                            Here are some of the font awesome icons. You can see the full icon list on <a href="http://fontawesome.io/" target="_blank">Font Awesome website</a>.
                        </div>

                        <div class="row fontawesome-icon-list">

                           
                            <div class="fa-hover col-md-3 col-sm-4"><i class="fa fa-lastfm"></i> fa-lastfm</div>
                            <div class="fa-hover col-md-3 col-sm-4"><i class="fa fa-lastfm-square"></i> fa-lastfm-square</div>
                            <div class="fa-hover col-md-3 col-sm-4"><i class="fa fa-line-chart"></i> fa-line-chart</div>
                            <div class="fa-hover col-md-3 col-sm-4"><i class="fa fa-meanpath"></i> fa-meanpath</div>
                            <div class="fa-hover col-md-3 col-sm-4"><i class="fa fa-newspaper-o"></i> fa-newspaper-o</div>
                            <div class="fa-hover col-md-3 col-sm-4"><i class="fa fa-paint-brush"></i> fa-paint-brush</div>
                            <div class="fa-hover col-md-3 col-sm-4"><i class="fa fa-paypal"></i> fa-paypal</div>
                            <div class="fa-hover col-md-3 col-sm-4"><i class="fa fa-pie-chart"></i> fa-pie-chart</div>
                            <div class="fa-hover col-md-3 col-sm-4"><i class="fa fa-plug"></i> fa-plug</div>
                            <div class="fa-hover col-md-3 col-sm-4"><i class="fa fa-shekel"></i> fa-shekel <span class="text-muted">(alias)</span></div>
                            <div class="fa-hover col-md-3 col-sm-4"><i class="fa fa-sheqel"></i> fa-sheqel <span class="text-muted">(alias)</span></div>
                            <div class="fa-hover col-md-3 col-sm-4"><i class="fa fa-slideshare"></i> fa-slideshare</div>
                            <div class="fa-hover col-md-3 col-sm-4"><i class="fa fa-soccer-ball-o"></i> fa-soccer-ball-o <span class="text-muted">(alias)</span></div>
                            <div class="fa-hover col-md-3 col-sm-4"><i class="fa fa-toggle-off"></i> fa-toggle-off</div>
                            <div class="fa-hover col-md-3 col-sm-4"><i class="fa fa-toggle-on"></i> fa-toggle-on</div>
                            <div class="fa-hover col-md-3 col-sm-4"><i class="fa fa-trash"></i> fa-trash</div>
                            <div class="fa-hover col-md-3 col-sm-4"><i class="fa fa-tty"></i> fa-tty</div>
                            <div class="fa-hover col-md-3 col-sm-4"><i class="fa fa-twitch"></i> fa-twitch</div>
                            <div class="fa-hover col-md-3 col-sm-4"><i class="fa fa-wifi"></i> fa-wifi</div>
                            <div class="fa-hover col-md-3 col-sm-4"><i class="fa fa-yelp"></i> fa-yelp</div>
                        </div><!--.row-->

                    </div><!--tab-pane-->

                    <div class="tab-pane text-style" id="ionicons">

                        <div class="well">
                            Here are some of the ion icons. You can see the full icon list on <a href="http://ionicons.com/" target="_blank">Ion Icon website</a>.
                        </div>

                        <div class="list-fonticons">
                            <ul class="clearfix">

                                <li>
                                    <span class="fonticon ion-aperture"></span>
                                    <span class="icon-text">ion-aperture</span>
                                </li>

                                <li>
                                    <span class="fonticon ion-archive"></span>
                                    <span class="icon-text">ion-archive</span>
                                </li>

                                <li>
                                    <span class="fonticon ion-arrow-down-a"></span>
                                    <span class="icon-text">ion-arrow-down-a</span>
                                </li>

                                <li>
                                    <span class="fonticon ion-arrow-down-b"></span>
                                    <span class="icon-text">ion-arrow-down-b</span>
                                </li>

                                <li>
                                    <span class="fonticon ion-arrow-down-c"></span>
                                    <span class="icon-text">ion-arrow-down-c</span>
                                </li>

                                <li>
                                    <span class="fonticon ion-arrow-expand"></span>
                                    <span class="icon-text">ion-arrow-expand</span>
                                </li>

                                <li>
                                    <span class="fonticon ion-arrow-graph-down-left"></span>
                                    <span class="icon-text">ion-arrow-graph-down-left</span>
                                </li>

                                <li>
                                    <span class="fonticon ion-arrow-graph-down-right"></span>
                                    <span class="icon-text">ion-arrow-graph-down-right</span>
                                </li>

                                <li>
                                    <span class="fonticon ion-arrow-graph-up-left"></span>
                                    <span class="icon-text">ion-arrow-graph-up-left</span>
                                </li>

                                <li>
                                    <span class="fonticon ion-arrow-graph-up-right"></span>
                                    <span class="icon-text">ion-arrow-graph-up-right</span>
                                </li>

                                <li>
                                    <span class="fonticon ion-arrow-left-a"></span>
                                    <span class="icon-text">ion-arrow-left-a</span>
                                </li>

                                <li>
                                    <span class="fonticon ion-arrow-left-b"></span>
                                    <span class="icon-text">ion-arrow-left-b</span>
                                </li>

                                <li>
                                    <span class="fonticon ion-arrow-left-c"></span>
                                    <span class="icon-text">ion-arrow-left-c</span>
                                </li>

                                <li>
                                    <span class="fonticon ion-arrow-move"></span>
                                    <span class="icon-text">ion-arrow-move</span>
                                </li>

                                <li>
                                    <span class="fonticon ion-arrow-resize"></span>
                                    <span class="icon-text">ion-arrow-resize</span>
                                </li>

                                <li>
                                    <span class="fonticon ion-arrow-return-left"></span>
                                    <span class="icon-text">ion-arrow-return-left</span>
                                </li>

                                <li>
                                    <span class="fonticon ion-arrow-return-right"></span>
                                    <span class="icon-text">ion-arrow-return-right</span>
                                </li>

                                <li>
                                    <span class="fonticon ion-arrow-right-a"></span>
                                    <span class="icon-text">ion-arrow-right-a</span>
                                </li>

                               

                            </ul>
                        </div><!--.list-fonticons-->
                    </div><!--.tab-pane-->
                </div>
            </div>
        </div>
    </div>
</div>

<h1>You're a Student!</h1>

<p class="lead">Welcome to the front-end!</p>

<p><a class="btn btn-lg btn-danger" href="#">Don't click this</a></p>