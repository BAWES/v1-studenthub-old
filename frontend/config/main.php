<?php
$params = array_merge(
    require(__DIR__ . '/../../common/config/params.php'),
    require(__DIR__ . '/../../common/config/params-local.php'),
    require(__DIR__ . '/params.php'),
    require(__DIR__ . '/params-local.php')
);

return [
    'id' => 'app-frontend',
    'basePath' => dirname(__DIR__),
    'bootstrap' => ['log','common\components\LanguageSetting'],
    'controllerNamespace' => 'frontend\controllers',
    'components' => [
        'user' => [
            'identityClass' => 'common\models\Student',
            'enableAutoLogin' => true,
        ],
        'session' => [
            'name' => 'app-frontend',
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
        'assetManager' => [
            'assetMap' => [
                //Template suggests we use version 1.11.1 of jQuery incase one of the validation plugins fails
                //'jquery.js' => '//ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js',
            ],
        ]
    ],
    'params' => $params,
];
