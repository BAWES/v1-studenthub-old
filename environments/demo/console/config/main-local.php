<?php
return [
    'components' => [
        'urlManagerEmployer' => [
            'class' => 'yii\web\UrlManager',
            'baseUrl' => '//employer.studenthubdemo.co',
            'enablePrettyUrl' => true,
            'showScriptName' => false,
        ],
        'urlManagerFrontend' => [
            'class' => 'yii\web\UrlManager',
            'baseUrl' => '//studenthubdemo.co',
            'enablePrettyUrl' => true,
            'showScriptName' => false,
        ],
    ],
];
