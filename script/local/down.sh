#!/usr/bin/env bash

DB_HOST="cctv-data-kiel.local.db"

docker-compose -f \
    docker-compose.mariadb.yaml \
    -p $DB_HOST \
    down -v; \
    docker system prune -f
