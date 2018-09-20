<?php

$config = [
    'basePath' => dirname(__DIR__),
    'controllerNamespace' => 'console/commands',
    'aliases' => [
        '@console' => dirname(__DIR__ . '..' . DIRECTORY_SEPARATOR . 'console'),
        '@tests' => '@console/tests',
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
    /*
    'controllerMap' => [
        'fixture' => [ // Fixture generation command line.
            'class' => 'yii\faker\FixtureController',
        ],
    ],
    */
];

return $config;
