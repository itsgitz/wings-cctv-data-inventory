#!/usr/bin/env bash

# MAINTAINER: anggit.ginanjar.dev@gmail.com

DB_HOST="cctv-data-kiel.local.db"
PROJECT_NAME="cctv-data-kiel_local_db"

docker-compose -f \
    docker-compose.local.yaml \
    -p $PROJECT_NAME \
    up --build --force-recreate -d

echo "Waiting for database service ($DB_HOST) ..."

sleep 5
php artisan migrate
php artisan db:seed
php artisan serve
