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
        //BEGIN CORE CSS
        'css/admin1.css',
        'css/elements.css',
        
        //BEGIN PLUGIN CSS
        'css/plugins.css',
    ];
    
    
    //JS will be added before closing </body> tag
    public $js = [
        //BEGIN GLOBAL AND THEME VENDORS
        'js/global-vendors.js',
        
        //PLEASURE
        'js/pleasure.js',
        
        //ADMIN 1
        'js/layout.js',
    ];
    
    public $depends = [
    ];
}
