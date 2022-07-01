#!/usr/bin/env bash

PROJECT_NAME="cctv-data-kiel_itsgitz_com"
DOCKER_PROJECT_DIRECTORY="/var/www/cctv-data-kiel.itsgitz.com/"

# Installing node packages
docker run -it --rm \
    -v "${PWD}/:$DOCKER_PROJECT_DIRECTORY" \
    -w="$DOCKER_PROJECT_DIRECTORY" \
    node:lts-slim \
    npm install


# Build assets
docker run -it --rm \
    -v "${PWD}/:$DOCKER_PROJECT_DIRECTORY" \
    -w="$DOCKER_PROJECT_DIRECTORY" \
    node:lts-slim \
    npm run prod
