<?php

namespace common\components;

use Yii;
use yii\validators\Validator;
use DateTime;
use DateTimeZone;

/**
 * AgeValidator validates if attribute contains a date that is older than # of years
 */
class AgeValidator extends Validator {

    /**
     * @var int the minimum age the date of birth can be
     */
    public $min = 16;

    public function validateAttribute($model, $attribute) {
        $date = $model->$attribute;
        $tz = new DateTimeZone('Asia/Kuwait');
        $age = DateTime::createFromFormat('Y/m/d', $date, $tz)
                        ->diff(new DateTime('now', $tz))->y;

        if ($age < $this->min) {

            $this->addError($model, $attribute, Yii::t("frontend", "You must be at least {age} years old"),[
                'age' => $this->min
            ]);
        }
    }

}
