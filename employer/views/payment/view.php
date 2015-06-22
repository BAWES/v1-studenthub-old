<?php
use yii\helpers\Url;
use common\models\PaymentType;

/* @var $this yii\web\View */
/* @var $payment common\models\Payment */

$this->title = Yii::t("employer", 'Invoice');
$this->params['breadcrumbs'][] = $this->title;


$js = "
$('.print-trigger').click(function () {
    window.print();
});
";
$this->registerJs($js);
?>


<div class="panel">
    <div class="panel-heading">
        <div class="panel-title">
            <h4><?= $this->title ?></h4>
            <div class="panel-buttons">
                <button type="button" class="btn btn-teal print-trigger"><i class="ion ion-android-print"></i> <?= Yii::t("frontend", "Print") ?></button>
            </div><!--.panel-buttons-->
        </div>
    </div>

    <div class="panel-body">

        <div class="invoice">
            <div class="invoice-heading">
                    <div class="row">
                            <div class="col-md-6 col-sm-6" style="text-align:<?= $this->params['isArabic']?'right':'left' ?>">
                                    <img src="<?= Url::to('@web/images/sh-logo.jpg') ?>" alt="" style="width: 300px; margin-top:-30px; margin-left:-20px">
                            </div><!--.col-md-6-->
                            <div class="col-md-6 col-sm-6 invoice-id" style="text-align:<?= $this->params['isArabic']?'left':'right' ?>">
                                    <h4><?= Yii::t("frontend", "Invoice #") ?><?= $payment->payment_id ?></h4>
                                    <h5><?= Yii::$app->formatter->asDate($payment->payment_datetime) ?></h5>
                            </div><!--.col-md-6-->
                    </div><!--.row-->

            </div><!--.invoice-heading-->
            <div class="invoice-body">
                    <table class="table">
                            <thead>
                                    <tr>
                                            <th class="<?= $this->params['isArabic']?'text-right':'text-left' ?>"><?= Yii::t("frontend", "Product") ?></th>
                                            <th class="<?= $this->params['isArabic']?'text-left':'text-right' ?>"><?= Yii::t("frontend", "Quantity") ?></th>
                                            <th class="<?= $this->params['isArabic']?'text-left':'text-right' ?>"><?= Yii::t("frontend", "Cost") ?></th>
                                            <th class="<?= $this->params['isArabic']?'text-left':'text-right' ?>"><?= Yii::t("frontend", "Total") ?></th>
                                    </tr>
                            </thead>
                            <tbody>
                                    <tr>
                                            <td>
                                                Job Posting                                                                                                
                                            </td>
                                            <td class="<?= $this->params['isArabic']?'text-left':'text-right' ?>">10</td>
                                            <td class="<?= $this->params['isArabic']?'text-left':'text-right' ?>">0.750</td>
                                            <td class="<?= $this->params['isArabic']?'text-left':'text-right' ?>">7.500</td>
                                    </tr>
                                    <tr>
                                            <td>
                                                Premium Filter (X2)
                                                <small></small>
                                            </td>
                                            <td class="<?= $this->params['isArabic']?'text-left':'text-right' ?>">10</td>
                                            <td class="<?= $this->params['isArabic']?'text-left':'text-right' ?>">0.500</td>
                                            <td class="<?= $this->params['isArabic']?'text-left':'text-right' ?>">5.000</td>
                                    </tr>										
                                    <tr>
                                            <td colspan="2"></td>
                                            <td class="<?= $this->params['isArabic']?'text-left':'text-right' ?>"><strong><?= Yii::t("frontend", "Sub Total") ?></strong></td>
                                            <td class="<?= $this->params['isArabic']?'text-left':'text-right' ?>">12.500</td>
                                    </tr>
                                    <tr>
                                            <td colspan="2"></td>
                                            <td class="<?= $this->params['isArabic']?'text-left':'text-right' ?>"><strong><?= Yii::t("frontend", "Credit Discount") ?></strong></td>
                                            <td class="<?= $this->params['isArabic']?'text-left':'text-right' ?>">6.000</td>
                                    </tr>
                                    <tr>
                                            <td colspan="2"></td>
                                            <td class="<?= $this->params['isArabic']?'text-left':'text-right' ?> active"><strong><?= Yii::t("frontend", "Grand Total") ?></strong></td>
                                            <td class="<?= $this->params['isArabic']?'text-left':'text-right' ?> active">6.500</td>
                                    </tr>                                                                                
                            </tbody>
                    </table>
            </div><!--.invoice-body-->
            <div class="invoice-footer"></div><!--.invoice-footer-->
        </div>

    </div>

</div>