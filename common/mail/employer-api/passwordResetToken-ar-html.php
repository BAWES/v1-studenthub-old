<?php
use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $employer common\models\Employer */

$resetLink = Yii::$app->urlManagerEmployer->createAbsoluteUrl(['site/reset-password', 'token' => $employer->employer_password_reset_token]);
?>

<tr>
    <td>
        <h1>أهلا <?= $employer->employer_contact_firstname ?>,</h1>
        <p class="lead">اتبع الرابط لإعادة تعيين كلمة المرور الخاصة بك</p>
    </td>
    <td class="expander"></td>
</tr>
<tr>
    <td>
        <table class="button success">
            <tbody>
                <tr>
                    <td>
                        <?= Html::a("إعادة تعيين كلمة المرور", $resetLink) ?>
                    </td>
                </tr>
            </tbody>
        </table>
    </td>
    <td class="expander"></td>
</tr>