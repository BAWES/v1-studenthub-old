<?php

/* @var $this yii\web\View */
/* @var $student common\models\Student */
/* @var $notifications array */

?>
<tr>
    <td>
        <h1>مرحبا <?= $student->student_firstname ?></h1>
        <p class="lead">
            لدينا <?= count($notifications) ?> فرص العمل جديدة انت مؤهلا للحصول عليها
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
                        <a href="<?= Yii::$app->urlManager->createAbsoluteUrl(['job/index']) ?>">قدم على وظائف</a>
                    </td>
                </tr>
            </tbody>
        </table>
    </td>
    <td class="expander"></td>
</tr>