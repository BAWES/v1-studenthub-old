<?php
use yii\grid\GridView;
use yii\data\ActiveDataProvider;
use common\models\Log;
use yii\log\Logger;
use common\models\Payment;
use common\models\PaymentType;

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
    <?php
    /**
     * Today Sales
     */
    $todayKNET = Payment::total(PaymentType::TYPE_KNET, 1);
    $todayCC = Payment::total(PaymentType::TYPE_CREDITCARD, 1);
    $todayCash = Payment::total(PaymentType::TYPE_CASH, 1);
    $todayCreditPurchase = Payment::total(PaymentType::TYPE_CREDIT, 1);
    $todayGift = Payment::total(PaymentType::TYPE_CREDIT_GIVEAWAY, 1);
    $todayRefund = Payment::total(PaymentType::TYPE_CREDIT_REFUND, 1);


    /**
     * Months Sales
     */
    $monthKNET = Payment::total(PaymentType::TYPE_KNET, 31);
    $monthCC = Payment::total(PaymentType::TYPE_CREDITCARD, 31);
    $monthCash = Payment::total(PaymentType::TYPE_CASH, 31);
    $monthCreditPurchase = Payment::total(PaymentType::TYPE_CREDIT, 31);
    $monthGift = Payment::total(PaymentType::TYPE_CREDIT_GIVEAWAY, 31);
    $monthRefund = Payment::total(PaymentType::TYPE_CREDIT_REFUND, 31);

    /**
     * Lifetime Sales
     */
    $lifetimeKNET = Payment::total(PaymentType::TYPE_KNET);
    $lifetimeCC = Payment::total(PaymentType::TYPE_CREDITCARD);
    $lifetimeCash = Payment::total(PaymentType::TYPE_CASH);
    $lifetimeCreditPurchase = Payment::total(PaymentType::TYPE_CREDIT);
    $lifetimeGift = Payment::total(PaymentType::TYPE_CREDIT_GIVEAWAY);
    $lifetimeRefund = Payment::total(PaymentType::TYPE_CREDIT_REFUND);

    ?>
    <div class="row">
        <div class="col-md-4">
            <h3>Today's Sales</h3>
            <table class="table">
                <tr>
                    <td>KNET</td>
                    <td><?= Yii::$app->formatter->asCurrency($todayKNET?$todayKNET:0) ?></td>
                </tr>
                <tr>
                    <td>CyberSource</td>
                    <td><?= Yii::$app->formatter->asCurrency($todayCC?$todayCC:0) ?></td>
                </tr>
                <tr>
                    <td>Cash</td>
                    <td><?= Yii::$app->formatter->asCurrency($todayCash?$todayCash:0) ?></td>
                </tr>
            </table>
        </div>

        <div class="col-md-4">
            <h3><?= date("F") ?> Sales</h3>
            <table class="table">
                <tr>
                    <td>KNET</td>
                    <td><?= Yii::$app->formatter->asCurrency($monthKNET?$monthKNET:0) ?></td>
                </tr>
                <tr>
                    <td>CyberSource</td>
                    <td><?= Yii::$app->formatter->asCurrency($monthCC?$monthCC:0) ?></td>
                </tr>
                <tr>
                    <td>Cash</td>
                    <td><?= Yii::$app->formatter->asCurrency($monthCash?$monthCash:0) ?></td>
                </tr>
            </table>
        </div>        

        <div class="col-md-4">
            <h3>Lifetime Sales</h3>
            <table class="table">
                <tr>
                    <td>KNET</td>
                    <td><?= Yii::$app->formatter->asCurrency($lifetimeKNET?$lifetimeKNET:0) ?></td>
                </tr>
                <tr>
                    <td>CyberSource</td>
                    <td><?= Yii::$app->formatter->asCurrency($lifetimeCC?$lifetimeCC:0) ?></td>
                </tr>
                <tr>
                    <td>Cash</td>
                    <td><?= Yii::$app->formatter->asCurrency($lifetimeCash?$lifetimeCash:0) ?></td>
                </tr>
            </table>
        </div>
    </div>
    
    <div class="row">
        <div class="col-md-4">
            <h3>Today's Credit Changes</h3>
            <table class="table">
                <tr>
                    <td>Purchase Job</td>
                    <td><?= Yii::$app->formatter->asCurrency($todayCreditPurchase?$todayCreditPurchase:0) ?></td>
                </tr>
                <tr>
                    <td>Gift from Admin</td>
                    <td><?= Yii::$app->formatter->asCurrency($todayGift?$todayGift:0) ?></td>
                </tr>
                <tr>
                    <td>Refunded Credit</td>
                    <td><?= Yii::$app->formatter->asCurrency($todayRefund?$todayRefund:0) ?></td>
                </tr>
            </table>
        </div>

        <div class="col-md-4">
            <h3><?= date("F") ?> Credit Changes</h3>
            <table class="table">
                <tr>
                    <td>Purchase Job</td>
                    <td><?= Yii::$app->formatter->asCurrency($monthCreditPurchase?$monthCreditPurchase:0) ?></td>
                </tr>
                <tr>
                    <td>Gift from Admin</td>
                    <td><?= Yii::$app->formatter->asCurrency($monthGift?$monthGift:0) ?></td>
                </tr>
                <tr>
                    <td>Refunded Credit</td>
                    <td><?= Yii::$app->formatter->asCurrency($monthRefund?$monthRefund:0) ?></td>
                </tr>
            </table>
        </div>        

        <div class="col-md-4">
            <h3>Lifetime Credit Changes</h3>
            <table class="table">
                <tr>
                    <td>Purchase Job</td>
                    <td><?= Yii::$app->formatter->asCurrency($lifetimeCreditPurchase?$lifetimeCreditPurchase:0) ?></td>
                </tr>
                <tr>
                    <td>Gift from Admin</td>
                    <td><?= Yii::$app->formatter->asCurrency($lifetimeGift?$lifetimeGift:0) ?></td>
                </tr>
                <tr>
                    <td>Refunded Credit</td>
                    <td><?= Yii::$app->formatter->asCurrency($lifetimeRefund?$lifetimeRefund:0) ?></td>
                </tr>
            </table>
        </div>
    </div>

</div>
