<?php
use yii\helpers\Url;

/* @var $this yii\web\View */
$this->title = Yii::t("employer", 'Dashboard');

$this->registerCssFile("@web/css/dashboard.css", ['depends' => 'common\assets\TemplateAsset']);
?>

<a href="<?= Url::to(["job/create"]) ?>" class="btn btn-success btn-xl btn-block btn-ripple" style="margin-bottom: 1em">
    <i class="fa fa-pencil-square-o"></i> <?= Yii::t('employer', 'Post a Job Opening') ?>
</a>
<br/>

<ul class="nav nav-tabs" style="background-color: white">
    <li class="active"><a href="#openJobs" data-toggle="tab"><?= Yii::t('employer', 'Open') ?> <span class="badge badge-teal"><?= Yii::$app->formatter->asInteger(3) ?></span></a></li>
    <li><a href="#pendingJobs" data-toggle="tab"><?= Yii::t('employer', 'Pending') ?> <span class="badge badge-teal"><?= Yii::$app->formatter->asInteger(0) ?></span></a></li>
    <li><a href="#closedJobs" data-toggle="tab"><?= Yii::t('employer', 'Closed') ?> <span class="badge badge-teal"><?= Yii::$app->formatter->asInteger(21) ?></span></a></li>
    <li><a href="#draftJobs" data-toggle="tab"><?= Yii::t('employer', 'Drafts') ?> <span class="badge badge-teal"><?= Yii::$app->formatter->asInteger(6) ?></span></a></li>
</ul>

<div class="row">
    <div class="col-md-12">
        <div class="panel">
            <div class="panel-body">

                <div class="tab-content with-panel">

                    <!-- Students Tab -->
                    <div class="tab-pane active text-style" id="openJobs">

                        <div class="col-md-4">
                            <div class="card card-user card-clickable card-clickable-over-content card-event">

                                <div class="card-heading heading-center text-color-white" style="margin-bottom: 0px; height:132px">
                                    <h3 class="card-title">CS System Planning and Service Assurance Specialist</h3>

                                </div><!--.card-heading-->

                                <div class="card-body applicants">
                                    <div class="calendar" style="width:85px">
                                        <div class="month"><?= Yii::$app->formatter->asDate("September", 'LLLL') ?></div>
                                        <div class="date"><?= Yii::$app->formatter->asInteger(27) ?></div>
                                    </div>
                                    <div class="row">
                                        <p><b> Industry:</b> Banking <br>
                                            <b> Job Type:</b> Part-Time<br><br>
                                            Max number of Applicants: <b> 20 </b> <br> <br>
                                        </p>
                                    </div>


                                    <ul id="users">
                                        <li><a href="#" data-toggle="tooltip" data-placement="top" data-original-title="Emanuele Costa"><img src="img/faces/1.jpg" alt=""></a></li>
                                        <li><a href="#" data-toggle="tooltip" data-placement="top" data-original-title="Sjors Huisman"><img src="img/faces/2.jpg" alt=""></a></li>
                                        <li><a href="#" data-toggle="tooltip" data-placement="top" data-original-title="Isla Olsen"><img src="img/faces/3.jpg" alt=""></a></li>
                                        <li><a href="#" data-toggle="tooltip" data-placement="top" data-original-title="Lydia Gagné"><img src="img/faces/4.jpg" alt=""></a></li>
                                        <li><a href="#" data-toggle="tooltip" data-placement="top" data-original-title="Nicoline Thomsen"><img src="img/faces/5.jpg" alt=""></a></li>
                                        <li><a href="#" data-toggle="tooltip" data-placement="top" data-original-title="Christian Roth"><img src="img/faces/6.jpg" alt=""></a></li>
                                        <li><a href="#" data-toggle="tooltip" data-placement="top" data-original-title="Jonas Verbeke"><img src="img/faces/7.jpg" alt=""></a></li>
                                    </ul>
                                </div><!--.card-body-->
                                <div class="card-footer applicants" style="postition:relative">
                                    <a class="btn btn-floating"  style="position:absolute;right:70px; bottom:7px"><i class="ion-android-create"></i></a>
                                    <a class="btn btn-floating" data-toggle="modal" data-target="#job-more" style="position:absolute;right:15px; bottom:7px"><i class="fa fa-ellipsis-h"></i></a>
                                    <ul>
                                        <li class="pull-left"><a href="#"><?= Yii::$app->formatter->asInteger(100) ?> <?= Yii::t('employer', 'Applied') ?></a></li>
                                    </ul>
                                </div>


                            </div><!--.card-->
                        </div><!--.col-md-4-->
                        
                    </div>

                    
                    <!-- List of pending jobs in this tab -->
                    <div class="tab-pane text-style" id="pendingJobs">
                        
                        pending
                        
                    </div>
                    
                    <!-- List of jobs closed in this tab -->
                    <div class="tab-pane text-style" id="closedJobs">
                        
                        closed
                        
                    </div>
                    

                    <!-- List of jobs drafted in this tab -->
                    <div class="tab-pane text-style" id="draftJobs">
                        
                        draft

                    </div>

                </div>
            </div><!-- panel-body -->
        </div><!--panel-->

    </div><!--col-md-12-->
</div>