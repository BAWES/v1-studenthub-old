<?php

namespace studentapi\modules\v1;

/**
 * v1 module definition class
 */
class Module extends \yii\base\Module
{
    /**
     * @inheritdoc
     */
    public $controllerNamespace = 'studentapi\modules\v1\controllers';

    /**
     * @inheritdoc
     */
    public function init()
    {
        parent::init();

        //Can Initialize / add params to this module here
    }

}
