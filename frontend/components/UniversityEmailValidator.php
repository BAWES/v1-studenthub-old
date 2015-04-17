<?php
namespace frontend\components;

use Yii;
use yii\validators\Validator;
use common\models\University;

/**
 * UniversityEmailValidator will compare the specified email attribute with the university domain
 * and check if this email belongs to this university domain
 * 
 * Email will be valid automatically if this university requires ID validation
 */
class UniversityEmailValidator extends Validator
{
    /**
     *
     * @var string the name of the attribute containing university id, the value within
     * this attribute will be used to compare the university domain email against the
     * current email input.
     */
    public $universityAttribute;
    
    public function validateAttribute($model, $attribute)
    {        
        if($this->universityAttribute !== null)
        {
            $universityID = (int) $model[$this->universityAttribute];
            
            if (($university = University::findOne($universityID)) !== null) {
                $emailSplit = explode("@", $model->$attribute);
                $emailName = $emailSplit[0];
                $emailDomain = $emailSplit[1];
                
                //If university does not require ID verification, it requires a valid university email
                if ($university->university_require_verify == \common\models\University::VERIFICATION_NOT_REQUIRED) {
                    $universityDomain = $university->university_domain;
                    
                    //Email domain does not match the university domain
                    if($emailDomain !== $universityDomain){
                        $errorMsg = \Yii::t('frontend', "Please use your university email eg: {emailName}@{universityDomain}", [
                            'emailName' => $emailName,
                            'universityDomain' => $universityDomain,
                        ]);
                        
                        $this->addError($model, $attribute, $errorMsg);
                    }
                }else{
                    //If university requires ID verification, make sure their email domain doesn't belong to another university
                    $universityExists = University::find()->where('university_domain = :emailDomain',[':emailDomain'=>$emailDomain])->one();
                    if($universityExists){
                        $errorMsg = \Yii::t('frontend', "This email belongs to {universityName}", [
                            'universityName' => \Yii::$app->view->params['isArabic']?$universityExists->university_name_ar:$universityExists->university_name_en,
                        ]);
                        $this->addError($model, $attribute, $errorMsg);
                    }
                }
            }else $this->addError($model, $attribute, \Yii::t('frontend',"University does not exist"));
        }else $this->addError($model, $attribute, "No university attribute");
    }
}