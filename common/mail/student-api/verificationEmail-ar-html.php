<?php
/* @var $this yii\web\View */
/* @var $student common\models\Student */

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

<tr>
    <td>
        <br />
        
        <p class="lead">استخدام الرمز المميز في التطبيق للتحقق من البريد الإلكتروني</p>

        <table class="button success">
            <tbody>
                <tr>
                    <td>                        
                        الرمز المميز : <?= $student->student_auth_key ?>
                    </td>
                </tr>
            </tbody>
        </table>

        <br />
        <br />
    </td>
    <td class="expander"></td>
    
</tr>