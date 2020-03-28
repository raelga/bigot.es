FROM bash:5.0 as wp-content

ADD plugins.list /tmp/wp-plugins/plugins.list

RUN while read plugin || [ -n "$plugin" ]; do \
  echo echo ${plugin} | grep -q 'tar.gz' \
  && wget -q -O - ${plugin} | tar zx -C /tmp/wp-plugins \
  ||  { \
  apk add unzip; \
  wget -q -O - ${plugin} | busybox unzip -q -d /tmp/wp-plugins -; \
  } \
  && echo "Plugin ${plugin} downloaded."; \
  done < /tmp/wp-plugins/plugins.list

ADD themes.list /tmp/wp-themes/themes.list

RUN while read theme || [ -n "$theme" ]; do \
  echo echo ${theme} | grep -q 'tar.gz' \
  && wget -q -O - ${theme} | tar zx -C /tmp/wp-themes \
  ||  { \
  apk add unzip; \
  wget -q -O - ${theme} | busybox unzip -q -d /tmp/wp-themes -; \
  } \
  && echo "Theme ${theme} downloaded."; \
  done < /tmp/wp-themes/themes.list

RUN mkdir -p /tmp/wp-languages \
  && wget -q 'https://translate.wordpress.org/projects/wp/dev/es/default/export-translations/?format=po' -O /tmp/wp-languages/es_ES.po \
  && wget -q 'https://translate.wordpress.org/projects/wp/dev/es/default/export-translations/?format=mo' -O /tmp/wp-languages/es_ES.mo

FROM wordpress:5.3 as wp

COPY --chown=www-data wp-content /var/www/html/wp-content
COPY --from=wp-content --chown=www-data /tmp/wp-plugins /var/www/html/wp-content/plugins/
COPY --from=wp-content --chown=www-data /tmp/wp-themes /var/www/html/wp-content/themes/
COPY --from=wp-content --chown=www-data /tmp/wp-languages /var/www/html/wp-content/languages/

RUN { mv $PHP_INI_DIR/php.ini-production $PHP_INI_DIR/php.ini; \
  echo 'opcache.memory_consumption=64'; \
  echo 'opcache.max_accelerated_files=4000'; \
  echo 'opcache.revalidate_freq=10'; \
  } > /usr/local/etc/php/conf.d/opcache-recommended.ini
