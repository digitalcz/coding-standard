FROM php:8.1-cli-alpine

# APK system deps
RUN apk update && apk add --no-cache \
    $PHPIZE_DEPS \
    git \
    bash \
    linux-headers

# Xdebug
RUN pecl install xdebug-3.2.1
RUN docker-php-ext-enable xdebug

# Composer
COPY --from=composer:2.0 /usr/bin/composer /usr/bin/composer

# Clear
RUN rm -rf \
    /var/cache/apk/* \
    /tmp/pear

WORKDIR /srv/app
