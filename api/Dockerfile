ARG userid

FROM php:8.1-fpm-alpine3.14 as base

ARG userid

# Create user with same permissions as host and some useful stuff
RUN adduser -u $userid --disabled-password --gecos "" appuser
RUN mkdir /home/appuser/.ssh
RUN chown -R appuser:appuser /home/appuser/
RUN echo "StrictHostKeyChecking no" >> /home/appuser/.ssh/config

# Install some global packages
RUN apk add --no-cache bash git jq moreutils openssh rsync yq wget zip

# Install GD
RUN set -ex \
    && apk add --no-cache freetype-dev libjpeg-turbo-dev libpng-dev libzip-dev zlib-dev autoconf build-base \
    && docker-php-ext-configure gd --enable-gd --with-freetype --with-jpeg \
    && docker-php-ext-install gd \
    && docker-php-ext-install zip

# Install Intl
RUN set -ex \
    && apk add icu-dev \
    && docker-php-ext-configure intl && docker-php-ext-install intl

# Install PostgreSQL
#RUN apk add --no-cache postgresql-dev
RUN set -ex \
	&& apk --no-cache add postgresql-libs postgresql-dev \
	&& docker-php-ext-install pgsql pdo_pgsql \
	&& apk del postgresql-dev

# Install PCOV
RUN pecl install pcov && docker-php-ext-enable pcov

# Install opcache
RUN docker-php-ext-install opcache

# Install and update composer
RUN curl https://getcomposer.org/composer.phar -o /usr/bin/composer && chmod +x /usr/bin/composer \
    && composer self-update

COPY docker/php/php.ini /usr/local/etc/php/php.ini

FROM base as dev

# xdebug extensions
RUN pecl install xdebug \
    && docker-php-ext-enable xdebug

# Install PHP-CS-FIXER
RUN wget https://cs.symfony.com/download/php-cs-fixer-v3.phar -O php-cs-fixer \
    && chmod a+x php-cs-fixer \
    && mv php-cs-fixer /usr/local/bin/php-cs-fixer

# Config XDEBUG
COPY docker/php/xdebug.ini /usr/local/etc/php/conf.d/xdebug.ini

# cambio de puerto de php-fpm
RUN sed -i 's/9000/3009/' /usr/local/etc/php-fpm.d/zz-docker.conf

## Install Symfony binary
USER appuser
#RUN wget https://get.symfony.com/cli/installer -O - | bash
USER root
#RUN mv /home/appuser/.symfony/bin/symfony /usr/local/bin/symfony
RUN mkdir -p /appdata/www
WORKDIR /appdata/www
