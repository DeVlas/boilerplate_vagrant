<?php
$dbOptions = [];
if (getenv('env') === 'production') {
    $dbOptions = [
        'enableSchemaCache' => true,
        'schemaCacheDuration' => 60,
        'schemaCache' => 'cache',
    ];
}

return array_merge([
    'class' => 'yii\db\Connection',
    'dsn' => sprintf('pgsql:host=%s;port=%s;dbname=%s',
        getenv('host'),
        getenv('port'),
        getenv('dbname')
    ),
    'username' => getenv('username'),
    'password' => getenv('password'),
    'charset' => 'utf8',
], $dbOptions);
