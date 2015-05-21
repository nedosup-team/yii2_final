<?php

$config = [
    'homeUrl' => '/',
    'components' => [
        'request' => [
            'baseUrl' => '',
            'cookieValidationKey' => '6XZr8wRMUzI4hzSY5ynIj9da-aTpmT-l',
        ],
        'urlManager' => [
            'enablePrettyUrl' => true,
            'showScriptName' => false,
        ],
    ],
];

if (!YII_ENV_TEST) {
    // configuration adjustments for 'dev' environment
    $config['bootstrap'][] = 'debug';
    $config['modules']['debug'] = 'yii\debug\Module';

    $config['bootstrap'][] = 'gii';
    $config['modules']['gii'] = 'yii\gii\Module';
}

return $config;
