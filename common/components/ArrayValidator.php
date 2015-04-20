<?php

namespace common\components;

use Yii;
use yii\validators\Validator;
use yii\base\DynamicModel;

/**
 * ArrayValidator checks if the input is an array, then validates array input based on validation rule provided
 */
class ArrayValidator extends Validator {

    /**
     * @var array the validation rules you wish to apply to each value within the array
     */
    public $rule;

    public function validateAttribute($model, $attribute) {
        $arrayInput = $model->$attribute;

        if (is_array($arrayInput)) {
            foreach ($arrayInput as $arrayValue) {
                $dyn = DynamicModel::validateData(compact('arrayValue'), [
                            array_merge(['arrayValue'], $this->rule)
                ]);

                if ($dyn->hasErrors()) {
                    $this->addError($model, $attribute, $dyn->errors['arrayValue'][0]);
                }
            }
        } else {
            $this->addError($model, $attribute, Yii::t("frontend", "Invalid input for {attribute}"));
        }
    }

}
