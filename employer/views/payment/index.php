<?php
use yii\helpers\Url;
use common\models\PaymentType;

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
                    <th style="text-align:center"><?= Yii::t("frontend", "Date") ?></th>
                    <th style="text-align:center"><?= Yii::t("frontend", "Type") ?></th>
                    <th style="text-align:center"><?= Yii::t("frontend", "Invoice #") ?></th>										
                    <th style="text-align:center"><?= Yii::t("frontend", "Amount") ?></th>										
                </tr>
            </thead>
            <tbody style="text-align:center;">
                <?php
                foreach($payments as $payment){
                ?>
                    <tr>
                        <td><?= Yii::$app->formatter->asDate($payment->payment_datetime) ?></td>
                        <td><?= $this->params['isArabic']?$payment->paymentType->payment_type_name_ar:$payment->paymentType->payment_type_name_en ?></td>
                        <td><a href="<?= Url::to(['payment/view', 'id'=>$payment->payment_id]) ?>"><?= Yii::$app->formatter->asInteger($payment->payment_id) ?></a></td>
                        <td>
                            <?php 
                            $paymentDisplay = $payment->payment_total?$payment->payment_total:0;
                            /**
                             * Show credit change on giveaway, refund, or credit purchase
                             */
                            switch($payment->payment_type_id){
                                case PaymentType::TYPE_CREDIT_GIVEAWAY:
                                    $paymentDisplay = $payment->payment_employer_credit_change;
                                    break;
                                case PaymentType::TYPE_CREDIT_REFUND:
                                    $paymentDisplay = $payment->payment_employer_credit_change;
                                    break;
                                case PaymentType::TYPE_CREDIT:
                                    $paymentDisplay = $payment->payment_employer_credit_change * -1;
                                    break;
                            }
                            
                            ?>
                            <?= Yii::$app->formatter->asDecimal($paymentDisplay, 3) ?>
                            <?= Yii::t("employer", "KD") ?>
                        </td>
                    </tr>
                <?php } ?>
                
            </tbody>
        </table>

    </div>

</div>