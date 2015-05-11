<?php
use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model common\models\Job */

$this->title = Yii::t('app', 'Update {modelClass}: ', [
    'modelClass' => 'Job',
]) . ' ' . $model->job_id;
$this->params['breadcrumbs'][] = ['label' => Yii::t('employer', 'Dashboard'), 'url' => ['dashboard/index']];
$this->params['breadcrumbs'][] = ['label' => $model->job_title, 'url' => ['view', 'id' => $model->job_id]];
$this->params['breadcrumbs'][] = Yii::t('app', 'Update');
?>

<div class="panel">

    <div class="panel-body">
        
        <?= $this->render('_form', [
            'model' => $model,
        ]) ?>
        
    </div>

</div>