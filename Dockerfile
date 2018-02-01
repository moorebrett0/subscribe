FROM php:7.2.1-fpm-alpine3.7

ARG CRAFT_CP_EMAIL
ARG CRAFT_CP_USER
ARG CRAFT_CP_PASS
ARG CRAFT_SITE_NAME
ARG CRAFT_SITE_URL

ENV CRAFT_CP_EMAIL ${CRAFT_CP_EMAIL:-admin@nobody.test}
ENV CRAFT_CP_USER ${CRAFT_CP_USER:-admin}
ENV CRAFT_CP_PASS ${CRAFT_CP_PASS:-password}
ENV CRAFT_SITE_NAME ${CRAFT_SITE_NAME:-Plugin}
ENV CRAFT_SITE_URL ${CRAFT_SITE_URL:-http://localhost}


ENV COMPOSER_ALLOW_SUPERUSER 1
ENV COMPOSER_HOME /tmp
ENV COMPOSER_VERSION 1.6.2

RUN apk update \
    && apk --no-cache add --virtual .build-deps $PHPIZE_DEPS \
    && apk --no-cache add --virtual .ext-deps freetype-dev \
        libjpeg-turbo-dev libpng-dev libxml2-dev msmtp postgresql-dev icu-dev zlib-dev \
    && docker-php-ext-install gd intl pdo_pgsql pgsql zip opcache \
    && pecl install redis xdebug \
    && docker-php-ext-enable redis \
    && docker-php-ext-enable xdebug \
    && apk del .build-deps \
    && apk --no-cache add curl git openssh \
    && curl -sSL https://getcomposer.org/installer | php -- --install-dir=/usr/bin --filename=composer --version=${COMPOSER_VERSION} \
    && apk --no-cache add nginx supervisor postgresql

RUN touch /usr/local/etc/php/php.ini \
    && echo -e "memory_limit=-1" >> /usr/local/etc/php/php.ini \
    && echo -e "[Date]\ndate.timezone = UTC" >> /usr/local/etc/php/php.ini \
    && echo -e "[Cgi]\ncgi.fix_pathinfo= 0" >> /usr/local/etc/php/php.ini

RUN sed -i "s|pm = dynamic|pm = ondemand|i" /usr/local/etc/php-fpm.d/www.conf \
    && sed -i "s|;clear_env = .*|clear_env = no|i" /usr/local/etc/php-fpm.d/www.conf \
    && sed -i "s|;pm.process_idle_timeout = 10s.*|pm.process_idle_timeout = 60s|i" /usr/local/etc/php-fpm.d/www.conf \
    && sed -i "s|user = www-data|user = nobody|i" /usr/local/etc/php-fpm.d/www.conf \
    && sed -i "s|group = www-data|group = nobody|i" /usr/local/etc/php-fpm.d/www.conf \
    && sed -i "s|listen = .*|listen = [::]:9000|i" /usr/local/etc/php-fpm.d/www.conf

RUN DOCKER_HOST_IP=$(/sbin/ip route|awk '/default/ { print $3 }') \
    && echo -e "xdebug.idekey = PHPSTORM" >> /usr/local/etc/php/conf.d/docker-php-ext-xdebug.ini \
    && echo -e "xdebug.default_enable = 0" >> /usr/local/etc/php/conf.d/docker-php-ext-xdebug.ini \
    && echo -e "xdebug.remote_enable = 1" >> /usr/local/etc/php/conf.d/docker-php-ext-xdebug.ini \
    && echo -e "xdebug.remote_port = 9000" >> /usr/local/etc/php/conf.d/docker-php-ext-xdebug.ini \
    && echo -e "xdebug.var_display_max_depth = -1" >> /usr/local/etc/php/conf.d/docker-php-ext-xdebug.ini \
    && echo -e "xdebug.var_display_max_children = -1" >> /usr/local/etc/php/conf.d/docker-php-ext-xdebug.ini \
    && echo -e "xdebug.var_display_max_data = -1" >> /usr/local/etc/php/conf.d/docker-php-ext-xdebug.ini \
    && echo -e "xdebug.max_nesting_level = 500" >> /usr/local/etc/php/conf.d/docker-php-ext-xdebug.ini \
    && echo -e "xdebug.remote_host = ${DOCKER_HOST_IP}" >> /usr/local/etc/php/conf.d/docker-php-ext-xdebug.ini
# Configure nginx
COPY config/nginx.conf /etc/nginx/nginx.conf

# Configure supervisord
COPY config/supervisord.conf /etc/supervisor/conf.d/supervisord.conf

WORKDIR /usr/src/app
# Create new craft3 project
RUN composer --no-interaction --quiet create-project craftcms/craft /usr/src/app -s beta \
    && chown -R nobody:nobody /usr/src/app \
    # Generate new security key in the .env file
    && /usr/src/app/craft setup/security-key --interactive=0 \
    # Comment out DB_* vars in the dotenv
    && sed -i 's/^DB_/#DB_/i' /usr/src/app/.env

ADD . /usr/src/plugin
# Add the plugin to the local repo and then require it
RUN composer --no-interaction --quiet config repositories.repo-name path /usr/src/plugin \
    && CRAFT_PLUGIN_NAME=$(composer config name -d /usr/src/plugin) \
    && composer --no-interaction --quiet require "${CRAFT_PLUGIN_NAME} @dev"


# Copy entrypoint
COPY docker-entrypoint /usr/local/bin/docker-entrypoint
ENTRYPOINT ["docker-entrypoint"]

EXPOSE 80 443
CMD ["/usr/bin/supervisord", "-c", "/etc/supervisor/conf.d/supervisord.conf"]

