<?php
return [
    'bootstrap' => ['gii'],
    'modules' => [
        'gii' => 'yii\gii\Module',
    ],
    'components' => [
        'urlManager' => [ //for students
            'class' => 'yii\web\UrlManager',
            'hostInfo' => 'http://localhost/~BAWES/studenthub/frontend/web/index.php',
            'scriptUrl' => '',
        ],
        'urlManagerEmployer' => [
            'class' => 'yii\web\UrlManager',
            'hostInfo' => 'http://localhost/~BAWES/studenthub/employer/web/index.php',
            'scriptUrl' => '',
        ],
    ],
];
