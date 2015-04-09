<?php

namespace frontend\assets;

use yii\web\YiiAsset;

/**
 * Extend Yii Asset but removing dependency on jQuery and Bootstrap
 * this will include yii.js 
 */
class MainAsset extends YiiAsset
{
    //Depends on jQuery which is part of frontend\assets\TemplateAsset
    public $depends = [
        'yii\web\JqueryAsset',
        'frontend\assets\TemplateAsset',
    ];
}
