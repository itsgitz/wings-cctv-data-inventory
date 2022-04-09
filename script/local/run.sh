#!/usr/bin/env bash

# MAINTAINER: anggit.ginanjar.dev@gmail.com

DB_HOST="cctv-data-kiel.local.db"

docker-compose -f \
    docker-compose.mariadb.yaml \
    -p $DB_HOST \
    up --build --force-recreate -d

echo "Waiting for database service ($DB_HOST) ..."
while ! docker exec -it $DB_HOST mysqladmin ping --silent; do
    sleep 1
done

sleep 3
php artisan migrate
php artisan db:seed
php artisan serve
