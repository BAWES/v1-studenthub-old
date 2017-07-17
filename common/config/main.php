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
        'temporaryBucketResourceManager' => [
            'class' => 'common\components\S3ResourceManager',
            'key' => 'AKIAIKZYNH7OERZMXZ2A',
            'secret' => '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',
            'bucket' => 'bawes-public'
            /**
             * You can access the Temporary bucket with:
             * https://bawes-public.s3.amazonaws.com/
             * https://bawes-public.s3.amazonaws.com/folderName/fileName.jpg
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
        'slack' => [
            'class' => 'understeam\slack\Client',
            'url' => 'https://hooks.slack.com/services/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',
            'username' => 'studenthub',
        ],
        'httpclient' => [
            'class' =>'yii\httpclient\Client',
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
        'urlManagerEmployer' => [
            'class' => 'yii\web\urlManager',
            'enablePrettyUrl' => true,
            'showScriptName' => false,
            'baseUrl' => 'https://employer.studenthub.co',
        ],
    ],
];
