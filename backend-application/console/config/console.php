<?php

$config = [
    'id' => 'console',
    'basePath' => dirname(__DIR__),
    'controllerNamespace' => 'console\commands',
    'aliases' => [
        '@console' => dirname(__DIR__ .  DIRECTORY_SEPARATOR . 'console', 2),
        '@tests' => 'console/tests',
    ],
    'components' => [
        'log' => [
            'targets' => [
                [
                    'class' => 'yii\log\FileTarget',
                    'levels' => ['error', 'warning'],
                ],
            ],
        ],
    ],
];

return $config;
