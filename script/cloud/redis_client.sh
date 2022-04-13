#!/usr/bin/env bash

REDIS_CONTAINER='cctv-data-kiel.prod.redis'

docker exec -it $REDIS_CONTAINER \
    redis-cli
