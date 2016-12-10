FROM php:5.6-apache
MAINTAINER Laury Bueno <laury.bueno@gmail.com>

RUN docker-php-ext-install mysql mysqli pdo pdo_mysql

COPY ./ /var/www/html/
