<?php
use yii\helpers\Url;
use yii\helpers\Html;
use yii\widgets\ListView;


/* @var $this yii\web\View */
/* @var $openJobsDataProvider yii\data\ArrayDataProvider */
/* @var $closedJobsDataProvider yii\data\ArrayDataProvider */
/* @var $draftJobsDataProvider yii\data\ArrayDataProvider */
/* @var $pendingJobsDataProvider yii\data\ArrayDataProvider */

$this->title = Yii::t("employer", 'Dashboard');

$css = "
@media (max-width:352px) {
    .fixmenow span{display:none}
    .fixmenow:after{content:'+'; font-size:15px;}
}
@media (min-width:352px) and (max-width:384px) {
    .fixmenow{font-size:13px;}
}
@media (min-width:992px) and (max-width:1090px) {
    .fixmenow {
        font-size:12px;
    }
}​
";

$js = '
var $aboutJob = $("#about-job").find(".modal-content");
var loadingIndicator = $aboutJob.html();

$("#jobDashboard").on("click", ".jobDetail", function(){
    var detailLink = $(this).attr("data-job");
    
    $.ajax({
        url: detailLink,
        cache: false,
        beforeSend: function () {
            $aboutJob.html(loadingIndicator);
        },
        success: function(response, textStatus, jqXHR)
        {
            $aboutJob.html(response);
        },
        error: function(jqXHR, textStatus, errorThrown)
        {
            console.log(textStatus);
        }
    });
});
';

/**
 * Share Job Functionality
 */
$js .= '
var $shareJob = $("#shareDialog").find(".modal-content");
var shareLoadingIndicator = $shareJob.html();

$("#jobDashboard").on("click", ".jobShare", function(){
    
    var sharedataLink = $(this).attr("data-job");

    $.ajax({
        url: sharedataLink,
        cache: false,
        beforeSend: function () {
            $shareJob.html(loadingIndicator);
        },
        success: function(response, textStatus, jqXHR)
        {
            $shareJob.html(response);
        },
        error: function(jqXHR, textStatus, errorThrown)
        {
            console.log(textStatus);
        }
    });
});
';

$this->registerCssFile("@web/plugins/bootstrap-social/bootstrap-social.css", ['depends' => 'common\assets\TemplateAsset']);
$this->registerCssFile("@web/css/dashboard.css", ['depends' => 'common\assets\TemplateAsset']);
$this->registerCss($css);
$this->registerJs($js);

$countOpenJobs = count($openJobsDataProvider->allModels);
$countClosedJobs = count($closedJobsDataProvider->allModels);
$countPendingJobs = count($pendingJobsDataProvider->allModels);
$countDraftJobs = count($draftJobsDataProvider->allModels);

?>

<a href="<?= Url::to(["job/create"]) ?>" class="btn btn-success btn-xl btn-block btn-ripple" style="margin-bottom: 1em">
    <i class="fa fa-pencil-square-o"></i> <?= Yii::t('employer', 'Post a Job Opening') ?>
</a>
<br/>

<?php
//Set the first available as active
$activeSet = false;
function getActive(&$activeStatus){
    if(!$activeStatus){
        $activeStatus = true;
        return "active";
    }
    return "";
}
?>

<ul class="nav nav-tabs" style="background-color: white">
    <?php if($countOpenJobs > 0){ ?>
    <li class="<?= getActive($activeSet) ?>"><a href="#openJobs" data-toggle="tab"><?= Yii::t('employer', 'Open') ?> <span class="badge badge-teal"><?= Yii::$app->formatter->asInteger($countOpenJobs) ?></span></a></li>
    <?php } ?>
    <?php if($countPendingJobs > 0){ ?>
    <li class="<?= getActive($activeSet) ?>"><a href="#pendingJobs" data-toggle="tab"><?= Yii::t('employer', 'Pending') ?> <span class="badge badge-teal"><?= Yii::$app->formatter->asInteger($countPendingJobs) ?></span></a></li>
    <?php } ?>
    <?php if($countClosedJobs > 0){ ?>
    <li class="<?= getActive($activeSet) ?>"><a href="#closedJobs" data-toggle="tab"><?= Yii::t('employer', 'Closed') ?> <span class="badge badge-teal"><?= Yii::$app->formatter->asInteger($countClosedJobs) ?></span></a></li>
    <?php } ?>
    <?php if($countDraftJobs > 0){ ?>
    <li class="<?= getActive($activeSet) ?>"><a href="#draftJobs" data-toggle="tab"><?= Yii::t('employer', 'Drafts') ?> <span class="badge badge-teal"><?= Yii::$app->formatter->asInteger($countDraftJobs) ?></span></a></li>
    <?php } ?>
</ul>

<?php $activeSet = false; ?>

<div class="row">
    <div class="col-md-12">
        <div class="panel">
            <div class="panel-body">

                <div class="tab-content with-panel" id="jobDashboard">

                    <!-- List of open jobs in this tab -->
                    <?php if($countOpenJobs > 0){ ?>
                    <div class="tab-pane text-style <?= getActive($activeSet) ?>" id="openJobs">
                        <?= ListView::widget([
                            'dataProvider' => $openJobsDataProvider,
                            'itemOptions' => ['class' => 'item'],
                            'itemView' => '_job',
                        ]) ?>
                    </div>
                    <?php } ?>
                    
                    
                    <!-- List of pending jobs in this tab -->
                    <?php if($countPendingJobs > 0){ ?>
                    <div class="tab-pane text-style <?= getActive($activeSet) ?>" id="pendingJobs">
                        <?= ListView::widget([
                            'dataProvider' => $pendingJobsDataProvider,
                            'itemOptions' => ['class' => 'item'],
                            'itemView' => '_job',
                        ]) ?>
                    </div>
                    <?php } ?>
                    
                    
                    <!-- List of jobs closed in this tab -->
                    <?php if($countClosedJobs > 0){ ?>
                    <div class="tab-pane text-style <?= getActive($activeSet) ?>" id="closedJobs">
                        <?= ListView::widget([
                            'dataProvider' => $closedJobsDataProvider,
                            'itemOptions' => ['class' => 'item'],
                            'itemView' => '_job',
                        ]) ?>
                    </div>
                    <?php } ?>
                    

                    <!-- List of jobs drafted in this tab -->
                    <?php if($countDraftJobs > 0){ ?>
                    <div class="tab-pane text-style <?= getActive($activeSet) ?>" id="draftJobs">
                        <?= ListView::widget([
                            'dataProvider' => $draftJobsDataProvider,
                            'itemOptions' => ['class' => 'item'],
                            'itemView' => '_draftJob',
                        ]) ?>
                    </div>
                    <?php } ?>
                    

                </div>
            </div><!-- panel-body -->
            
            
            <!-- Job Details Modal -->
            <div class="modal fade full-height <?= $this->params['isArabic']?"from-left":"from-right"?> " id="about-job" tabindex="-1" role="dialog" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h4 class="modal-title" style="text-align: center"><?= Yii::t('employer',"Loading Job Details..") ?></h4>
                        </div>
                        <div class="modal-body">
                            <div class="loading-bar indeterminate margin-top-10"></div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-teal btn-ripple" data-dismiss="modal"><?= Yii::t('app',"Close") ?></button>
                        </div>
                    </div>
                </div><!--.modal-->
            </div>
            
            <!-- Job Share Modal -->
            <div class="modal scale fade" id="shareDialog" tabindex="-1" role="dialog" aria-hidden="true">
                <div class="modal-dialog modal-sm">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h4 class="modal-title" style="text-align: center"><?= Yii::t('employer', "Loading Job Details..") ?></h4>
                        </div>
                        <div class="modal-body">
                            <div class="loading-bar indeterminate margin-top-10"></div>
                        </div>
                    </div><!--.modal-content-->
                </div><!--.modal-dialog-->
            </div><!--.modal-->
            
            
            
        </div><!--panel-->

    </div><!--col-md-12-->
</div>