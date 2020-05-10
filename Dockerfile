FROM php:7-fpm

RUN docker-php-ext-install mysqli pdo_mysql

RUN apt-get update
RUN apt-get install -q -y msmtp mailutils