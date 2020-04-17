FROM php:7.2-apache
COPY php.ini /usr/local/etc/php/
COPY *.conf /etc/apache2/sites-enabled/
RUN  a2enmod rewrite

# For composer
RUN apt-get update \
    && apt-get install -y zlib1g-dev \
    && apt-get install -y unzip \
    && docker-php-ext-install zip

# Install composer
RUN curl -sS https://getcomposer.org/installer | php \
    && mv composer.phar /usr/local/bin/composer \
    && composer self-update

# Set composer environment
ENV COMPOSER_ALLOW_SUPERUSER 1
ENV COMPOSER_HOME /composer
ENV PATH $PATH:/composer/vendor/bin

# Install laravel installer
RUN composer global require "laravel/installer"

#for redis
RUN apt-get update && pecl install redis-4.3.0 \
    && docker-php-ext-enable redis

#session
RUN docker-php-ext-install session

WORKDIR /var/www

RUN rm -rf html

RUN mkdir movies

# PHP's DB setting
RUN apt-get update \
    && apt-get install -y libpq-dev \
    && docker-php-ext-install pdo_mysql \
    && apt-get install -y vim
