#!/usr/bin/env bash

# MAINTAINER: anggit.ginanjar.dev@gmail.com

DB_HOST="cctv-data-kiel.local.db"

docker-compose -f \
    docker-compose.mariadb.yaml \
    -p $DB_HOST \
    up --build --force-recreate -d

echo "Waiting for database service ($DB_HOST) ..."
# while ! docker exec -it $DB_HOST mysqladmin ping --silent; do
#     sleep 1
# done

sleep 5
docker run --rm -it php:8 php artisan migrate
docker run --rm -it php:8 php artisan db:seed
docker run --rm -it php:8 php artisan serve
