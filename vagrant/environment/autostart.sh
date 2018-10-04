#!/usr/bin/env bash

cd /var/www/backend-application
php yii migrate --interactive=false
composer install
