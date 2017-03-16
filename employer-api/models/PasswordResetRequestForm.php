<?php
namespace employerapi\models;

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
            [['email'], 'exist', 'skipOnError' => false, 'targetClass' => Employer::className(), 'targetAttribute' => ['email' => 'employer_email']],
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
            
            if ($employer->save(false)) {
                if($employer->employer_language_pref == "en-US"){
                    //Set language based on preference stored in DB
                    Yii::$app->view->params['isArabic'] = false;
                    
                    //Send English Email
                    return \Yii::$app->mailer->compose(['html' => 'employer-api/passwordResetToken-html', 'text' => 'employer-api/passwordResetToken-text'], ['employer' => $employer])
                        ->setFrom([\Yii::$app->params['supportEmail'] => \Yii::$app->name ])
                        ->setTo($employer->employer_email)
                        ->setSubject('[StudentHub] Password Reset')
                        ->send();
                }else{
                    //Set language based on preference stored in DB
                    Yii::$app->view->params['isArabic'] = true;
                    
                    return \Yii::$app->mailer->compose(['html' => 'employer-api/passwordResetToken-ar-html', 'text' => 'employer-api/passwordResetToken-ar-text'], ['employer' => $employer])
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
