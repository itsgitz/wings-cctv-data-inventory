#!/usr/bin/env bash

REDIS_CONTAINER='cctv-data-kiel.local.redis'

docker exec -it $REDIS_CONTAINER \
    redis-cli
