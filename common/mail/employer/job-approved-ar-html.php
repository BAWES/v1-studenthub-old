<?php
use yii\helpers\Url;

/* @var $this yii\web\View */
/* @var $employer common\models\Employer */
/* @var $job common\models\Job */

$shareUrl = Yii::$app->urlManagerFrontend->createAbsoluteUrl(['job/share', 'id' => $job->job_id]);
?>
<tr>
    <td>
        <h1>مرحبا <?= $employer->employer_contact_firstname ?></h1>
        <p class="lead">
            لقد قمنا بنشر وظيفتك
            <br/>
            <?= $job->job_title ?>
        </p>
        <p>
            وفيما يلي رابط يمكنك وضعه على الشبكات الاجتماعية الخاصة بك<br/>
            <a href="<?= $shareUrl ?>">
                <?= $shareUrl ?>
            </a>
        </p>
        <p>
            لا تتردد في مراسلتنا عبر البريد الإلكتروني في أي وقت إذا كان لديك أي أسئلة
        </p>
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
                        <a href="<?= $shareUrl ?>"> ضع وظيفتك على وسائل الاعلام الاجتماعية</a>
                    </td>
                </tr>
            </tbody>
        </table>
    </td>
    <td class="expander"></td>
</tr>