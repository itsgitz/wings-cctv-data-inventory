#!/usr/bin/env bash

PROJECT_NAME="cctv-data-kiel_itsgitz_com"

docker compose \
    -f docker-compose.cloud.yaml \
    -p $PROJECT_NAME \
    exec \
    app-web \
    php artisan optimize:clear

docker compose \
    -f docker-compose.cloud.yaml  \
    -p $PROJECT_NAME  \
    exec \
    app-web \
    php artisan config:cache

docker compose \
    -f docker-compose.cloud.yaml  \
    -p $PROJECT_NAME \
    exec \
    app-web \
    php artisan route:cache


docker compose \
    -f docker-compose.cloud.yaml  \
    -p $PROJECT_NAME \
    exec \
    app-web \
    php artisan view:cache
