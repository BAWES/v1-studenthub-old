<?php
use yii\helpers\Url;

/* @var $this yii\web\View */
/* @var $employer common\models\Employer */
/* @var $job common\models\Job */
?>
<tr>
    <td>
        <h1>Hello <?= $employer->employer_contact_firstname ?>,</h1>
        <p class="lead">
            We're so excited to tell you that your listing titled "<?= $job->job_title ?>" has been filled, as you've received all <?= $job->job_max_applicants ?> applicants you've requested!
        </p>
        <p>
            Sadly, though, that means your listing will no longer be shown to students.
        </p>
        <p>
            Want more applicants? Not a problem! Just log in and create a new job listing.
        </p>
        <p>
            Regards,<br/>
            StudentHub Team
        </p>
    </td>
    <td class="expander"></td>
</tr>
