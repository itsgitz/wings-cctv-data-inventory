#!/usr/bin/env bash

docker-compose \
    -f docker-compose.cloud.yaml \
    -p cctv-data-kiel_itsgitz_com \
    exec \
    web \
    php artisan optimize:clear

docker-compose \
    -f docker-compose.cloud.yaml  \
    -p cctv-data-kiel_itsgitz_com  \
    exec \
    web \
    php artisan config:cache

docker-compose \
    -f docker-compose.cloud.yaml  \
    -p cctv-data-kiel_itsgitz_com \
    exec \
    web \
    php artisan route:cache


docker-compose \
    -f docker-compose.cloud.yaml  \
    -p cctv-data-kiel_itsgitz_com \
    exec \
    web \
    php artisan view:cache
