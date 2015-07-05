<?php
use yii\helpers\Url;

/* @var $this yii\web\View */
/* @var $employer common\models\Employer */
/* @var $job common\models\Job */

$shareUrl = Url::to(['job/share', 'id' => $job->job_id], true);
?>
<tr>
    <td>
        <h1>Hello <?= $employer->employer_contact_firstname ?>,</h1>
        <p class="lead">
            We're excited to let you know that you just received your first applicant (of what we hope will be many).
        </p>
        <p>
            You can view that applicant by logging into the employer portal.
        </p>
        <p>
            Want to get more applicants? We recommend sharing your job on social media platforms to attract more applicants
        </p>
        <p>
            Moving forward, you’ll get a recap email when you receive applicants (based on your notification preferences). 
            Keep your eye on those emails, and don’t forget to contact students right after they apply, 
            <strong>before they get hired by someone else ;)</strong>
        </p>
        <p>
            In the meantime, let us know if you have any questions.<br/>
            Hope you find this helpful. Good luck!
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