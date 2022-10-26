FROM php:8.0.3-apache
RUN docker-php-ext-install mysqli \
    pdo_mysql \
    && a2enmod \
    rewrite

COPY --from=composer /usr/bin/composer /usr/bin/composer

# Install unzip utility and libs needed by zip PHP extension
RUN apt-get update && apt-get install -y \
    zlib1g-dev \
    libzip-dev \
    unzip
RUN docker-php-ext-install zip






