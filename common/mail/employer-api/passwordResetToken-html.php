<?php
use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $employer common\models\Employer */

$resetLink = Yii::$app->urlManagerEmployer->createAbsoluteUrl(['site/reset-password', 'token' => $employer->employer_password_reset_token]);
?>

<tr>
    <td>
        <h1>Hello <?= $employer->employer_contact_firstname ?>,</h1>
        <p class="lead">Follow the link below to reset your password</p>
    </td>
    <td class="expander"></td>
</tr>
<tr>
    <td>
        <table class="button success">
            <tbody>
                <tr>
                    <td>
                        <?= Html::a("Reset Password", $resetLink) ?>
                    </td>
                </tr>
            </tbody>
        </table>
    </td>
    <td class="expander"></td>
</tr>