FROM bash:5.0 as wp-plugins

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

FROM wordpress:5.2 as wp

COPY --chown=www-data wp-content /var/www/html/wp-content
COPY --from=wp-plugins --chown=www-data /tmp/wp-plugins /var/www/html/wp-content/plugins/

RUN { mv $PHP_INI_DIR/php.ini-production $PHP_INI_DIR/php.ini; \
		echo 'opcache.memory_consumption=64'; \
		echo 'opcache.max_accelerated_files=4000'; \
		echo 'opcache.revalidate_freq=10'; \
	} > /usr/local/etc/php/conf.d/opcache-recommended.ini
