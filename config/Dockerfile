FROM php:8.2-fpm-bullseye

RUN apt-get update && apt-get install -y zip unzip p7zip-full

RUN docker-php-ext-install pdo_mysql

COPY --from=composer:latest /usr/bin/composer /usr/local/bin/composer

