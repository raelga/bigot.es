FROM wordpress:5.3 as wp

RUN set -eux; \
  apt-get update; \
  apt-get install -y --no-install-recommends busybox unzip; \
  rm -rf /var/lib/apt/lists/*

USER www-data
WORKDIR /usr/src/wordpress/wp-content

# Clean up unused plugins and themes
RUN rm -R plugins/akismet themes/twenty*

# Copy custom wp-content
COPY --chown=www-data wp-content/ .

# Copy plugin list
ADD plugins.list /tmp/plugins.list

RUN while read plugin || [ -n "$plugin" ]; do \
  echo ${plugin} | grep -q 'tar.gz' \
  && { curl -sqL ${plugin} | tar zx -C plugins/; } \
  || { curl -sqL ${plugin} | busybox unzip -q -d plugins/ -; } \
  && { echo "Plugin ${plugin} downloaded."; } \
  done < /tmp/plugins.list

ADD themes.list /tmp/themes.list

RUN while read theme || [ -n "$theme" ]; do \
  echo ${theme} | grep -q 'tar.gz' \
  && { curl -sqL ${theme} | tar zx -C themes/; } \
  || { curl -sqL ${theme} | busybox unzip -q -d themes/ -; } \
  && { echo "Theme ${theme} downloaded."; } \
  done < /tmp/themes.list

RUN mkdir -p languages \
  && curl -sqL 'https://translate.wordpress.org/projects/wp/dev/es/default/export-translations/?format=po' -o languages/es_ES.po \
  && curl -sqL 'https://translate.wordpress.org/projects/wp/dev/es/default/export-translations/?format=mo' -o languages/es_ES.mo

USER root
WORKDIR /var/www/html