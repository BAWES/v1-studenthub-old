<?php
namespace backend\models;

use common\models\Admin;
use yii\base\Model;

/**
 * Password reset request form
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
            ['email', 'filter', 'filter' => 'trim'],
            ['email', 'required'],
            ['email', 'email'],
            ['email', 'exist',
                'targetClass' => '\common\models\Admin',
                'targetAttribute' => 'admin_email',
                'message' => 'There is no admin with such email.'
            ],
        ];
    }

    /**
     * Sends an email with a link, for resetting the password.
     *
     * @return boolean whether the email was send
     */
    public function sendEmail()
    {
        /* @var $admin Admin */
        $admin = Admin::findOne([
            'admin_email' => $this->email,
        ]);

        if ($admin) {
            if (!Admin::isPasswordResetTokenValid($admin->admin_password_reset_token)) {
                $admin->generatePasswordResetToken();
            }

            if ($admin->save()) {
                return \Yii::$app->mailer->compose(['html' => 'passwordResetToken-html', 'text' => 'passwordResetToken-text'], ['admin' => $admin])
                    ->setFrom([\Yii::$app->params['supportEmail'] => \Yii::$app->name])
                    ->setTo($this->email)
                    ->setSubject('Password reset for ' . \Yii::$app->name)
                    ->send();
            }
        }

        return false;
    }
}
