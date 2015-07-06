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
            We have closed your job listing for "<?= $job->job_title ?>".
        </p>
        <p>
            Please let us know if you feel this is a mistake.
        </p>
        <p>
            Regards,<br/>
            StudentHub Team
        </p>
    </td>
    <td class="expander"></td>
</tr>