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
        getenv('dbhost'),
        getenv('dbport'),
        getenv('dbname')
    ),
    'username' => getenv('dbusername'),
    'password' => getenv('dbpassword'),
    'charset' => 'utf8',
], $dbOptions);
