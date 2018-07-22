#!/usr/bin/env bash

DB_NAME=drug
DB_USER=druguser
DB_PASSWORD=druguser123

psql -U postgres -c "DROP DB IF NOT EXIST \"${DB_NAME}\""
psql -U postgres -c "CREATE DB \"${DB_NAME}\" ENCODING = 'UTF8' TEMPLATE=template0"

cp /home/vagrant/htdocs/.env.example /home/vagrant/htdocs/.env

#composer setup
composer config -g github-oauth.github.com '45d0a6c7a69b653bbd79e3c496a59242a7fbc0bf'
