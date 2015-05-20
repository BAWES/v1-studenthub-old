<?php
/* @var $this yii\web\View */

$this->title = 'Dashboard';
?>
<div class="site-index">

    <div class="jumbotron">
        <h1>StudentHub Dashboard</h1>

        <p class="lead">All the important details summarized here</p>

    </div>
    
    <div class="row">
        <div class="col-md-4">
            <h2>Payment Summary</h2>
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
