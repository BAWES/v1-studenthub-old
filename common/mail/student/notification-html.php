<?php

/* @var $this yii\web\View */
/* @var $student common\models\Student */
/* @var $notifications array */

?>
<tr>
    <td>
        <h1>Hello <?= $student->student_firstname ?>,</h1>
        <p class="lead">
            We're excited to let you know that we have <?= count($notifications) ?> new job listings that you qualify for.
        </p>
        <ul>
            <?php foreach($notifications as $notification){ 
                $job = $notification->job;
                $employer = $job->employer;
                ?>
            <li>
                <?= $job->job_title ?> @ <?= $employer->employer_company_name ?>
            </li>
            <?php } ?>
        </ul>
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
                        <a href="<?= Yii::$app->urlManager->createAbsoluteUrl(['job/index']) ?>">Apply for Jobs</a>
                    </td>
                </tr>
            </tbody>
        </table>
    </td>
    <td class="expander"></td>
</tr>