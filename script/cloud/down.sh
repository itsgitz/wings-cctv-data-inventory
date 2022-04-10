#!/usr/bin/env bash


DOCKER_BUILDKIT=1 \
    docker-compose -f docker-compose.cloud.yaml \
    -p cctv-data-kiel_itsgitz_com \
    down -v

docker system prune -f
