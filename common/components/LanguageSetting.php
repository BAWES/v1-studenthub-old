<?php
namespace common\components;

use Yii;

class LanguageSetting extends \yii\base\Component
{
    public function init() {
        //Get user preferred language
        $preferredLanguage = Yii::$app->request->getPreferredLanguage(['en-US','ar-KW']);
        
        //Set or get application language cookie
        $language = Yii::$app->request->cookies->getValue('language', $preferredLanguage);
        
        //$language = $session->get('language');
        \Yii::$app->language = $language;
        
        
        parent::init();
    }
}