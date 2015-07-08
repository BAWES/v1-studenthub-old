<?php

/* @var $this yii\web\View */
/* @var $student common\models\Student */
/* @var $notifications array */

?>
<tr>
    <td>
        <h1>Hello <?= $student->student_firstname ?>,</h1>
        <p class="lead">
            We have just gone ahead and verified your student identity.
        </p>
        <p>
            Feel free to email us at any time if you have any questions, and we look forward to assisting you in building a better future!
        </p>
        <p>
            Regards,<br/>
            StudentHub Team
        </p>
    </td>
    <td class="expander"></td>
</tr>

<tr>
    <td>
        <table class="button success">
            <tbody>
                <tr>
                    <td>
                        <a href="<?= Yii::$app->urlManager->createAbsoluteUrl(['job/index']) ?>">Browse Jobs</a>
                    </td>
                </tr>
            </tbody>
        </table>
    </td>
    <td class="expander"></td>
</tr>