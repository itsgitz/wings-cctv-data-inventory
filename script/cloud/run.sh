#!/usr/bin/env bash

# MAINTAINER: anggit.ginanjar.dev@gmail.com

#!/usr/bin/env bash

echo "[*] Run the services on Cloud (Production) ..."

DOCKER_BUILDKIT=1 \
    docker-compose -f docker-compose.cloud.yaml \
    -p cctv-data-kiel_itsgitz_com \
    up --build --force-recreate -d

echo "[*] Run Composer Install ..."
./script/cloud/composer.sh

echo "[*] Clear Cache ..."
./script/cloud/cache.sh

echo "[*] Waiting MariaDB ..."
sleep 5

echo "[*] Run DB Migration ..."
./script/cloud/migrations.sh

echo "[*] Run DB Seeding ..."
./script/cloud/seed.sh

echo "[*] Run Storage Linking ..."
./script/cloud/storage.sh

echo "[*] Change folder's permissions for storage and vendor ..."
chmod 777 -Rv vendor storage
