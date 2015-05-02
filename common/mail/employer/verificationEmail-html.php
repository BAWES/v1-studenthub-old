<?php
/* @var $this yii\web\View */
/* @var $employer common\models\Employer */

$verificationUrl = Yii::$app->urlManager->createAbsoluteUrl(['register/email-verify', 'code' => $employer->employer_auth_key, 'verify' => $employer->employer_id]);
?>
<tr>
    <td>
        <h1>Hi, <?= $employer->employer_contact_firstname ?></h1>
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