#!/usr/bin/env bash

DATABASE_USER='root'
DATABASE_CONTAINER='cctv-data-kiel.local.db'
DATABASE_NAME='laravel'

docker exec -it $DATABASE_CONTAINER \
    mysql -u $DATABASE_USER -p $DATABASE_NAME
