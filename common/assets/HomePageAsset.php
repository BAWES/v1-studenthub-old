<?php

namespace common\assets;

use yii\web\AssetBundle;

/**
 * @author Khalid Al-Mutawa <khalid@bawes.net>
 */
class HomePageAsset extends AssetBundle
{
    public $sourcePath = '@common/assets/HomePageAsset';
    
    //CSS will be added before closing </head> tag
    public $css = [
        'css/owl.carousel.css',
        'css/owl.theme.css',
    ];
    
    //JS will be added before closing </body> tag
    public $js = [
        'js/jquery.typer.min.js',
        'js/owl.carousel.min.js',
    ];
    
    public $depends = [
        'common\assets\TemplateAsset',
    ];
}
