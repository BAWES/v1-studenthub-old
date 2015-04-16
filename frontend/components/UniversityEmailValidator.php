<?php
namespace frontend\components;

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
                //If university does not require ID verification, it requires a valid university email - otherwise no validation required
                if ($university->university_require_verify == \common\models\University::VERIFICATION_NOT_REQUIRED) {
                    $emailSplit = explode("@", $model->$attribute);
                    $emailName = $emailSplit[0];
                    $emailDomain = $emailSplit[1];
                    $universityDomain = $university->university_domain;
                    
                    //Email domain does not match the university domain
                    if($emailDomain !== $universityDomain){
                        $this->addError($model, $attribute, "Please use your university email eg: $emailName@$universityDomain");
                    }
                }
            }else $this->addError($model, $attribute, "University does not exist");
        }else $this->addError($model, $attribute, "No university attribute");
    }
}