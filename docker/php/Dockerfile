FROM php:7.4.1-fpm

RUN apt-get update && \
    apt-get upgrade -y && \
    apt-get install -y git && \
    apt-get install -y libzip-dev && \
    docker-php-ext-install pcntl && \
    pecl install xdebug && \
    docker-php-ext-install zip && \
    docker-php-ext-install zip && \
    docker-php-ext-enable xdebug zip

RUN curl -sS https://getcomposer.org/installer | php -- --install-dir=/usr/local/bin --filename=composer

CMD ["php-fpm"]