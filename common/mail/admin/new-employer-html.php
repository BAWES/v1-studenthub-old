<?php
/* @var $this yii\web\View */
/* @var $employer common\models\Employer */

?>
<tr>
    <td>
        <h1>New Employer has signed up</h1>
        <p class="lead">
            Company Name: <?= $employer->employer_company_name ?> <br/>
            <br/>
            
            Contact Name: <?= $employer->employer_contact_firstname ?> <?= $employer->employer_contact_lastname ?> <br/>
            Contact Phone: <?= $employer->employer_contact_number ?> <br/>
            Contact Email: <?= $employer->employer_email ?> <br/>
            
            <br/>
            
            Language Preference: <?= $employer->employer_language_pref ?> <br/>
        </p>
    </td>
    <td class="expander"></td>
</tr>