FROM php:7.3-fpm

RUN apt-get update
RUN apt-get install -y unzip git nano bash libcurl4-openssl-dev pkg-config libssl-dev zlib1g-dev

RUN pecl install xdebug
RUN docker-php-ext-enable xdebug

RUN curl -sS https://getcomposer.org/installer | php -- --install-dir=/usr/local/bin --filename=composer

COPY conf.d/php.ini /usr/local/etc/php/conf.d/docker_php.ini

WORKDIR /var/www
