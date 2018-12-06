<?php

Yii::setAlias('@common', dirname(__DIR__, 2) . DIRECTORY_SEPARATOR . 'common');
Yii::setAlias('@logs', dirname(__DIR__, 2) . DIRECTORY_SEPARATOR . 'logs');
Yii::setAlias('@i18n', dirname(__DIR__, 2) . DIRECTORY_SEPARATOR . 'i18n');
Yii::setAlias(
    '@email',
    dirname(__DIR__, 2) .
    DIRECTORY_SEPARATOR . 'common' .
    DIRECTORY_SEPARATOR . 'views' .
    DIRECTORY_SEPARATOR . 'email'
);
