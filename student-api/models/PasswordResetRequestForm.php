<?php
namespace studentapi\models;

use Yii;
use yii\base\Model;

/**
 * Password Reset Request Form 
 */
class PasswordResetRequestForm extends Model
{
    public $email;
    
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['email'], 'required'],
            [['email'], 'email'],
            [['email'], 'exist', 'skipOnError' => false, 'targetClass' => Staff::className(), 'targetAttribute' => ['email' => 'student_email']],
        ];
    }

    /**
     * Send password reset token to employer email
     *
     * @param common\models\Employer $employer
     */
    public function sendEmail($employer)
    {
        $employer->generatePasswordResetToken();
        $employer->save();

        Yii::$app->mailer->compose("passwordResetRequest",
            [
                "name" => $employer->employer_contact_firstname.' '.$employer_contact_lastname,
                "token" => $employer->employer_password_reset_token,
            ])
            ->setFrom(Yii::$app->params['supportEmail'])
            ->setTo($employer->employer_email)
            ->setSubject('Password reset token')
            ->send();

        return true;
    }
}
