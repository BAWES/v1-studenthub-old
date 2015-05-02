<?php

namespace employer\models;

use Yii;

/**
 * This is the model class for table "employer".
 * It extends from \common\models\Employer but with custom functionality for Employer application module
 * 
 */
class Employer extends \common\models\Employer {

    /**
     * Sends an email requesting a user to verify his email address
     * @return boolean whether the email was sent
     */
    public function sendVerificationEmail() {
        if($this->employer_language_pref == "en-US"){
            //Send English Email
            return Yii::$app->mailer->compose([
                                'html' => 'employer/verificationEmail-html',
                                'text' => 'employer/verificationEmail-text',
                                    ], [
                                'employer' => $this
                            ])
                            ->setFrom(['contact@studenthub.co' => 'StudentHub'])
                            ->setTo($this->employer_email)
                            ->setSubject('[StudentHub] Email Verification')
                            ->send();
        }else{
            //Set language based on preference stored in DB
            Yii::$app->view->params['isArabic'] = true;
            
            //Send Arabic Email
            return Yii::$app->mailer->compose([
                                'html' => 'employer/verificationEmail-ar-html',
                                'text' => 'employer/verificationEmail-ar-text',
                                    ], [
                                'employer' => $this
                            ])
                            ->setFrom(['contact@studenthub.co' => 'StudentHub'])
                            ->setTo($this->employer_email)
                            ->setSubject('[StudentHub] التحقق من البريد الإلكتروني')
                            ->send();
        }
    }

    /**
     * Signs user up.
     * @param boolean $validate - whether to validate before Signing up
     * @return static|null the saved model or null if saving fails
     */
    public function signup($validate = false) {
        $this->setPassword($this->employer_password_hash);
        $this->generateAuthKey();
        if ($this->save($validate)) {
            $this->sendVerificationEmail();
            return $this;
        }

        return null;
    }

}
