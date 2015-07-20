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
                'employers' => 'site/employers', 
                'promotions' => 'site/promotions', 
                'contact' => 'site/contact', 
                'login' => 'site/login', 
                'register' => 'site/register', 
            ],
        ],
        'urlManagerFrontend' => [
            'class' => 'yii\web\UrlManager',
            'baseUrl' => '//studenthubdemo.co',
            'enablePrettyUrl' => true,
            'showScriptName' => false,
            'rules' => [
                'demo' => 'site/demo', 
                'employers' => 'site/employers', 
                'promotions' => 'site/promotions', 
                'contact' => 'site/contact', 
                'login' => 'site/login', 
                'register' => 'register/index', 
            ],
        ],
    ],
];
