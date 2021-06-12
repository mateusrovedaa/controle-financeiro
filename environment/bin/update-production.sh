#!/bin/bash

docker rm --force app && docker run -p 80:8181 -d --name app --network producao_gcs registry.gitlab.com/mateusrovedaa/gcs-controle-financeiro
docker cp /home/univates/producao/.env app:/app/.env
docker exec app bash -c "yes | php artisan migrate"