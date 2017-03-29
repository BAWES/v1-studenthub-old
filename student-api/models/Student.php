<?php

namespace studentapi\models;

use Yii;
use yii\db\Expression;

/**
 * This is the model class for table "student".
 * It extends from \common\models\Student but with custom functionality for Student application module
 * 
 */
class Student extends \common\models\Student {
    
    /**
     * @inheritdoc
     */
    public function fields()
    {
        $fields = parent::fields();

        // remove fields that contain sensitive information
        unset($fields['student_auth_key'],
        $fields['student_password_hash'],
        $fields['student_password_reset_token']);

        return $fields;
    }
    
    /**
     * Sends an email requesting a user to verify his email address
     * @return boolean whether the email was sent
     */
    public function sendVerificationEmail() {
        
        //Update student last email limit timestamp
        $this->student_limit_email = new Expression('NOW()');
        $this->save(false);

        if($this->student_new_email)
        {
            $email = $this->student_new_email;
        }
        else
        {
            $email = $this->student_email;
        }        

        if (!$this->student_language_pref || $this->student_language_pref == "en-US") {
            //Set language based on preference stored in DB
            Yii::$app->view->params['isArabic'] = false;

            //Send English Email
            return Yii::$app->mailer->compose([
                    'html' => 'student-api/verificationEmail-html',
                    'text' => 'student-api/verificationEmail-text',
                ], [
                    'student' => $this
                ])
                ->setFrom(['contact@studenthub.co' => 'StudentHub'])
                ->setTo($email)
                ->setSubject('[StudentHub] Email Verification')
                ->send();
        } else {
            //Set language based on preference stored in DB
            Yii::$app->view->params['isArabic'] = true;

            //Send Arabic Email
            return Yii::$app->mailer->compose([
                    'html' => 'student-api/verificationEmail-ar-html',
                    'text' => 'student-api/verificationEmail-ar-text',
                ], [
                    'student' => $this
                ])
                ->setFrom([\Yii::$app->params['supportEmail'] => \Yii::$app->name ])
                ->setTo($email)
                ->setSubject('[StudentHub] التحقق من البريد الإلكتروني')
                ->send();
        }
    }
}
