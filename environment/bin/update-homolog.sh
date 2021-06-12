#!/bin/bash

docker pull registry.gitlab.com/mateusrovedaa/gcs-controle-financeiro
docker rm --force app-homolog && docker run -p 81:8181 -d --name app-homolog --network homologacao_gcs-homolog registry.gitlab.com/mateusrovedaa/gcs-controle-financeiro
docker cp /home/univates/homologacao/.env app-homolog:/app/.env
docker exec app-homolog php artisan migrate