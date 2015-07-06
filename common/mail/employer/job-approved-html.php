<?php
use yii\helpers\Url;

/* @var $this yii\web\View */
/* @var $employer common\models\Employer */
/* @var $job common\models\Job */

$shareUrl = Yii::$app->urlManagerFrontend->createAbsoluteUrl(['job/share', 'id' => $job->job_id]);
?>
<tr>
    <td>
        <h1>Hello <?= $employer->employer_contact_firstname ?>,</h1>
        <p class="lead">
            We have just gone ahead and approved your listing for "<?= $job->job_title ?>".
        </p>
        <p>
            Here is a link you can promote on your social networks:<br/>
            <a href="<?= $shareUrl ?>">
                <?= $shareUrl ?>
            </a>
        </p>
        <p>
            Feel free to email us at any time if you have any questions, and we look forward to getting you some fantastic applicants!
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
                        <a href="<?= $shareUrl ?>">Share your Job</a>
                    </td>
                </tr>
            </tbody>
        </table>
    </td>
    <td class="expander"></td>
</tr>