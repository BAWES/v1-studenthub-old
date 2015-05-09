<?php

namespace frontend\assets;

use yii\web\AssetBundle;

/*
 * RegistrationAsset includes js and css files plugins which include
 * - selectize.js selection plugin
 * - daterange picker plugin
 * - jasny bootstrap
 */
class RegistrationAsset extends AssetBundle
{
    public $basePath = '@webroot';
    public $baseUrl = '@web';
    public $css = [
        'plugins/selectize/dist/css/selectize.bootstrap3.css',
        'plugins/jasny-bootstrap/dist/css/jasny-bootstrap.min.css',
        'plugins/bootstrap-daterangepicker/daterangepicker-bs3.css',
    ];
    public $js = [
        'plugins/selectize/dist/js/standalone/selectize.js',
        'plugins/jasny-bootstrap/dist/js/jasny-bootstrap.min.js',
        'plugins/bootstrap-daterangepicker/daterangepicker.js',
    ];
    public $depends = [
        'common\assets\TemplateAsset',
    ];
}
