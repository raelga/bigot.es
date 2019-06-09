#!/bin/bash
BASE_PATH="$(dirname $(readlink -f $0))"

docker stop bigotes; docker rm bigotes;

docker run --detach --restart always \
  --name bigotes \
  --label 'traefik.frontend.rule=Host:cms.bigot.es' \
  --env-file ${BASE_PATH}/env/bigotes.env \
  --volume ${BASE_PATH}/context/wp-content/themes/envo-magazine-bigotes:/var/www/html/wp-content/themes/envo-magazine-bigotes \
  eu.gcr.io/bigotes-pro/cms.bigot.es:dev
