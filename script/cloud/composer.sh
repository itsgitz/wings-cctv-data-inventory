#!/usr/bin/env bash

docker-compose \
    -f docker-composer.cloud.yaml \
    -p cctv-data-kiel_itsgitz_com \
    exec \
    web \
    composer install
