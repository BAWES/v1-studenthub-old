<?php
/* @var $this yii\web\View */
/* @var $employer common\models\Employer */
/* @var $payment common\models\Payment */
?>
<tr>
    <td>
        <h1>Hi, <?= $employer->employer_contact_firstname ?></h1>
        <p class="lead">Thanks for being a part of <strong>StudentHub</strong>.</p>
        <p>Invoice #<?= $payment->payment_id ?> <br/> <?= Yii::$app->formatter->asDate($payment->payment_datetime) ?></p>
        <p>
            <?= $payment->payment_note?Yii::$app->formatter->asNtext($payment->payment_note):"" ?>
        </p>
    </td>
    <td class="expander"></td>
</tr>

<tr>
    <td>
        <table class="twelve columns">
            <tbody>
                <tr>
                    <td class="panel">

                        <table class="thead">
                            <tbody><tr>
                                    <td class="six">Item</td>
                                    <td class="three" style="text-align:right;">Quantity</td>
                                    <td class="three" style="text-align:right;">Total</td>
                                    <td class="expander"></td>
                                </tr>
                            </tbody>
                        </table>
                        <table class="padded">
                            <tbody><tr>
                                    <td class="six">
                                        Job Posting
                                    </td>
                                    <td class="three" style="text-align:right;">
                                        <?= Yii::$app->formatter->asInteger($payment->payment_job_num_applicants) ?>
                                    </td>
                                    <td class="three" style="text-align:right;">
                                        <?= Yii::$app->formatter->asDecimal($payment->payment_job_num_applicants*$payment->payment_job_initial_price_per_applicant, 3) ?> KD
                                    </td>
                                    <td class="expander"></td>
                                </tr>
                            </tbody>
                        </table>
                        
                        <?php if($payment->payment_job_num_filters > 0){ ?>
                        <table class="padded">
                            <tbody><tr>
                                    <td class="six">
                                        Premium Filters (<?= $payment->payment_job_num_filters ?>)
                                    </td>
                                    <td class="three" style="text-align:right;">
                                        <?= Yii::$app->formatter->asInteger($payment->payment_job_num_applicants) ?>
                                    </td>
                                    <td class="three" style="text-align:right;">
                                        <?= Yii::$app->formatter->asDecimal($payment->payment_job_num_applicants*($payment->payment_job_filter_price_per_applicant*$payment->payment_job_num_filters), 3) ?> KD
                                    </td>
                                    <td class="expander"></td>
                                </tr>
                            </tbody>
                        </table>
                        <?php } ?>
                        
                        <table class="padded">
                            <tbody><tr>
                                    <td class="six"></td>
                                    <td class="three" style="text-align:right;">
                                        Sub Total
                                    </td>
                                    <td class="three" style="text-align:right;">
                                        <?= Yii::$app->formatter->asDecimal($payment->payment_job_total_price_per_applicant*$payment->payment_job_num_applicants, 3) ?> KD
                                    </td>
                                    <td class="expander"></td>
                                </tr>
                            </tbody>
                        </table>
                        
                        <table class="padded">
                            <tbody><tr>
                                    <td class="six"></td>
                                    <td class="three" style="text-align:right;">
                                        Credit Discount
                                    </td>
                                    <td class="three" style="text-align:right;">
                                        <?= $payment->payment_employer_credit_change?Yii::$app->formatter->asDecimal($payment->payment_employer_credit_change, 3):Yii::$app->formatter->asDecimal(0, 3); ?> KD
                                    </td>
                                    <td class="expander"></td>
                                </tr>
                            </tbody>
                        </table>
                        
                        <table class="padded">
                            <tbody><tr>
                                    <td class="six"></td>
                                    <td class="three" style="text-align:right;">
                                        <b>Grand Total</b>
                                    </td>
                                    <td class="three" style="text-align:right;">
                                        <b>
                                            <?= $payment->payment_total?Yii::$app->formatter->asDecimal($payment->payment_total, 3):Yii::$app->formatter->asDecimal(0, 3); ?> KD
                                        </b>
                                    </td>
                                    <td class="expander"></td>
                                </tr>
                            </tbody>
                        </table>

                    </td>
                    <td class="expander"></td>
                </tr>
            </tbody>
        </table>
    </td>
    <td class="expander"></td>
</tr>

<tr>
    <td>
        <p style="margin-bottom:0;">
            <b>Credit Before</b> <?= $payment->payment_employer_credit_before ? Yii::$app->formatter->asDecimal($payment->payment_employer_credit_before, 3) : Yii::$app->formatter->asDecimal(0, 3); ?> KD
        </p>
        <p style="margin-top:0;">
            <b>Credit After</b> <?= $payment->payment_employer_credit_after ? Yii::$app->formatter->asDecimal($payment->payment_employer_credit_after, 3) : Yii::$app->formatter->asDecimal(0, 3); ?> KD
        </p>
    </td>
    <td class="expander"></td>
</tr>