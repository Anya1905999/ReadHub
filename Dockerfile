FROM composer:2 AS vendor

WORKDIR /app

COPY composer.json composer.lock ./
RUN composer install \
    --no-dev \
    --no-interaction \
    --no-progress \
    --prefer-dist \
    --optimize-autoloader

FROM node:22-alpine AS styles

WORKDIR /app

COPY package.json ./
RUN npm install --no-audit --no-fund

COPY resources/scss ./resources/scss
RUN npm run build:css

FROM php:8.4-apache

RUN docker-php-ext-install -j"$(nproc)" pdo_mysql \
    && a2enmod rewrite \
    && mv "$PHP_INI_DIR/php.ini-production" "$PHP_INI_DIR/php.ini"

WORKDIR /var/www/html

COPY docker/apache-vhost.conf /etc/apache2/sites-available/000-default.conf
COPY --chown=www-data:www-data . .
COPY --from=vendor --chown=www-data:www-data /app/vendor ./vendor
COPY --from=styles --chown=www-data:www-data /app/public/assets/css/main.css ./public/assets/css/main.css
