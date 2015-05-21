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
        </div><!--panel-->

    </div><!--col-md-12-->
</div>