#!/usr/bin/env bash

PROJECT_NAME="cctv-data-kiel_local_db"

docker-compose -f \
    docker-compose.local.yaml \
    -p $PROJECT_NAME \
    down -v; \
    docker system prune -f
