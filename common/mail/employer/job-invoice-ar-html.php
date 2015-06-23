<?php
/* @var $this yii\web\View */
/* @var $employer common\models\Employer */
/* @var $payment common\models\Payment */
?>
<tr>
    <td>
        <h1>أهلا <?= $employer->employer_contact_firstname ?></h1>
        <p class="lead">شكرا لك على المشاركة على موقعنا</p>
        <p>الفاتورة #<?= Yii::$app->formatter->asInteger($payment->payment_id) ?> <br/> <?= Yii::$app->formatter->asDate($payment->payment_datetime) ?></p>
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
                                    <td class="three" style="text-align:left;">المجموع</td>
                                    <td class="three" style="text-align:left;">الكمية</td>
                                    <td class="six" style="text-align:right;">المنتج</td>
                                    <td class="expander"></td>
                                </tr>
                            </tbody>
                        </table>
                        <table class="padded">
                            <tbody>
                                <tr>
                                    <td class="three" style="text-align:left;">
                                        <?= Yii::$app->formatter->asDecimal($payment->payment_job_num_applicants*$payment->payment_job_initial_price_per_applicant, 3) ?> د.ك.‏
                                    </td>
                                    
                                    <td class="three" style="text-align:left;">
                                        <?= Yii::$app->formatter->asInteger($payment->payment_job_num_applicants) ?>
                                    </td>
                                    
                                    <td class="six"  style="text-align:right;">
                                        عرض عمل
                                    </td>
                                    <td class="expander"></td>
                                </tr>
                            </tbody>
                        </table>
                        
                        <?php if($payment->payment_job_num_filters > 0){ ?>
                        <table class="padded">
                            <tbody>
                                <tr>
                                    <td class="three" style="text-align:left;">
                                        <?= Yii::$app->formatter->asDecimal($payment->payment_job_num_applicants*($payment->payment_job_filter_price_per_applicant*$payment->payment_job_num_filters), 3) ?> د.ك.‏
                                    </td>
                                    <td class="three" style="text-align:left;">
                                        <?= Yii::$app->formatter->asInteger($payment->payment_job_num_applicants) ?>
                                    </td>
                                    <td class="six"  style="text-align:right;">
                                        فلاتر متميزة  *<?= $payment->payment_job_num_filters ?>
                                    </td>
                                    <td class="expander"></td>
                                </tr>
                            </tbody>
                        </table>
                        <?php } ?>
                        
                        <table class="padded">
                            <tbody><tr>
                                    <td class="three" style="text-align:left;">
                                        <?= Yii::$app->formatter->asDecimal($payment->payment_job_total_price_per_applicant*$payment->payment_job_num_applicants, 3) ?> د.ك.‏
                                    </td>
                                    <td class="three" style="text-align:left;">
                                        حاصل الجمع
                                    </td>
                                    <td class="six" style="text-align:right;"></td>
                                    <td class="expander"></td>
                                </tr>
                            </tbody>
                        </table>
                        
                        <table class="padded">
                            <tbody>
                                <tr>
                                    <td class="three" style="text-align:left;">
                                        <?= $payment->payment_employer_credit_change?Yii::$app->formatter->asDecimal($payment->payment_employer_credit_change, 3):Yii::$app->formatter->asDecimal(0, 3); ?> د.ك.‏
                                    </td>
                                    <td class="three" style="text-align:left;">
                                        خصم رصيد
                                    </td>
                                    <td class="six" style="text-align:right;"></td>
                                    <td class="expander"></td>
                                </tr>
                            </tbody>
                        </table>
                        
                        <table class="padded">
                            <tbody>
                                <tr>
                                    <td class="three" style="text-align:left;">
                                        <b>
                                            <?= $payment->payment_total?Yii::$app->formatter->asDecimal($payment->payment_total, 3):Yii::$app->formatter->asDecimal(0, 3); ?> د.ك.‏
                                        </b>
                                    </td>
                                    <td class="three" style="text-align:left;">
                                        <b>المجموع الإجمالي</b>
                                    </td>
                                    <td class="six" style="text-align:right;"></td>
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
            <b>الرصيد قبل</b> <?= $payment->payment_employer_credit_before ? Yii::$app->formatter->asDecimal($payment->payment_employer_credit_before, 3) : Yii::$app->formatter->asDecimal(0, 3); ?> د.ك.‏
        </p>
        <p style="margin-top:0;">
            <b>الرصيد بعد</b> <?= $payment->payment_employer_credit_after ? Yii::$app->formatter->asDecimal($payment->payment_employer_credit_after, 3) : Yii::$app->formatter->asDecimal(0, 3); ?> د.ك.‏
        </p>
    </td>
    <td class="expander"></td>
</tr>