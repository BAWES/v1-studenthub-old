<?php
return [
    'components' => [
        'request' => [
            // !!! insert a secret key in the following (if it is empty) - this is required by cookie validation
            'cookieValidationKey' => '',
        ],
        'urlManagerEmployer' => [
            'class' => 'yii\web\UrlManager',
            'baseUrl' => '/employer/web',
            'enablePrettyUrl' => true,
            'showScriptName' => false,
        ],
    ],
];
