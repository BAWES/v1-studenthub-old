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
@media (min-width:992px) and (max-width:1090px) {
    .fixmenow {
        font-size:12px;
    }
}​
";

$this->registerCssFile("@web/css/dashboard.css", ['depends' => 'common\assets\TemplateAsset']);
$this->registerCss($css);
?>

<a href="<?= Url::to(["job/create"]) ?>" class="btn btn-success btn-xl btn-block btn-ripple" style="margin-bottom: 1em">
    <i class="fa fa-pencil-square-o"></i> <?= Yii::t('employer', 'Post a Job Opening') ?>
</a>
<br/>

<ul class="nav nav-tabs" style="background-color: white">
    <li class="active"><a href="#openJobs" data-toggle="tab"><?= Yii::t('employer', 'Open') ?> <span class="badge badge-teal"><?= Yii::$app->formatter->asInteger(count($openJobsDataProvider->allModels)) ?></span></a></li>
    <li><a href="#pendingJobs" data-toggle="tab"><?= Yii::t('employer', 'Pending') ?> <span class="badge badge-teal"><?= Yii::$app->formatter->asInteger(count($pendingJobsDataProvider->allModels)) ?></span></a></li>
    <li><a href="#closedJobs" data-toggle="tab"><?= Yii::t('employer', 'Closed') ?> <span class="badge badge-teal"><?= Yii::$app->formatter->asInteger(count($closedJobsDataProvider->allModels)) ?></span></a></li>
    <li><a href="#draftJobs" data-toggle="tab"><?= Yii::t('employer', 'Drafts') ?> <span class="badge badge-teal"><?= Yii::$app->formatter->asInteger(count($draftJobsDataProvider->allModels)) ?></span></a></li>
</ul>

<div class="row">
    <div class="col-md-12">
        <div class="panel">
            <div class="panel-body">

                <div class="tab-content with-panel">

                    <!-- List of open jobs in this tab -->
                    <div class="tab-pane active text-style" id="openJobs">

                        <?= ListView::widget([
                            'dataProvider' => $openJobsDataProvider,
                            'itemOptions' => ['class' => 'item'],
                            'itemView' => '_job',
                        ]) ?>
                        
                    </div>

                    
                    <!-- List of pending jobs in this tab -->
                    <div class="tab-pane text-style" id="pendingJobs">
                        
                        <?= ListView::widget([
                            'dataProvider' => $pendingJobsDataProvider,
                            'itemOptions' => ['class' => 'item'],
                            'itemView' => '_job',
                        ]) ?>
                        
                    </div>
                    
                    <!-- List of jobs closed in this tab -->
                    <div class="tab-pane text-style" id="closedJobs">
                        
                        <?= ListView::widget([
                            'dataProvider' => $closedJobsDataProvider,
                            'itemOptions' => ['class' => 'item'],
                            'itemView' => function ($model, $key, $index, $widget) {
                                return Html::a(Html::encode($model->job_id), ['view', 'id' => $model->job_id]);
                            },
                        ]) ?>
                        
                    </div>
                    

                    <!-- List of jobs drafted in this tab -->
                    <div class="tab-pane text-style" id="draftJobs">
                        
                        <?= ListView::widget([
                            'dataProvider' => $draftJobsDataProvider,
                            'itemOptions' => ['class' => 'item'],
                            'itemView' => '_draftJob',
                        ]) ?>

                    </div>

                </div>
            </div><!-- panel-body -->
            <div class="modal fade full-height from-right" id="about-job" tabindex="-1" role="dialog" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h4 class="modal-title" style="text-align: center">Zain</h4>
                        </div>
                        <div class="modal-body">
                            <h3 style="text-align: center; margin-bottom: 1em">Call Center Inbound Agent</h3>
                            <div class="panel-group accordion" id="accordion">
                                <div class="panel">
                                    <div class="panel-heading">
                                        <a class="panel-title" data-toggle="collapse" href="#collapse1">About the Company</a>
                                    </div>
                                    <div id="collapse1" class="panel-collapse collapse">
                                        <div class="panel-body">
                                            The Group’s ﬂagship operation was established in 1983 and made history in 1994 by becoming the first telecom operator to launch a commercial GSM service in the region. Zain Kuwait is the country’s leading operator serving 2.6 million customers as of June 2014, reflecting a market share of 36% and offers a nationwide ultra-fast 4G LTE data network that covers the entire population through 1,787 network sites. Through constant development of the telecommunications infrastructure and proactive marketing initiatives, Zain remains committed to offering customers in Kuwait the most dynamic products and services. The foundation of Zain Kuwait’s achievements lies in the company’s ability to inspire its employees to deliver the best and most imaginative services at every level. With an energetic and inspired predominantly Kuwaiti workforce, the company is committed to employing high caliber people as well as nurturing the finest Kuwaiti talent. With a strong human resources and training program that develops and nurtures leaders in the workplace, the company has consistently opened new doors for its dedicated staff.
                                        </div>
                                    </div>
                                </div>
                                <div class="panel">
                                    <div class="panel-heading">
                                        <a class="panel-title" data-toggle="collapse" href="#collapse2">Responsibilities</a>
                                    </div>
                                    <div id="collapse2" class="panel-collapse collapse">
                                        <div class="panel-body">
                                            You will be responsible for ensuring commercial consistency of the core Voice & data pricing plans,  as well as owning all pricing elements in Voice (including Prepaid, Postpaid for consumer and corporate, in addition to Roaming, International Voice and International SMS) while balancing between competitiveness and profitability.<br>You will also be responsible for providing support to all marketing segments with financial projections and price related matters.
                                        </div>
                                    </div>
                                </div>
                                <div class="panel">
                                    <div class="panel-heading">
                                        <a class="panel-title" data-toggle="collapse" href="#collapse3">Qualifications</a>
                                    </div>
                                    <div id="collapse3" class="panel-collapse collapse">
                                        <div class="panel-body">
                                            - Have a Bachelor in MIS, Marketing or Finance<br>
                                            - 1-2 years of relevant experience<br>
                                        </div>
                                    </div>
                                </div>
                                <div class="panel">
                                    <div class="panel-heading">
                                        <a class="panel-title" data-toggle="collapse" href="#collapse4">Skills</a>
                                    </div>
                                    <div id="collapse4" class="panel-collapse collapse">
                                        <div class="panel-body">
                                            - Good knowledge of all products within a product family<br>
                                            - Good level of knowledge of market trends.<br>
                                            - Basic knowledge and use of technical principles, theories and concept.<br>
                                            - Strong analytical skills and problem solving skills.<br>
                                            - The ability to plan.
                                        </div>
                                    </div>
                                </div>
                                <div class="panel">
                                    <div class="panel-heading">
                                        <a class="panel-title" data-toggle="collapse" href="#collapse5">Compensation</a>
                                    </div>
                                    <div id="collapse5" class="panel-collapse collapse">
                                        <div class="panel-body">
                                            TBD
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-flat-primary" data-dismiss="modal">Close</button>
                            <button type="button" class="btn btn-flat-primary" data-dismiss="modal">Edit</button>                            
                        </div>                        
                    </div>                                    
                </div><!--.modal-->
            </div>
        </div><!--panel-->

    </div><!--col-md-12-->
</div>