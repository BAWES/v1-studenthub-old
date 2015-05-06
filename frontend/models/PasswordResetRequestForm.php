<?php
namespace frontend\models;

use Yii;
use common\models\Student;
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
                'targetClass' => '\common\models\Student',
                'targetAttribute' => 'student_email',
                'message' => Yii::t("student", 'There is no student with such email.')
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
     * @param frontend\models\Student $student
     * @return boolean whether the email was send
     */
    public function sendEmail($student = null)
    {
        if(!$student){
            $student = Student::findOne([
                'student_email' => $this->email,
            ]);
        }

        if ($student) {
            if (!Student::isPasswordResetTokenValid($student->student_password_reset_token)) {
                $student->generatePasswordResetToken();
            }
            
            //Update student last email limit timestamp
            $student->student_limit_email = new \yii\db\Expression('NOW()');
            
            if ($student->save()) {
                if($student->student_language_pref == "en-US"){
                    //Set language based on preference stored in DB
                    Yii::$app->view->params['isArabic'] = false;
                    
                    //Send English Email
                    return \Yii::$app->mailer->compose(['html' => 'student/passwordResetToken-html', 'text' => 'student/passwordResetToken-text'], ['student' => $student])
                        ->setFrom([\Yii::$app->params['supportEmail'] => \Yii::$app->name ])
                        ->setTo($student->student_email)
                        ->setSubject('[StudentHub] Password Reset')
                        ->send();
                }else{
                    //Set language based on preference stored in DB
                    Yii::$app->view->params['isArabic'] = true;
                    
                    return \Yii::$app->mailer->compose(['html' => 'student/passwordResetToken-ar-html', 'text' => 'student/passwordResetToken-ar-text'], ['student' => $student])
                        ->setFrom([\Yii::$app->params['supportEmail'] => \Yii::$app->name ])
                        ->setTo($student->student_email)
                        ->setSubject('[StudentHub] إعادة تعيين كلمة المرور')
                        ->send();
                }
            }
        }

        return false;
    }
}
