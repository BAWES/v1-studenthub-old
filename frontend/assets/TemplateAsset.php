<?php

namespace frontend\assets;

use yii\web\AssetBundle;

/**
 * This is the AssetBundle containing the main template requirements
 * @author Khalid Al-Mutawa <khalid@bawes.net>
 */
class TemplateAsset extends AssetBundle
{
    public $basePath = '@webroot';
    public $baseUrl = '@web';
    public $css = [
        //'css/site.css',
    ];
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
        'plugins/jquery-numberAnimate/jquery.animateNumbers.js'
    ];
    public $depends = [
        'yii\web\YiiAsset',
    ];
}
