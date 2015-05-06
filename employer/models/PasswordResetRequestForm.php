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
     * @param employer\models\Employer $employer
     * @return boolean whether the email was sent
     */
    public function sendEmail($employer = null)
    {
        if(!$employer){
            $employer = Employer::findOne([
                'employer_email' => $this->email,
            ]);
        }

        if ($employer) {
            if (!Employer::isPasswordResetTokenValid($employer->employer_password_reset_token)) {
                $employer->generatePasswordResetToken();
            }
            
            //Update employer last email limit timestamp
            $employer->employer_limit_email = new \yii\db\Expression('NOW()');
            
            if ($employer->save()) {
                if($employer->employer_language_pref == "en-US"){
                    //Set language based on preference stored in DB
                    Yii::$app->view->params['isArabic'] = false;
                    
                    //Send English Email
                    return \Yii::$app->mailer->compose(['html' => 'employer/passwordResetToken-html', 'text' => 'employer/passwordResetToken-text'], ['employer' => $employer])
                        ->setFrom([\Yii::$app->params['supportEmail'] => \Yii::$app->name ])
                        ->setTo($employer->employer_email)
                        ->setSubject('[StudentHub] Password Reset')
                        ->send();
                }else{
                    //Set language based on preference stored in DB
                    Yii::$app->view->params['isArabic'] = true;
                    
                    return \Yii::$app->mailer->compose(['html' => 'employer/passwordResetToken-ar-html', 'text' => 'employer/passwordResetToken-ar-text'], ['employer' => $employer])
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
