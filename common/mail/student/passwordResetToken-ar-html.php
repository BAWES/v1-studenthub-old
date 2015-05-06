<?php
use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $student common\models\Student */

$resetLink = Yii::$app->urlManager->createAbsoluteUrl(['site/reset-password', 'token' => $student->student_password_reset_token]);
?>

<tr>
    <td>
        <h1>أهلا <?= $student->student_firstname ?>,</h1>
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