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
            وظيفتك اكتمل عددها، وكنت قد تلقيت على
            <?= $job->job_max_applicants ?> متقدم الذي طلبتهم
        </p>
        <p>
            هذا يعني أنه سيتم إزالة فرصة عملك من القائمة التي يتم عرضها للطلاب
        </p>
        <p>
            تريد المزيد من المتقدمين؟ إذهب على موقعنا ثم قم بإنشاء فرصة عمل جديدة
        </p>
        <p>
            مع تحيات
            <br/>
            StudentHub فريق
        </p>
    </td>
    <td class="expander"></td>
</tr>