<?php

/* @var $this yii\web\View */
/* @var $student common\models\Student */

$loginUrl = Yii::$app->urlManagerFrontend->createAbsoluteUrl(['job/index']);
?>
<tr>
    <td>
        <h1>مرحبا <?= $student->student_firstname ?></h1>
        <p class="lead">
            لقد تحققنا من هوية الطالب الخاصة بك
        </p>
        <p>
            لا تتردد في مراسلتنا عبر البريد الإلكتروني في أي وقت إذا كان لديك أي أسئلة، ونحن نتطلع إلى مساعدتكم في بناء مستقبل أفضل
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
                        <a href="<?= $loginUrl ?>">تصفح الوظائف</a>
                    </td>
                </tr>
            </tbody>
        </table>
    </td>
    <td class="expander"></td>
</tr>