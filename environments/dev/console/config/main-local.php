<?php
return [
    'bootstrap' => ['gii'],
    'modules' => [
        'gii' => 'yii\gii\Module',
    ],
    'components' => [
        'urlManagerEmployer' => [
            'class' => 'yii\web\UrlManager',
            'scriptUrl' => '/~BAWES/studenthub/employer/web/index.php',
        ],
        'urlManagerFrontend' => [
            'class' => 'yii\web\UrlManager',
            'scriptUrl' => '/~BAWES/studenthub/frontend/web/index.php',
        ],
    ],
];
