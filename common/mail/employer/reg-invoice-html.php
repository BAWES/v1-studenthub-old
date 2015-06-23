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
                                    <td class="six">Items</td>
                                    <td class="three" style="text-align:right;">No. of packs</td>
                                    <td class="three" style="text-align:right;">Amount</td>
                                    <td class="expander"></td>
                                </tr>
                            </tbody></table>
                        <table class="padded">
                            <tbody><tr>
                                    <td class="six">Hippy Sunglasses</td>
                                    <td class="three" style="text-align:right;">1</td>
                                    <td class="three" style="text-align:right;">$99</td>
                                    <td class="expander"></td>
                                </tr>
                            </tbody></table>
                        <table class="padded">
                            <tbody><tr>
                                    <td class="six">Beard Oil</td>
                                    <td class="three" style="text-align:right;">2</td>
                                    <td class="three" style="text-align:right;">$50</td>
                                    <td class="expander"></td>
                                </tr>
                            </tbody></table>
                        <table class="padded">
                            <tbody><tr>
                                    <td class="six">Trouser straps</td>
                                    <td class="three" style="text-align:right;">5</td>
                                    <td class="three" style="text-align:right;">$40</td>
                                    <td class="expander"></td>
                                </tr>
                            </tbody></table>
                        <table class="padded">
                            <tbody><tr>
                                    <td class="six"></td>
                                    <td class="three" style="text-align:right;">Total</td>
                                    <td class="three" style="text-align:right;">$189</td>
                                    <td class="expander"></td>
                                </tr>
                            </tbody></table>

                    </td>
                    <td class="expander"></td>
                </tr>
            </tbody>
        </table>
    </td>
    <td class="expander"></td>
</tr>