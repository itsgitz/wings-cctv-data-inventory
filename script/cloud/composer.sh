#!/usr/bin/env bash

PROJECT_NAME="cctv-data-kiel_itsgitz_com"

docker compose \
    -f docker-compose.cloud.yaml \
    -p $PROJECT_NAME \
    exec \
    app-web \
    composer install
