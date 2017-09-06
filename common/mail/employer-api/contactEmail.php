<tr>
    <td>
        <h1>Hi, Admin</h1>
        <p class="lead">Please find contact mail from employer</p>
    </td>
    <td class="expander"></td>
</tr>
<tr>
    <td>
        <table class="button success">
            <tbody>
                <tr><td>Subject :</td><td><?=$contact->subject?></td></tr>
                <tr><td>Message :</td><td><?=$contact->message?></td></tr>
                <tr><td>Employee Name :</td>
                    <td>
                        <?=$model->employer_contact_firstname; ?>
                        <?=$model->employer_contact_lastname; ?>
                    </td>
                </tr>
                <tr><td>Employee Email :</td><td><?=$model->employer_email; ?></td></tr>
                <tr><td>Employee ID :</td><td><?=$model->employer_id; ?></td></tr>
            </tbody>
        </table>
    </td>
    <td class="expander"></td>
</tr>