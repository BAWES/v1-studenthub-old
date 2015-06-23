<?php
/* @var $this yii\web\View */
/* @var $employer common\models\Employer */
/* @var $payment common\models\Payment */
?>
<tr>
    <td>
        <h1>Hi, <?= $employer->employer_contact_firstname ?></h1>
        <p class="lead">Thanks for being a part of <strong>StudentHub</strong>.</p>
        <p>The following is your recent invoice.</p>
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
                                    <td class="six">Hippy Sunglasses</td>
                                    <td class="three" style="text-align:right;">1</td>
                                    <td class="three" style="text-align:right;">$99</td>
                                    <td class="expander"></td>
                                </tr>
                            </tbody>
                        </table>
                        <table class="padded">
                            <tbody><tr>
                                    <td class="six">Beard Oil</td>
                                    <td class="three" style="text-align:right;">2</td>
                                    <td class="three" style="text-align:right;">$50</td>
                                    <td class="expander"></td>
                                </tr>
                            </tbody>
                        </table>
                        <table class="padded">
                            <tbody><tr>
                                    <td class="six">Trouser straps</td>
                                    <td class="three" style="text-align:right;">5</td>
                                    <td class="three" style="text-align:right;">$40</td>
                                    <td class="expander"></td>
                                </tr>
                            </tbody>
                        </table>
                        <table class="padded">
                            <tbody><tr>
                                    <td class="six"></td>
                                    <td class="three" style="text-align:right;">Total</td>
                                    <td class="three" style="text-align:right;">$189</td>
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