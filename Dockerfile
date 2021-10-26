FROM php:7.2-fpm

RUN docker-php-ext-install mysqli && docker-php-ext-enable mysqli

RUN apt-get update && apt-get upgrade -y
RUN mv "$PHP_INI_DIR/php.ini-production" "$PHP_INI_DIR/php.ini"