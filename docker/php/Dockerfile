FROM php:8.2-fpm

RUN apt-get -y update
RUN apt-get install -y --fix-missing  \
git \
wget \ 
vim \
zip \
unzip \
openssl \
libssl-dev \
libcurl4-openssl-dev

RUN pecl install mongodb && docker-php-ext-enable mongodb
RUN curl -sS https://getcomposer.org/installer | php -- --install-dir=/usr/local/bin --filename=composer

# WORKDIR /var/www/html