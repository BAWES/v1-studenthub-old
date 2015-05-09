<?php

namespace employer\assets;

use yii\web\AssetBundle;

/*
 * SliderInputAsset includes js and css files for slider input
 * Documentation available on http://refreshless.com/nouislider/
 */
class SliderInputAsset extends AssetBundle
{
    public $basePath = '@webroot';
    public $baseUrl = '@web';
    public $css = [
        'plugins/nouislider/distribute/jquery.nouislider.min.css',
    ];
    public $js = [
        'plugins/nouislider/distribute/jquery.nouislider.all.min.js',
    ];
    public $depends = [
        'yii\web\JqueryAsset',
    ];
}
