<?php
use yii\helpers\Url;
use yii\widgets\ListView;

/* @var $this yii\web\View */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = Yii::t('frontend', 'Browse Jobs');
$this->params['breadcrumbs'][] = Yii::t('frontend', 'Browse Jobs');
?>
<div class="panel" id="mainPanel">
    <div class="panel-heading">
        <div class="panel-title">
            <h4><?= Yii::t('frontend', 'Browse Jobs')?></h4>
        </div>
    </div>

    <div class="panel-body">
        <?= ListView::widget([
        'dataProvider' => $dataProvider,
        'itemOptions' => ['class' => 'col-md-6', 'style' => ''],
        'itemView' => "_jobdetail",
    ]) ?>
        

    </div>
</div>