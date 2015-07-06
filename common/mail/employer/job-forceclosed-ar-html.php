<?php
use yii\helpers\Url;

/* @var $this yii\web\View */
/* @var $employer common\models\Employer */
/* @var $job common\models\Job */

?>
<tr>
    <td>
        <h1>مرحبا <?= $employer->employer_contact_firstname ?></h1>
        <p class="lead">
            لقد تم إغلاق فرصة عملك بعنوان <br/>
            <?= $job->job_title ?>
        </p>
        <p>
            يرجى الاتصال بنا إذا كنت تشعر أن هذا خطأ
        </p>
        <p>
            مع تحيات
            <br/>
            StudentHub فريق
        </p>
    </td>
    <td class="expander"></td>
</tr>