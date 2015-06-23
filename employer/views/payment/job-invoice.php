<?php
use yii\helpers\Url;
use common\models\PaymentType;

/* @var $this yii\web\View */
/* @var $payment common\models\Payment */

$this->title = Yii::t("employer", 'Invoice #{invoiceNum, number}', ['invoiceNum' => $payment->payment_id]);
$this->params['breadcrumbs'][] = ['label' => Yii::t("employer", 'Payment History'), 'url' => ['index']];
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
                                    <h4><?= $this->title ?></h4>
                                    <h5><?= Yii::$app->formatter->asDate($payment->payment_datetime) ?></h5>
                                    <p>
                                        <?= $payment->payment_note?Yii::$app->formatter->asNtext($payment->payment_note):"" ?>
                                    </p>
                            </div><!--.col-md-6-->
                    </div><!--.row-->

            </div><!--.invoice-heading-->
            <div class="invoice-body">
                    <table class="table">
                            <thead>
                                    <tr>
                                            <th class="<?= $this->params['isArabic']?'text-right':'text-left' ?>"><?= Yii::t("frontend", "Item") ?></th>
                                            <th class="<?= $this->params['isArabic']?'text-left':'text-right' ?>"><?= Yii::t("frontend", "Quantity") ?></th>
                                            <th class="<?= $this->params['isArabic']?'text-left':'text-right' ?>"><?= Yii::t("frontend", "Cost") ?></th>
                                            <th class="<?= $this->params['isArabic']?'text-left':'text-right' ?>"><?= Yii::t("frontend", "Total") ?></th>
                                    </tr>
                            </thead>
                            <tbody>
                                    <tr>
                                            <td>
                                                <?= Yii::t("frontend", "Job Posting") ?>
                                            </td>
                                            <td class="<?= $this->params['isArabic']?'text-left':'text-right' ?>">
                                                <?= Yii::$app->formatter->asInteger($payment->payment_job_num_applicants) ?>
                                            </td>
                                            <td class="<?= $this->params['isArabic']?'text-left':'text-right' ?>">
                                                <?= Yii::$app->formatter->asDecimal($payment->payment_job_initial_price_per_applicant, 3) ?> 
                                                <?= Yii::t("employer", "KD") ?>
                                            </td>
                                            <td class="<?= $this->params['isArabic']?'text-left':'text-right' ?>">
                                                <?= Yii::$app->formatter->asDecimal($payment->payment_job_num_applicants*$payment->payment_job_initial_price_per_applicant, 3) ?> 
                                                <?= Yii::t("employer", "KD") ?>
                                            </td>
                                    </tr>
                                    
                                    <?php if($payment->payment_job_num_filters > 0){ ?>
                                    <tr>
                                            <td>
                                                <?= Yii::t("frontend", "Premium Filters ({0})", $payment->payment_job_num_filters) ?>
                                            </td>
                                            <td class="<?= $this->params['isArabic']?'text-left':'text-right' ?>">
                                                <?= Yii::$app->formatter->asInteger($payment->payment_job_num_applicants) ?>
                                            </td>
                                            <td class="<?= $this->params['isArabic']?'text-left':'text-right' ?>">
                                                <?= Yii::$app->formatter->asDecimal($payment->payment_job_filter_price_per_applicant*$payment->payment_job_num_filters, 3) ?> 
                                                <?= Yii::t("employer", "KD") ?>
                                            </td>
                                            <td class="<?= $this->params['isArabic']?'text-left':'text-right' ?>">
                                                <?= Yii::$app->formatter->asDecimal($payment->payment_job_num_applicants*($payment->payment_job_filter_price_per_applicant*$payment->payment_job_num_filters), 3) ?> 
                                                <?= Yii::t("employer", "KD") ?>
                                            </td>
                                    </tr>
                                    <?php } ?>
                                    <tr>
                                            <td colspan="2"></td>
                                            <td class="<?= $this->params['isArabic']?'text-left':'text-right' ?>"><strong><?= Yii::t("frontend", "Sub Total") ?></strong></td>
                                            <td class="<?= $this->params['isArabic']?'text-left':'text-right' ?>">
                                                <?= Yii::$app->formatter->asDecimal($payment->payment_job_total_price_per_applicant*$payment->payment_job_num_applicants, 3) ?> 
                                                <?= Yii::t("employer", "KD") ?>
                                            </td>
                                    </tr>
                                    <tr>
                                            <td colspan="2"></td>
                                            <td class="<?= $this->params['isArabic']?'text-left':'text-right' ?>"><strong><?= Yii::t("frontend", "Credit Discount") ?></strong></td>
                                            <td class="<?= $this->params['isArabic']?'text-left':'text-right' ?>">
                                                <?= $payment->payment_employer_credit_change?Yii::$app->formatter->asDecimal($payment->payment_employer_credit_change, 3):Yii::$app->formatter->asDecimal(0, 3); ?> 
                                                <?= Yii::t("employer", "KD") ?>
                                            </td>
                                    </tr>
                                    <tr>
                                            <td colspan="2"></td>
                                            <td class="<?= $this->params['isArabic']?'text-left':'text-right' ?> active"><strong><?= Yii::t("frontend", "Grand Total") ?></strong></td>
                                            <td class="<?= $this->params['isArabic']?'text-left':'text-right' ?> active">
                                                <?= $payment->payment_total?Yii::$app->formatter->asDecimal($payment->payment_total, 3):Yii::$app->formatter->asDecimal(0, 3); ?> 
                                                <?= Yii::t("employer", "KD") ?>
                                            </td>
                                    </tr>                                                                                
                            </tbody>
                    </table>
                
                <div class="row">
                    <div class="col-sm-6 col-sm-offset-6 col-md-5 col-md-offset-7">
                        <div style="margin-bottom:0; margin-top:2em" class="alert alert-primary" role="alert"><strong><?= Yii::t("frontend", "Credit Before") ?></strong> 
                            <?= $payment->payment_employer_credit_before ? Yii::$app->formatter->asDecimal($payment->payment_employer_credit_before, 3) : Yii::$app->formatter->asDecimal(0, 3); ?> 
                            <?= Yii::t("employer", "KD") ?>
                        </div>
                        <div class="alert alert-success" role="alert"><strong><?= Yii::t("frontend", "Credit After") ?></strong> 
                            <?= $payment->payment_employer_credit_after ? Yii::$app->formatter->asDecimal($payment->payment_employer_credit_after, 3) : Yii::$app->formatter->asDecimal(0, 3); ?> 
                            <?= Yii::t("employer", "KD") ?>
                        </div>
                    </div>
                </div>
            </div><!--.invoice-body-->
            <div class="invoice-footer"></div><!--.invoice-footer-->
        </div>

    </div>

</div>