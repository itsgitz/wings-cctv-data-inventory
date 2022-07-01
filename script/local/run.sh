#!/usr/bin/env bash

php -v

if [ $? != 0 ]; then
    echo "PHP command is not installed!"
    exit 0
fi

composer --version

if [ $? != 0 ]; then
    echo "Composer command is not installed!"
    exit 0
fi

DB_HOST="cctv-data-kiel.local.db"
PROJECT_NAME="cctv-data-kiel_local_db"

docker-compose -f \
    docker-compose.local.yaml \
    -p $PROJECT_NAME \
    up --build --force-recreate -d

echo "Waiting for database service ($DB_HOST) ..."

sleep 7
php artisan storage:link
php artisan migrate
php artisan db:seed
php artisan serve
