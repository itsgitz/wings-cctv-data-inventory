#!/usr/bin/env bash

docker-compose \
    -f docker-compose.cloud.yaml \
    -p cctv-data-kiel_itsgitz_com \
    exec \
    app-web \
    php artisan db:seed
