<?php

namespace common\assets;

use yii\web\AssetBundle;

/**
 * This is the AssetBundle containing the main template requirements
 * This must be registered with every page layout
 * @author Khalid Al-Mutawa <khalid@bawes.net>
 */
class ShareableTemplateAsset extends AssetBundle
{
    public $sourcePath = '@common/assets/ShareableTemplateAsset';
    
    //CSS will be added before closing </head> tag
    public $css = [
        'css/layout.css',
        'css/elements.css',
    ];
    
    //JS will be added before closing </body> tag
    public $js = [
        'js/global-vendors.js',
        'js/scrollMonitor.js',
        'js/skrollr.min.js',
        'js/jquery.typer.min.js',
        'js/studenthub.js',
        'js/one-page-parallax.js',
    ];
    
    public $depends = [
        'yii\web\YiiAsset',
    ];
}
