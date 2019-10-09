FROM php:7.3-fpm
RUN apt-get update && apt-get install -y \
        git \
        libfreetype6-dev \
        libjpeg62-turbo-dev \
        libpng-dev \
        libmemcached-dev \
        libicu-dev \
        libxml2-dev

RUN docker-php-ext-configure intl \
    && docker-php-ext-install intl

RUN pecl install xdebug \
    && docker-php-ext-enable xdebug

RUN docker-php-ext-configure gd --with-freetype-dir=/usr/include/ --with-jpeg-dir=/usr/include/ \
    && docker-php-ext-install -j$(nproc) gd

RUN docker-php-ext-install pdo_mysql

RUN pecl install memcached \
	&& docker-php-ext-enable memcached

RUN docker-php-ext-install soap

RUN curl --silent --show-error https://getcomposer.org/installer | \
    php -- --install-dir=/usr/bin/ --filename=composer && \
    composer global require hirak/prestissimo && \
    composer clear-cache

WORKDIR /app

CMD ["php-fpm"]