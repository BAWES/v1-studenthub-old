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
        
        \Yii::$app->language = $language;
        
        //Boolean value that will be used by views to render RTL layout
        if($language != 'en-US'){
            \Yii::$app->view->params['isArabic'] = true;
        }else \Yii::$app->view->params['isArabic'] = false;
        
        
        parent::init();
    }
}