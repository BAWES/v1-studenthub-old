<?php
$params = array_merge(
    require(__DIR__ . '/../../common/config/params.php'),
    require(__DIR__ . '/../../common/config/params-local.php'),
    require(__DIR__ . '/params.php'),
    require(__DIR__ . '/params-local.php')
);

return [
    'id' => 'app-employer',
    'basePath' => dirname(__DIR__),
    'controllerNamespace' => 'employer\controllers',
    'bootstrap' => ['log','common\components\LanguageSetting'],
    'modules' => [],
    'components' => [
        'request' => [
            'class' => 'common\components\Request',
            'noCsrfRoutes' => [
                'job/knet-response'
            ]
        ],
        'user' => [
            'identityClass' => 'common\models\Employer',
            'enableAutoLogin' => true,
        ],
        'session' => [
            'name' => 'app-employer',
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
        'errorHandler' => [
            'errorAction' => 'site/error',
        ],
    ],
    'params' => $params,
];
