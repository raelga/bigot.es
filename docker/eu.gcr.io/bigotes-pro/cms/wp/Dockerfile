FROM wordpress:5.3.2-php7.4-fpm-alpine as wp

USER www-data
WORKDIR /usr/src/wordpress/wp-content

# Clean up unused plugins and themes
RUN rm -R plugins/akismet themes/twenty*

# Copy custom wp-content
COPY --chown=www-data wp-content/ .

# Copy plugin list
ADD plugins.list /tmp/plugins.list

RUN grep tar.gz /tmp/plugins.list | \
  while read plugin || [ -n "$plugin" ]; do \
  curl -sqL $plugin | tar zx -C plugins/ \
  && echo "Plugin $plugin downloaded."; \
  done

RUN grep zip /tmp/plugins.list | \
  while read plugin || [ -n "$plugin" ]; do \
  curl -sqL $plugin | busybox unzip -q -d plugins/ - \
  && echo "Plugin $plugin downloaded."; \
  done

ADD themes.list /tmp/themes.list

RUN grep tar.gz /tmp/themes.list | \
  while read theme || [ -n "$theme" ]; do \
  curl -sqL $theme | tar zx -C themes/ \
  && echo "Theme $theme downloaded."; \
  done

RUN grep zip /tmp/themes.list | \
  while read theme || [ -n "$theme" ]; do \
  curl -sqL $theme | busybox unzip -q -d themes/ - \
  && echo "Theme $theme downloaded."; \
  done

RUN mkdir -p languages \
  && curl -sqL 'https://translate.wordpress.org/projects/wp/dev/es/default/export-translations/?format=po' -o languages/es_ES.po \
  && curl -sqL 'https://translate.wordpress.org/projects/wp/dev/es/default/export-translations/?format=mo' -o languages/es_ES.mo

WORKDIR /var/www/html