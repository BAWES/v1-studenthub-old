<?php
namespace employer\models;

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
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'email' => Yii::t('app', 'Email'),
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
                if($employer->employer_language_pref == "en-US"){
                    //Send English Email
                    return \Yii::$app->mailer->compose(['html' => 'passwordResetToken-html', 'text' => 'passwordResetToken-text'], ['user' => $employer])
                        ->setFrom([\Yii::$app->params['supportEmail'] => \Yii::$app->name ])
                        ->setTo($employer->employer_email)
                        ->setSubject('[StudentHub] Password Reset')
                        ->send();
                }else{
                    //Set language based on preference stored in DB
                    Yii::$app->view->params['isArabic'] = true;
                    
                    return \Yii::$app->mailer->compose(['html' => 'passwordResetToken-html', 'text' => 'passwordResetToken-text'], ['user' => $employer])
                        ->setFrom([\Yii::$app->params['supportEmail'] => \Yii::$app->name ])
                        ->setTo($employer->employer_email)
                        ->setSubject('[StudentHub] إعادة تعيين كلمة المرور')
                        ->send();
                }
            }
        }

        return false;
    }
}
