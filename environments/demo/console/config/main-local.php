<?php
return [
    'components' => [
        'urlManager' => [ //students
            'class' => 'yii\web\UrlManager',
            'baseUrl' => 'studenthubdemo.co',
            'hostInfo' => 'studenthubdemo.co',
            'enablePrettyUrl' => true,
            'showScriptName' => false,
        ],
        'urlManagerEmployer' => [ //employers
            'class' => 'yii\web\UrlManager',
            'baseUrl' => 'employer.studenthubdemo.co',
            'hostInfo' => 'employer.studenthubdemo.co',
            'enablePrettyUrl' => true,
            'showScriptName' => false,
        ],
    ],
];
