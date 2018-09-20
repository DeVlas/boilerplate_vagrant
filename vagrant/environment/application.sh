#!/usr/bin/env bash

DB_NAME=drug
DB_USER=druguser
DB_PASSWORD=druguser123

psql -U postgres -c "DROP DATABASE IF EXISTS \"${DB_NAME}\""
psql -U postgres -c "CREATE DATABASE \"${DB_NAME}\" ENCODING = 'UTF8' TEMPLATE=template0"
psql -U postgres -c "CREATE USER \"${DB_USER}\" WITH PASSWORD '${DB_PASSWORD}'"
psql -U postgres -c "GRANT ALL PRIVILEGES ON DATABASE  \"${DB_NAME}\" to  \"${DB_USER}\""
cp /home/vagrant/htdocs/.env.example /home/vagrant/htdocs/.env

#composer setup
composer config -g github-oauth.github.com '45d0a6c7a69b653bbd79e3c496a59242a7fbc0bf'
composer global require "fxp/composer-asset-plugin:^1.2.0"
