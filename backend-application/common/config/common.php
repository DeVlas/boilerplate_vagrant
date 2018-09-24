<?php

$params = require __DIR__ . DIRECTORY_SEPARATOR .'params.php';
$db =  require __DIR__ . DIRECTORY_SEPARATOR . 'db.php';

$config = [
    'id' => getenv('app_name'),
    'bootstrap' => ['log'],
    'aliases' => [
        '@models' =>  dirname(__DIR__ . '..' . DIRECTORY_SEPARATOR . 'models'),
        '@logs' => dirname(__DIR__, 2) . DIRECTORY_SEPARATOR . '/logs',
        '@bower' => '@vendor/bower-asset',
        '@npm' => '@vendor/npm-asset',
    ],
    'components' => [
        'cache' => [
            'class' => 'yii\caching\FileCache',
        ],
        'user' => [
            'class' => \common\models\User::class,
        ],
        'errorHandler' => [

        ],
        'mailer' => [
            'class' => 'yii\swiftmailer\Mailer',
            // send all mails to a file by default. You have to set
            // 'useFileTransport' to false and configure a transport
            // for the mailer to send real emails.
            'useFileTransport' => true,
        ],
        'log' => [
            'traceLevel' => getenv('log_level'),
            'flushInterval' => 100,
        ],
        'db' => $db
    ],
    'params' => $params,
];

if (YII_ENV === 'development') {
    // configuration adjustments for 'dev' environment
    $config['bootstrap'][] = 'debug';
    $config['modules']['debug'] = [
        'class' => 'yii\debug\Module',
        // uncomment the following to add your IP if you are not connecting from localhost.
        //'allowedIPs' => ['127.0.0.1', '::1'],
    ];

    $config['bootstrap'][] = 'gii';
    $config['modules']['gii'] = [
        'class' => 'yii\gii\Module',
        // uncomment the following to add your IP if you are not connecting from localhost.
        //'allowedIPs' => ['127.0.0.1', '::1'],
    ];
}

return $config;
