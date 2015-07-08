<?php
return [
    'components' => [
        'urlManager' => [ //students
            'class' => 'yii\web\UrlManager',
            'baseUrl' => 'http://studenthub.co',
            'hostInfo' => 'http://studenthub.co',
            'enablePrettyUrl' => true,
            'showScriptName' => false,
        ],
        'urlManagerEmployer' => [ //employers
            'class' => 'yii\web\UrlManager',
            'baseUrl' => 'http://employer.studenthub.co',
            'hostInfo' => 'http://employer.studenthub.co',
            'enablePrettyUrl' => true,
            'showScriptName' => false,
        ],
    ],
];
