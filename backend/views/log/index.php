<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\log\Logger;


/* @var $this yii\web\View */
/* @var $searchModel common\models\LogSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Logs';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="log-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            
            [
                    'attribute' => 'Level',
                    'format' => 'raw',
                    'value' => function ($model) {
                            switch($model->level){
                                case Logger::LEVEL_INFO:
                                    return "<div style='text-align:center; background:green; color:white; font-weight:bold;'>Info</div>";
                                    break;
                                case Logger::LEVEL_ERROR:
                                    return "<div style='text-align:center; background:red; font-weight:bold;'>Error</span></div>";
                                    break;
                                case Logger::LEVEL_WARNING:
                                    return "<div style='text-align:center; background:yellow; font-weight:bold;'>Warning</div>";
                                    break;
                            }
                    },
            ],
            'id',
            'level',
            'category',
            'log_time',
            'prefix:ntext',
            //'message:ntext',

            ['class' => 'yii\grid\ActionColumn', 'template' => '{view}'],
        ],
    ]); ?>

</div>
