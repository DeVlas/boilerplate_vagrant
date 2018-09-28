<?php
// comment out the following two lines when deployed to production
defined('YII_DEBUG') or define('YII_DEBUG', (bool)getenv('debug'));
defined('YII_ENV') or define('YII_ENV', getenv('environment'));

require __DIR__ . '/../../vendor/autoload.php';
require __DIR__ . '/../../vendor/yiisoft/yii2/Yii.php';

$dotEnv = new Dotenv\Dotenv(__DIR__ . DIRECTORY_SEPARATOR . '../..');
$dotEnv->load();

$config = require dirname(__DIR__) . '/config/web.php';

(new yii\web\Application(yii\helpers\ArrayHelper::merge(
    require dirname(__DIR__, 2) . '/common/config/common.php',
    require dirname(__DIR__) . '/config/web.php'
)))->run();

