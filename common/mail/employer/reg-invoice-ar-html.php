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
                            <tbody>
                                <tr>
                                    <td class="six" style="text-align:left;">المجموع</td>
                                    <td class="six" style="text-align:right;">المنتج</td>
                                    <td class="expander"></td>
                                </tr>
                            </tbody>
                        </table>
                        <table class="padded">
                            <tbody>
                                <tr>
                                    <td class="six" style="text-align:left;">
                                        <?= $payment->payment_employer_credit_change ? Yii::$app->formatter->asDecimal($payment->payment_employer_credit_change, 3) : Yii::$app->formatter->asDecimal(0, 3); ?> د.ك.‏
                                    </td>
                                    <td class="six" style="text-align:right;">
                                        <?php if($payment->payment_type_id == \common\models\PaymentType::TYPE_KNET){ ?>
                                            شراء رصيد
                                        <?php }else{ ?>
                                            <?= $payment->paymentType->payment_type_name_ar ?>
                                        <?php } ?>
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
            <b>الرصيد قبل</b> <?= $payment->payment_employer_credit_before ? Yii::$app->formatter->asDecimal($payment->payment_employer_credit_before, 3) : Yii::$app->formatter->asDecimal(0, 3); ?> د.ك.‏
        </p>
        <p style="margin-top:0;">
            <b>الرصيد بعد</b> <?= $payment->payment_employer_credit_after ? Yii::$app->formatter->asDecimal($payment->payment_employer_credit_after, 3) : Yii::$app->formatter->asDecimal(0, 3); ?> د.ك.‏
        </p>
    </td>
    <td class="expander"></td>
</tr>