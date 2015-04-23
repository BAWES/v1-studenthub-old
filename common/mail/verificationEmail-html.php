<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $student common\models\Student */

$resetLink = "linkhere"; //Yii::$app->urlManager->createAbsoluteUrl(['site/reset-password', 'token' => $admin->admin_password_reset_token]);
?>
<tr>
    <td>
        <h1>Hi, Khalid Al-Mutawa</h1>
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
                        <a href="#">Verify Email</a>
                    </td>
                </tr>
            </tbody>
        </table>
        <br/>
        If the button does not work, try the following link:<br/>
        <a href="#">http://</a>
    </td>
    <td class="expander"></td>
</tr>