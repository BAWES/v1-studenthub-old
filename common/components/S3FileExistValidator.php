<?php
namespace common\components;

use Yii;
use yii\validators\Validator;

/**
 * S3FileExistValidator will validate if the attribute contains a filename of an object within
 * your bucket
 */
class S3FileExistValidator extends Validator
{
    /**
     * @var \common\components\S3ResourceManager The S3 resource manager containing bucket, key, and secret
     */
    public $resourceManager;
    
    /**
     * @var string The file path to check for within the bucket
     * By default it will check main bucket location
     * Make sure to include slash at end path
     * eg: uploads/
     */
    public $filePath = "";
    
    public function validateAttribute($model, $attribute)
    {
        $filename = $model->$attribute;
        if($filename && $this->resourceManager){
            //check if this file exists within this resourceManager bucket
            if(!$this->resourceManager->fileExists($this->filePath.$filename)){
                $this->addError($model, $attribute, Yii::t("frontend", "Please upload a photo of your university id card"));
            }
        }
    }
}