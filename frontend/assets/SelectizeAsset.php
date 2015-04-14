<?php

namespace frontend\assets;

use yii\web\AssetBundle;

/*
 * SelectizeAsset includes js and css files for selectize.js selection plugin
 */
class SelectizeAsset extends AssetBundle
{
    public $basePath = '@webroot';
    public $baseUrl = '@web';
    public $css = [
        'plugins/selectize/dist/css/selectize.bootstrap3.css',
    ];
    public $js = [
        'plugins/selectize/dist/js/standalone/selectize.js',
    ];
    public $depends = [
        'common\assets\TemplateAsset',
    ];
}
