#!/usr/bin/env bash

PROJECT_NAME="cctv-data-kiel_itsgitz_com"

DOCKER_BUILDKIT=1 \
    docker compose -f docker-compose.cloud.yaml \
    -p $PROJECT_NAME \
    down -v

docker system prune -f
