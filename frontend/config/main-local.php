<?php

$config = [
    'homeUrl' => '/',
    'components' => [
        'request' => [
            'baseUrl' => '',
            'cookieValidationKey' => '6XZr8wRMUzI4hzSY5ynIj9da-aTpmT-l',
        ],
        'urlManager' => [
            'class' => 'yii\web\UrlManager',
            'showScriptName' => false,
            'enablePrettyUrl' => true,
            'rules' => [
                ['class' => 'yii\rest\UrlRule', 'controller' => 'project'],
                ['class' => 'yii\rest\UrlRule', 'controller' => 'subscribe'],
                '<controller:\w+>/<id:\d+>' => '<controller>/view',
                '<controller:\w+>/<action:\w+>/<id:\d+>' => '<controller>/<action>',
                '<controller:\w+>/<action:\w+>' => '<controller>/<action>',
            ],
        ],
    ],
];

if (!YII_ENV_TEST) {
    // configuration adjustments for 'dev' environment
    $config['bootstrap'][] = 'debug';
    $config['modules']['debug'] = 'yii\debug\Module';

    $config['bootstrap'][] = 'gii';
//    $config['modules']['gii'] = 'yii\gii\Module';

    $config['modules']['gii'] = [
        'class' => \yii\gii\Module::className(),
        'allowedIPs' => ['*']
    ];
}

return $config;
