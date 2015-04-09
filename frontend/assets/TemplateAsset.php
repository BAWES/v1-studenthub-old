<?php

namespace frontend\assets;

use yii\web\AssetBundle;

/**
 * This is the AssetBundle containing the main template requirements
 * This must be registered with every page layout
 * @author Khalid Al-Mutawa <khalid@bawes.net>
 */
class TemplateAsset extends AssetBundle
{
    public $basePath = '@webroot';
    public $baseUrl = '@web';
    
    //CSS will be added before closing </head> tag
    public $css = [
    ];
    
    
    //JS will be added before closing </body> tag
    public $js = [
    ];
    
    public $depends = [
    ];
}
