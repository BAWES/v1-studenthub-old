<?php
namespace frontend\models;

use Yii;
use common\models\Employer;
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
                'targetClass' => '\common\models\Employer',
                'targetAttribute' => 'employer_email',
                'message' => Yii::t("employer", 'There is no employer with such email.')
            ],
        ];
    }

    /**
     * Sends an email with a link, for resetting the password.
     *
     * @return boolean whether the email was sent
     */
    public function sendEmail()
    {
        /* @var $employer Employer */
        $employer = Employer::findOne([
            'employer_email' => $this->email,
        ]);

        if ($employer) {
            if (!Employer::isPasswordResetTokenValid($employer->employer_password_reset_token)) {
                $employer->generatePasswordResetToken();
            }

            if ($employer->save()) {
                return \Yii::$app->mailer->compose(['html' => 'passwordResetToken-html', 'text' => 'passwordResetToken-text'], ['user' => $employer])
                    ->setFrom([\Yii::$app->params['supportEmail'] => \Yii::$app->name ])
                    ->setTo($this->email)
                    ->setSubject('Password reset for ' . \Yii::$app->name)
                    ->send();
            }
        }

        return false;
    }
}
