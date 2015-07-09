<?php

/* @var $this yii\web\View */
/* @var $employer common\models\Employer */
/* @var $notifications array */

?>
<tr>
    <td>
        <h1>Hello <?= $employer->employer_contact_firstname ?>,</h1>
        <p class="lead">
            We're excited to let you know that you received <?= count($notifications) ?> new applicants.
            Log in to your account to review each applicant.
        </p>
        <?php 
        $jobs = [];
        foreach($notifications as $notification){
            $jobTitle = $notification->job->job_title;
            $jobs[$jobTitle][] = $notification;
        } 
        ?>
                
        <?php foreach($jobs as $jobTitle => $notifs){ ?>
        <strong><?= $jobTitle ?> - <?= count($notifs) ?></strong>
        <ul>
            <?php foreach($notifs as $notif){ ?>
            <li>
                <?= $notif->student->student_firstname ?> <?= $notif->student->student_lastname ?>
            </li>
            <?php } ?>
        </ul>
        
        <?php } ?>
        
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
                        <a href="<?= Yii::$app->urlManagerEmployer->createAbsoluteUrl(['dashboard/index']) ?>">View Applicants</a>
                    </td>
                </tr>
            </tbody>
        </table>
    </td>
    <td class="expander"></td>
</tr>