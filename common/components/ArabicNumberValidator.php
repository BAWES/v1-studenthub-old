<?php

namespace common\components;

use yii\validators\Validator;

/**
 * ArabicNumberValidator takes the attribute value, then formats it to English numbers
 * This will make arabic numbers work as input
 */
class ArabicNumberValidator extends Validator {

    public function validateAttribute($model, $attribute) {
        $numberInput = $model->$attribute;
        
        $arabicNumbers = array('٠', '١', '٢', '٣', '٤', '٥', '٦', '٧', '٨', '٩');
        $englishNumbers = range(0, 9);
        
        $model->attribute = (int) str_replace($arabicNumbers, $englishNumbers, $numberInput);
    }

}
