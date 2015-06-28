<?php
/* @var $this yii\web\View */
/* @var $student common\models\Student */

?>
<tr>
    <td>
        <h1>New Student has signed up</h1>
        <p class="lead">
            Student Name: <?= $student->student_firstname ?> <?= $student->student_lastname ?> <br/>
            Student Phone: <?= $student->student_contact_number ?> <br/>
            Student Email: <?= $student->student_email ?> <br/>
            
            <br/>
            
            Language Preference: <?= $student->student_language_pref ?> <br/>
            ID Verification: <?= $student->idVerificationStatus ?> <br/>
        </p>
    </td>
    <td class="expander"></td>
</tr>