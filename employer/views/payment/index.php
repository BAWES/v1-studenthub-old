<?php
use yii\helpers\Url;

/* @var $this yii\web\View */
/* @var $payments array */

$this->title = Yii::t("employer", 'Payment History');
$this->params['breadcrumbs'][] = $this->title;
?>


<div class="panel">
    <div class="panel-heading">
        <div class="panel-title">
            <h4><?= Yii::t('employer', 'Payment History') ?></h4>
        </div>
    </div>

    <div class="panel-body">

        <table class="table table-bordered table-striped table-condensed">
            <thead>
                <tr>
                    <th style="text-align:center">Date</th>
                    <th style="text-align:center">Type</th>
                    <th style="text-align:center">Invoice #</th>										
                    <th style="text-align:center">Amount</th>										
                </tr>
            </thead>
            <tbody style="text-align:center;">
                <?php
                foreach($payments as $payment){
                ?>
                    <tr>
                        <td><?= Yii::$app->formatter->asDate($payment->payment_datetime) ?></td>
                        <td><?= $this->params['isArabic']?$payment->paymentType->payment_type_name_ar:$payment->paymentType->payment_type_name_en ?></td>
                        <td><a href="#"><?= Yii::$app->formatter->asInteger($payment->payment_id) ?></a></td>
                        <td>
                        <?= $payment->payment_total?Yii::$app->formatter->asDecimal($payment->payment_total, 3):Yii::$app->formatter->asDecimal(0, 3) ?>
                        <?= Yii::t("employer", "KD") ?>
                        </td>
                    </tr>
                <?php } ?>
                
            </tbody>
        </table>

    </div>

</div>