<?php

namespace frontend\assets;

use yii\web\AssetBundle;

/*
 * SelectizeAsset includes js and css files for selectize.js selection plugin
 */
class RegistrationAsset extends AssetBundle
{
    public $basePath = '@webroot';
    public $baseUrl = '@web';
    public $css = [
        'plugins/selectize/dist/css/selectize.bootstrap3.css',
        'plugins/jasny-bootstrap/dist/css/jasny-bootstrap.min.css'
    ];
    public $js = [
        'plugins/selectize/dist/js/standalone/selectize.js',
        'plugins/jasny-bootstrap/dist/js/jasny-bootstrap.min.js'
    ];
    public $depends = [
        'common\assets\TemplateAsset',
    ];
}
