<?php
use yii\grid\GridView;
use yii\data\ActiveDataProvider;
use common\models\Log;
use yii\log\Logger;

/* @var $this yii\web\View */

$this->title = 'Dashboard';
?>
<div class="site-index">

    <div class="row">
        <div>
        <h1>Recent Activity</h1>

        <?php
        $logDataProvider = new ActiveDataProvider([
                'query' => Log::find()->where("category != 'application'")->orderBy("log_time DESC"),
                'pagination' => [
                    'pageSize' => 10,
                ]
            ]);
        ?>
        <?= GridView::widget([
            'dataProvider' => $logDataProvider,
            'columns' => [
                [
                    'attribute' => 'Time',
                    'format' => 'raw',
                    'value' => function ($model) {
                            return Yii::$app->formatter->asDatetime(explode('.', $model->log_time)[0]);
                    },
                ],
                [
                    'attribute' => 'Message',
                    'format' => 'raw',
                    'value' => function ($model) {
                            return $model->message;
                    },
                ],
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

                ['class' => 'yii\grid\ActionColumn', 'controller' => 'log', 'template' => '{view}'],
            ],
        ]); 
        ?>
        </div>
    </div>

    <div class="row">

        <div class="col-md-4">
            <h3>Today's Sales</h3>

        </div>

        <div class="col-md-4">
            <h3><?= date("F") ?> Sales</h3>

        </div>        

        <div class="col-md-4">
            <h3 style="margin-bottom:1em;">Payment Summary</h3>
            <table class="table">
                <tr>
                    <td>Payments</td>
                    <td><?= Yii::$app->formatter->asCurrency($totalPayments = \common\models\Payment::total()) ?></td>
                </tr>
                <tr>
                    <td>Transactions</td>
                    <td><?= Yii::$app->formatter->asCurrency($totalTransactions = \common\models\Transaction::total()) ?></td>
                </tr>
                <tr class="danger" style="font-weight:bold;">
                    <td>Unused Credit</td>
                    <td><?= Yii::$app->formatter->asCurrency($totalPayments - $totalTransactions) ?></td>
                </tr>
            </table>
        </div>

    </div>

</div>
