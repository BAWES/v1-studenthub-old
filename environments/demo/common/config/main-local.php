<?php
return [
    'components' => [
        'cache' => [
            'class' => 'yii\caching\FileCache',
        ],
        'db' => [
            'class' => 'yii\db\Connection',
            'dsn' => 'mysql:host=localhost;dbname=studenthub',
            'username' => 'studenthubuser',
            'password' => 'jxwMFGBJb3LzrypS',
            'charset' => 'utf8',
            
            //Enable schema caching
            'enableSchemaCache' => true,
            // Duration of schema cache.
            'schemaCacheDuration' => 3600, // 1 hour
            // Name of the cache component used to store schema information
            'schemaCache' => 'cache',
        ],
        'mailer' => [
            'class' => 'yii\swiftmailer\Mailer',
            'viewPath' => '@common/mail',
            'htmlLayout' => 'layouts/studenthub-html',
            'transport' => [
                'class' => 'Swift_SmtpTransport',
                'host' => 'smtp.mandrillapp.com',
                'username' => 'khalid@bawes.net',
                'password' => 'Kf-0JI9aFDQIpszlEvurdA',
                'port' => '587',
                'encryption' => 'tls',
            ],
        ],
    ],
];
