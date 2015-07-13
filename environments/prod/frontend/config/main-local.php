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
            'rules' => [
                'demo' => 'site/demo', 
            ],
        ],
        'urlManagerEmployer' => [
            'class' => 'yii\web\UrlManager',
            'baseUrl' => '//employer.studenthub.co',
            'enablePrettyUrl' => true,
            'showScriptName' => false,
        ],
    ],
];
