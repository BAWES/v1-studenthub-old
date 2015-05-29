<?php

namespace backend\assets;

use yii\web\AssetBundle;

/**
 * Multiselect Plugin
 * http://loudev.com/#demos
 * @author Khalid Al-Mutawa <khalid@bawes.net>
 */
class MultiselectAsset extends AssetBundle
{
    public $sourcePath = '@backend/assets/MultiselectAsset';
    
    public $css = [
        'css/multi-select.css',
    ];
    
    public $js = [
        'js/jquery.multi-select.js',
        'js/jquery.quicksearch.js',
    ];
    
    public $depends = [
        'yii\web\JqueryAsset',
    ];
}
