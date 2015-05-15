<?php

namespace employer\assets;

use yii\web\AssetBundle;

/*
 * - selectize.js selection plugin
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
