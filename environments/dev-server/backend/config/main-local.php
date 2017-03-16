<?php
return [
    'components' => [
        'request' => [
            // !!! insert a secret key in the following (if it is empty) - this is required by cookie validation
            'cookieValidationKey' => '',
        ],
        'urlManager' => [
            'enablePrettyUrl' => true,
            'showScriptName' => false,
        ],
        'urlManagerEmployer' => [
            'class' => 'yii\web\UrlManager',
            'baseUrl' => 'http://employer.studenthub.co',
            'enablePrettyUrl' => true,
            'showScriptName' => false,
        ],
        'urlManagerFrontend' => [
            'class' => 'yii\web\UrlManager',
            'baseUrl' => 'http://studenthub.co',
            'enablePrettyUrl' => true,
            'showScriptName' => false,
        ],
    ],
];