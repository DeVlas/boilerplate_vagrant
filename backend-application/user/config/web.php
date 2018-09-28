<?php

$routes = require __DIR__ . '/routes.php';
$config = [
    'id' => 'user',
    'language' => 'en',
    'timeZone' => 'Europe/Moscow',
    'layout' => false,
    'basePath' => dirname(__DIR__),
    'controllerNamespace' => 'user\controllers',
    'bootstrap' => [],
    'aliases' => [
        '@user' => dirname(__DIR__ . DIRECTORY_SEPARATOR . 'user', 2),
        '@bower' => '@vendor/bower-asset',
        '@npm' => '@vendor/npm-asset',
    ],
    'components' => [
        'request' => [
            'parsers' => [
                'application/json' => 'yii\web\JsonParser',
            ],
            'enableCookieValidation' => false,
            'enableCsrfValidation' => false,
            'baseUrl' => '/user',
        ],
        'response' => [
            'class' => yii\web\Response::class,
            'on beforeSend' => function ($event) {
                Yii::info('сообщение от перед отправкой' ,'response');
            }
        ],
        'log' => [
            'targets' => [
                [
                    'class' => 'yii\log\FileTarget',
                    'logFile' => '@logs/response.log',
                    'categories' => ['response'],
                    'enableRotation' => true,
                    'levels' => ['info'],
                    'logVars' => [], //_SERVER, _POST, __FILES, __COOKIES
                ],
            ],
        ],
        'urlManager' => [
            'enablePrettyUrl' => true,
            'showScriptName' => false,
            'enableStrictParsing' => true,
            'baseUrl' => '/user',
            'rules' => $routes
        ],

    ],
    'params' => [],
    'on afterRequest' => function ($event) {
    }
];

return $config;
