#!/bin/bash

docker run --detach --restart always \
  --name bigotes \
  --label 'traefik.frontend.rule=Host:cms.bigot.es' \
  --env-file $(pwd)/env/bigotes.env \
  --volume $(pwd)/context/wp-content/themes/:/var/www/html/wp-content/themes \
  eu.gcr.io/bigotes-pro/cms.bigot.es:dev
