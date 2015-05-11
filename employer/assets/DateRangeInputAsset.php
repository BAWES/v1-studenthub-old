<?php

namespace employer\assets;

use yii\web\AssetBundle;

/*
 * DateRangeInputAsset includes js and css files for daterange input
 */
class DateRangeInputAsset extends AssetBundle
{
    public $basePath = '@webroot';
    public $baseUrl = '@web';
    public $css = [
        'plugins/bootstrap-daterangepicker/daterangepicker-bs3.css',
    ];
    public $js = [
        'plugins/bootstrap-daterangepicker/daterangepicker.js',
    ];
    public $depends = [
        'common\assets\TemplateAsset',
    ];
}
