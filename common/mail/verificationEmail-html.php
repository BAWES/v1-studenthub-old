<?php
/* @var $this yii\web\View */
/* @var $student common\models\Student */

$verificationUrl = Yii::$app->urlManager->createAbsoluteUrl(['register/email-verify', 'code' => $student->student_auth_key]);
?>
<tr>
    <td>
        <h1>Hi, <?= $student->student_firstname ?></h1>
        <p class="lead">Thanks for joining <strong>StudentHub</strong>. Please click the following link to verify your email.</p>
    </td>
    <td class="expander"></td>
</tr>
<tr>
    <td>
        <table class="button success">
            <tbody>
                <tr>
                    <td>
                        <a href="<?= $verificationUrl ?>">Verify Email</a>
                    </td>
                </tr>
            </tbody>
        </table>
    </td>
    <td class="expander"></td>
</tr>