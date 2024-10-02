
FROM php:8.1-apache

#  PHP-расширения и Composer
RUN apt-get update && apt-get install -y \
    libicu-dev \
    libzip-dev \
    zip \
    unzip \
    git \
    && docker-php-ext-install intl pdo pdo_mysql mysqli

# Composer
COPY --from=composer:latest /usr/bin/composer /usr/bin/composer


COPY ./src /var/www/html

# права доступа
RUN chown -R www-data:www-data /var/www/html

# для работы с URL в Apache
RUN a2enmod rewrite
