#!/usr/bin/env bash

ROOT_DIRECTORY="/var/www/cctv-data-kiel.itsgitz.com"

# Install NPM packages
docker run -it --rm \
	-v "${PWD}:$ROOT_DIRECTORY" \
	-w "$ROOT_DIRECTORY" \
	node:lts-slim npm install

# Build assets
docker run -it --rm \
	-v "${PWD}:$ROOT_DIRECTORY" \
	-w "$ROOT_DIRECTORY" \
	node:lts-slim npm run prod
