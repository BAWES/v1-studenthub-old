<?php
/* @var $this yii\web\View */
/* @var $student common\models\Student */

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

<tr>
    <td>
        <br />
        
        <p class="lead">Use token in app to verify email</p>

        <table class="button success">
            <tbody>
                <tr>
                    <td>                        
                        Token : <?= $student->student_auth_key ?>
                    </td>
                </tr>
            </tbody>
        </table>

        <br />
        <br />
    </td>
    <td class="expander"></td>
    
</tr>