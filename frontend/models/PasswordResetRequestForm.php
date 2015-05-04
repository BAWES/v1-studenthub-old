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
     * @return boolean whether the email was send
     */
    public function sendEmail()
    {
        /* @var $student Student */
        $student = Student::findOne([
            'student_email' => $this->email,
        ]);

        if ($student) {
            if (!Student::isPasswordResetTokenValid($student->student_password_reset_token)) {
                $student->generatePasswordResetToken();
            }
            
            //Update student last email limit timestamp
            $student->student_limit_email = new \yii\db\Expression('NOW()');

            if ($student->save()) {
                return \Yii::$app->mailer->compose(['html' => 'passwordResetToken-html', 'text' => 'passwordResetToken-text'], ['user' => $student])
                    ->setFrom([\Yii::$app->params['supportEmail'] => \Yii::$app->name ])
                    ->setTo($this->email)
                    ->setSubject('Password reset for ' . \Yii::$app->name)
                    ->send();
            }
        }

        return false;
    }
}
