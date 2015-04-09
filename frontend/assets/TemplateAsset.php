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
        //BEGIN CORE CSS FRAMEWORK
        'plugins/boostrapv3/css/bootstrap.min.css',
        'plugins/boostrapv3/css/bootstrap-theme.min.css',
        'plugins/font-awesome/css/font-awesome.css',
        'css/animate.min.css',
        'plugins/jquery-scrollbar/jquery.scrollbar.css',
        
        //BEGIN CSS TEMPLATE
        'css/style.css',
        'css/responsive.css',
        'css/custom-icon-set.css',
        
        //Pace css for loading bars
        'plugins/pace/pace-theme-flash.css',
    ];
    
    
    //JS will be added before closing </body> tag
    public $js = [
        //BEGIN CORE JS FRAMEWORK
        'plugins/boostrapv3/js/bootstrap.min.js',
        'plugins/breakpoints.js',
        'plugins/jquery-unveil/jquery.unveil.min.js',
        'plugins/jquery-scrollbar/jquery.scrollbar.min.js',
        
        //BEGIN CORE TEMPLATE JS
        'js/core.js',
        
        //Pace.js for loading bars
        'plugins/pace/pace.min.js',
        //Animate numbers
        'plugins/jquery-numberAnimate/jquery.animateNumbers.js',
    ];
    public $depends = [
        'yii\web\YiiAsset',
    ];
}
