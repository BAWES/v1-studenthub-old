<?php
use yii\helpers\Url;

/* @var $this yii\web\View */
/* @var $employer common\models\Employer */
/* @var $job common\models\Job */

$shareUrl = Url::to(['job/share', 'id' => $job->job_id], true);
?>
<tr>
    <td>
        <h1>مرحبا <?= $employer->employer_contact_firstname ?>،</h1>
        <p class="lead">
            لقد تلقيت للتو المتقدم الأول للحصول على وظيفة - ما نأمل أن تكون أكثر في المستقبل
        </p>
        <p>
            يمكنك عرض هذا المتقدم عن طريق الدخول الى بوابة صاحب العمل
        </p>
        <p>
            ترغب في الحصول على المزيد من المتقدمين؟ ننصحك بأن تشارك عرض عملك على منصات وسائل الإعلام الاجتماعية لجذب المزيد من المتقدمين
        </p>
        <p>
            ستحصل على البريد الإلكتروني باختصار عندما تتلقى المتقدمين (بناء على تفضيلات الإشعار).
            لا تنسى الاتصال بالطلاب بعد طلبهم للحصول على الوظيفة، <strong>قبل أن يوظف من قبل شخص آخر</strong>
        </p>
        <p>
            وفي الوقت نفسه، يرجى اعلامنا اذا كان لديكم أي أسئلة<br/>
            نأمل أن تجدوا هذه مفيدا. حظا سعيدا
        </p>
        <p>
            تحيات،<br/>
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
                        <a href="<?= $shareUrl ?>"> ضع وظيفتك على وسائل الاعلام الاجتماعية</a>
                    </td>
                </tr>
            </tbody>
        </table>
    </td>
    <td class="expander"></td>
</tr>