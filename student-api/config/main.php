<?php
$params = array_merge(
    require(__DIR__ . '/../../common/config/params.php'),
    require(__DIR__ . '/../../common/config/params-local.php'),
    require(__DIR__ . '/params.php'),
    require(__DIR__ . '/params-local.php')
);

return [
    'id' => 'app-studentapi',
    'basePath' => dirname(__DIR__),
    'controllerNamespace' => 'studentapi\controllers',
    'bootstrap' => ['log'],
    'modules' => [
        'v1' => [
            'basePath' => '@studentapi/modules/v1',
            'class' => 'studentapi\modules\v1\Module',
        ],
    ],
    'components' => [
        'request' => [
            // Accept and parse JSON Requests
            'parsers' => [
                'application/json' => 'yii\web\JsonParser',
            ]
        ],
        'user' => [
            'identityClass' => 'common\models\Student',
            'enableAutoLogin' => false,
            'enableSession' => false,
            'loginUrl' => null
        ],
        'log' => [
            'traceLevel' => YII_DEBUG ? 3 : 0,
            'targets' => [
                [
                    'class' => 'yii\log\FileTarget',
                    'levels' => ['error', 'warning'],
                ],
            ],
        ],
        'urlManager' => [
            'enablePrettyUrl' => true,
            'enableStrictParsing' => true,
            'showScriptName' => false,
            'rules' => [
                [ // AuthController
                    'class' => 'yii\rest\UrlRule',
                    'controller' => 'v1/auth',
                    'pluralize' => false,
                    'patterns' => [
                        'GET login' => 'login',
                        'POST signup' => 'signup',
                        'POST resend-verification-email' => 'resend-verification-email',
                        'POST request-reset-password' => 'request-reset-password',
                        'PATCH verify' => 'verify-email',
                        'PATCH update-password' => 'update-password',
                        // OPTIONS VERBS
                        'OPTIONS login' => 'options',
                        'OPTIONS signup' => 'options',
                        'OPTIONS resend-verification-email' => 'options',
                        'OPTIONS request-reset-password' => 'options',
                        'OPTIONS verify' => 'options',
                        'OPTIONS update-password' => 'options',
                    ]
                ],
                [ // AccountController
                    'class' => 'yii\rest\UrlRule',
                    'controller' => 'v1/account',
                    'pluralize' => false,
                    'patterns' => [
                        'POST update' => 'update',
                        'GET detail' => 'detail',
                        // OPTIONS VERBS
                        'OPTIONS update' => 'options',
                        'OPTIONS detail' => 'detail'
                    ]
                ],
            ],
        ],
    ],
    'params' => $params,
];
