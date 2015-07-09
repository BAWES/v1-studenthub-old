<?php

/* @var $this yii\web\View */
/* @var $employer common\models\Employer */
/* @var $notifications array */

?>
<tr>
    <td>
        <h1>مرحبا <?= $employer->employer_contact_firstname ?></h1>
        <p class="lead">
            لقد تلقيت <?= count($notifications) ?> متقدمين جدد. يرجى تسجيل الدخول لمراجعة معلومات كل طالب.
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
        <ul style="direction:rtl;">
            <?php foreach($notifs as $notif){ ?>
            <li>
                <?= $notif->student->student_firstname ?> <?= $notif->student->student_lastname ?>
            </li>
            <?php } ?>
        </ul>
        
        <?php } ?>
        
        <p>
            مع تحيات
            <br/>
            StudentHub فريق
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
                        <a href="<?= Yii::$app->urlManagerEmployer->createAbsoluteUrl(['dashboard/index']) ?>">عرض المتقدمين</a>
                    </td>
                </tr>
            </tbody>
        </table>
    </td>
    <td class="expander"></td>
</tr>