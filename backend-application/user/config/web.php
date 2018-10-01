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
                Yii::info('сообщение от перед отправкой', 'response');
            },
        ],
        'errorHandler' => [
            'class' => common\components\ErrorHandler::class,
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
            'rules' => $routes,
        ],

    ],
    'params' => [
        'acceptableLanguages' => [
            'ru',
            'en',
        ]
    ],
    'on beforeRequest' => function ($event) {
    // перенеси всю локгику в сервис по языкам
        var_dump(Yii::$app->request->headers['x-language']);die;
        if ()
        foreach (Yii::$app->request->getAcceptableLanguages() as $language) {
            if (in_array(Yii::$app->params['acceptableLanguages'], $language)) {
                Yii::$app->language =$language;
                break;
            }
        }
        var_dump(Yii::$app->request->getAcceptableLanguages());die;

    },
];

return $config;
