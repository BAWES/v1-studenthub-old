<?php
$params = array_merge(
    require(__DIR__ . '/../../common/config/params.php'),
    require(__DIR__ . '/../../common/config/params-local.php'),
    require(__DIR__ . '/params.php'),
    require(__DIR__ . '/params-local.php')
);

return [
    'id' => 'app-employerapi',
    'basePath' => dirname(__DIR__),
    'controllerNamespace' => 'employerapi\controllers',
    'bootstrap' => ['log'],
    'modules' => [
        'v1' => [
            'basePath' => '@employerapi/modules/v1',
            'class' => 'employerapi\modules\v1\Module',
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
            'identityClass' => 'employerapi\models\Employer',
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
                        'POST request-reset-password' => 'request-reset-password',
                        'PATCH update-password' => 'update-password',
                        'PATCH verify' => 'verify-email',
                        'PATCH update-password' => 'update-password',
                        'POST create-account' => 'create-account',
                        'POST request-reset-password' => 'request-reset-password',
                        'POST resend-verification-email' => 'resend-verification-email',
                        'POST validate' => 'validate',
                        // OPTIONS VERBS
                        'OPTIONS login' => 'options',
                        'OPTIONS verify' => 'options',
                        'OPTIONS validate' => 'options',
                        'OPTIONS login' => 'options',
                        'OPTIONS create-account' => 'options',
                        'OPTIONS request-reset-password' => 'options',
                        'OPTIONS resend-verification-email' => 'options',
                    ]
                ],
                [ // IndustryController
                    'class' => 'yii\rest\UrlRule',
                    'controller' => 'v1/industry',
                    'patterns' => [
                        'GET' => 'list',
                        'POST filter' => 'filter',
	                    // OPTIONS VERBS
                        'OPTIONS' => 'options',
                        'OPTIONS filter' => 'options',
                    ]
                ],
                [ // CityController
                    'class' => 'yii\rest\UrlRule',
                    'controller' => 'v1/city',
                    'patterns' => [
                        'GET' => 'list',
                        'POST filter' => 'filter',
                        // OPTIONS VERBS
                        'OPTIONS' => 'options',
                        'OPTIONS filter' => 'options',
                    ]
                ],
                [ // AccountController
                    'class' => 'yii\rest\UrlRule',
                    'controller' => 'v1/account',
                    'pluralize' => false,
                    'patterns' => [
                        'POST update' => 'update',
                        'POST contact' => 'contact',
                        'GET detail' => 'detail',
                        // OPTIONS VERBS
                        'OPTIONS update' => 'options',
                        'OPTIONS contact' => 'options',
                        'OPTIONS detail' => 'options',
                    ]
                ],
                [ // OfficeController
                    'class' => 'yii\rest\UrlRule',
                    'controller' => 'v1/office',
                    'patterns' => [
                        'GET' => 'list',
                        'GET all' => 'list-all',
                        'POST' => 'create',
                        'PATCH <id>' => 'update',
                        'DELETE <id>' => 'delete',
                        // OPTIONS VERBS
                        'OPTIONS' => 'options',
                        'OPTIONS <id>' => 'options',
                        'OPTIONS all' => 'options'
                    ]
                ],
                [ // JobController
                    'class' => 'yii\rest\UrlRule',
                    'controller' => 'v1/job',
                    'patterns' => [
                        'GET' => 'list',
                        'GET <id>' => 'detail',
                        'GET payment-methods/<id>' => 'payment-methods',
                        'GET application/<id>' => 'job-application',
                        'GET shotlist' => 'shotlist',
                        'POST shotlist' => 'shotlist-applicant',
                        'POST' => 'create',
                        'POST office' => 'create-job-office',
                        'PATCH office/<id>' => 'update-job-office',
                        'POST question' => 'create-job-question',
                        'PATCH question/<id>' => 'update-job-question',
                        'PATCH <id>' => 'update',
                        'DELETE <id>' => 'delete',
                        // OPTIONS VERBS
                        'OPTIONS' => 'options',
                        'OPTIONS <id>' => 'options',
                        'OPTIONS job' => 'options',
                        'OPTIONS job/<id>' => 'options',
                        'OPTIONS question/<id>' => 'options',
                        'OPTIONS application/<id>' => 'options'
                    ]
                ],
                [ // JobtypeController
                    'class' => 'yii\rest\UrlRule',
                    'controller' => 'v1/jobtype',
                    'patterns' => [
                        'GET' => 'list',
                        'POST filter' => 'filter',
                        // OPTIONS VERBS
                        'OPTIONS' => 'options',
                        'OPTIONS filter' => 'options',
                    ]
                ],
                [ // PaymentController
                    'class' => 'yii\rest\UrlRule',
                    'controller' => 'v1/payment/credit',
                    'patterns' => [
                        'GET <id>' => 'pay',
                        // OPTIONS VERBS
                        'OPTIONS <id>' => 'options'
                    ]
                ],
                [ // InvoiceController
                    'class' => 'yii\rest\UrlRule',
                    'controller' => 'v1/invoice',
                    'patterns' => [
                        'GET' => 'list',
                        // OPTIONS VERBS
                        'OPTIONS' => 'options'
                    ]
                ],
            ],
        ],
    ],
    'params' => $params,
];
