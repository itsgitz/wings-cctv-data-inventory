#!/usr/bin/env bash

echo "[*] Run the services on Cloud (Production) ..."

PROJECT_NAME="cctv-data-kiel_itsgitz_com"

DOCKER_BUILDKIT=1 \
    docker compose -f docker-compose.cloud.yaml \
    -p $PROJECT_NAME \
    up --build --force-recreate -d

echo "[*] Install and building assets ..."
./script/cloud/npm.sh

echo "[*] Run Composer Install ..."
./script/cloud/composer.sh

echo "[*] Installing npm packages ..."
./script/cloud/npm.sh

echo "[*] Clear Cache ..."
./script/cloud/cache.sh

echo "[*] Waiting MariaDB ..."
sleep 5

echo "[*] Run DB Migration ..."
./script/cloud/migration.sh

echo "[*] Run DB Seeding ..."
./script/cloud/seed.sh

echo "[*] Run Storage Linking ..."
./script/cloud/storage.sh

echo "[*] Change folder's permissions for storage and vendor ..."
chmod 777 -Rv vendor storage

