<?php

namespace employer\assets;

use yii\web\AssetBundle;

/*
 * SliderInputAsset includes js and css files for slider input
 * Documentation available on http://refreshless.com/nouislider/
 */
class SwitchInputAsset extends AssetBundle
{
    public $basePath = '@webroot';
    public $baseUrl = '@web';
    public $css = [
        'plugins/bootstrap-switch/dist/css/bootstrap3/bootstrap-switch.min.css',
    ];
    public $js = [
        'plugins/bootstrap-switch/dist/js/bootstrap-switch.min.js',
    ];
    public $depends = [
        'common\assets\TemplateAsset',
        //'yii\web\JqueryAsset',
    ];
}
