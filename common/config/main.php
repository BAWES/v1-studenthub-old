<?php
return [
    'name' => 'StudentHub',
    'vendorPath' => dirname(dirname(__DIR__)) . '/vendor',
    'components' => [
        'resourceManager' => [
            'class' => 'common\components\S3ResourceManager',
            'key' => 'AKIAJY4NMGYUSUMTVTZA',
            'secret' => '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',
            'bucket' => 'studenthub'
            /**
             * You can access the bucket with:
             * https://studenthub.s3.amazonaws.com/
             * https://studenthub.s3.amazonaws.com/folderName/fileName.jpg
             */
        ],
        'log' => [
            'targets' => [
                [
                    'class' => 'yii\log\DbTarget',
                    'levels' => ['info', 'error', 'warning'],
                    'categories' => ['backend\*', 'employer\*', 'frontend\*', 'common\*'],
                ],
            ],
        ],
        'reCaptcha' => [
            'name' => 'reCaptcha',
            'class' => 'himiklab\yii2\recaptcha\ReCaptcha',
            'siteKey' => '6Lc3NwUTAAAAACVAv1KWmGq7FpAmggfvVPXYkjmn',
            'secret' => '6Lc3NwUTAAAAAK6Y2ynxJabyvJh6YpaIW4JtBPzb',
        ],
        'assetManager' => [
            //Link assets -> create symbolic links to assets
            'linkAssets' => true,
            
            //append time stamps to assets for cache busting
            //'appendTimestamp' => true,
        ],
        'session' => [
            'class' => 'yii\web\DbSession',
        ],
        'cache' => [
            'class' => 'yii\caching\FileCache',
        ],
        'formatter' => [
            'currencyCode' => 'KWD',
            'defaultTimeZone' => 'Asia/Kuwait',
        ],
        'i18n' => [
            'translations' => [
                '*' => [
                    'class' => 'yii\i18n\PhpMessageSource',
                    'basePath' => '@common/messages',
                    'sourceLanguage' => 'en',
                ],
                'app' => [
                    'class' => 'yii\i18n\PhpMessageSource',
                    'basePath' => '@common/messages',
                    'sourceLanguage' => 'en',
                ],
                'yii' => [
                    'class' => 'yii\i18n\PhpMessageSource',
                    'basePath' => '@common/messages',
                    'sourceLanguage' => 'en',
                ],
            ],
        ],
    ],
];
