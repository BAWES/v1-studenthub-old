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
        'assetManager' => [
            //append time stamps to assets for cache busting
            'appendTimestamp' => true,
        ],
        'cache' => [
            'class' => 'yii\caching\FileCache',
        ],
        'i18n' => [
            'translations' => [
                '*' => [
                    'class' => 'yii\i18n\PhpMessageSource',
                    'basePath' => '@common/messages',
                    'sourceLanguage' => 'en',
                    'fileMap' => [
                        //'main' => 'main.php',
                    ],
                ],
            ],
        ],
    ],
];
