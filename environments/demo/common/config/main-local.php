<?php
return [
    'components' => [
        'db' => [
            'class' => 'yii\db\Connection',
            'dsn' => 'mysql:host=localhost;dbname=studenthub',
            'username' => 'studenthubuser',
            'password' => 'jxwMFGBJb3LzrypS',
            'charset' => 'utf8',
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
