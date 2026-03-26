FROM php:8.3.6-fpm-alpine3.19

ARG UID
ARG GID

RUN addgroup -S app -g $GID && adduser -S app -G app -u $UID

RUN php -r "copy('https://getcomposer.org/installer', 'composer-setup.php');" \
    && php composer-setup.php --2.7.2 \
    && php -r "unlink('composer-setup.php');" \
    && mv composer.phar /usr/local/bin/composer

RUN apk --update --no-cache add  \
    $PHPIZE_DEPS \
    git \
    libpq-dev \
    linux-headers \
    && pecl install amqp-2.1.2 redis-6.0.2 \
    && docker-php-ext-install pdo_pgsql sockets \
    && docker-php-ext-enable amqp redis \
    && apk del $PHPIZE_DEPS

USER app

WORKDIR /opt/app

ENTRYPOINT ["php-fpm"]
