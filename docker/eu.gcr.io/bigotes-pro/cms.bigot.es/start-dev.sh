#!/bin/bash
BASE_PATH="$(dirname $(readlink -f $0))"

docker stop dev.bigot.es; docker rm dev.bigot.es;

docker run --detach --restart always \
  --name dev.bigot.es \
  --label 'traefik.frontend.rule=Host:cms.bigot.es' \
  --env-file ${BASE_PATH}/env/bigotes.env \
  --volume ${BASE_PATH}/context/wp-content/themes/envo-magazine-bigotes:/var/www/html/wp-content/themes/envo-magazine-bigotes \
  --volume ${BASE_PATH}/context/wp-content/themes/bigotes:/var/www/html/wp-content/themes/bigotes \
  eu.gcr.io/bigotes-pro/cms.bigot.es:dev
