<?php

namespace employerapi\models;

use Yii;
use yii\base\Model;

/**
 * Contact form
 */
class ContactForm extends Model
{
    public $message;
    public $subject;
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['message', 'subject'], 'required'],
        ];
    }

	/**
	 * @return bool
	 */
    public function sendMail()
    {
	    Yii::$app->view->params['isArabic'] = false;

	    //Send English Email
	    return Yii::$app->mailer->compose([
		    'html' => "employer-api/contactEmail",
	    ], [
		    'contact' => $this,
		    'model' => Yii::$app->user->identity
	    ])
	    ->setFrom([\Yii::$app->params['supportEmail'] => \Yii::$app->name ])
	    ->setTo(Yii::$app->params['adminEmail'])
	    ->setSubject('[StudentHub] Employer Mobile App : Contact Mail')
         ->send();

    }
}
