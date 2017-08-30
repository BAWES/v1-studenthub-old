<?php
/* @var $this yii\web\View */
/* @var $student common\models\Student */

$verificationUrl = Yii::$app->urlManagerFrontend->createAbsoluteUrl(['register/email-verify', 'code' => $student->student_auth_key, 'verify' => $student->student_id]);
?>
<tr>
    <td>
        <h1>أهلا <?= $student->student_firstname ?></h1>
        <p class="lead">Thanks for joining <strong>StudentHub</strong>.<br/>
            الرجاء الضغط على الرابط التالي للتحقق من بريدك الالكتروني</p>
    </td>
    <td class="expander"></td>
</tr>
<tr>
    <td>
        <table class="button success">
            <tbody>
                <tr>
                    <td>
                        <a href="<?= $verificationUrl ?>">تحقق من البريد الإلكتروني</a>
                    </td>
                </tr>
            </tbody>
        </table>
    </td>
    <td class="expander"></td>
</tr>