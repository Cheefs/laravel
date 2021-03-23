FROM php:8.0-fpm

RUN apt-get update && \
    apt-get install -y --no-install-recommends libssl-dev zlib1g-dev curl git unzip netcat libxml2-dev libpq-dev libzip-dev libpng-dev && \
    pecl install apcu xdebug redis && \
    docker-php-ext-install mysqli pdo pdo_mysql tokenizer xml pcntl zip opcache intl gd && \
    docker-php-ext-enable apcu pdo_mysql sodium xdebug redis && \
    apt-get clean && rm -rf /var/lib/apt/lists/* /tmp/* /var/tmp/*

WORKDIR /var/www

COPY composer.lock composer.json /var/www/
RUN curl -sS https://getcomposer.org/installer | php -- --install-dir=/usr/local/bin --filename=composer

RUN groupadd -g 1000 www
RUN useradd -u 1000 -ms /bin/bash -g www www

COPY . /var/www

COPY --chown=www:www . /var/www

USER www

EXPOSE 9000
CMD ["php-fpm"]
