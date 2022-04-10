#!/usr/bin/env bash

docker-compose \
    -f docker-compose.cloud.yaml \
    -p cctv-data-kiel_itsgitz_com \
    exec \
    web \
    php artisan storage:link
