FROM php:8.1-fpm

# Install system deps and PHP extensions commonly needed
RUN apt-get update && apt-get install -y \
    git unzip libzip-dev libonig-dev libsqlite3-dev \
    && docker-php-ext-install pdo_mysql pdo_sqlite mbstring zip

# Install composer
COPY --from=composer:2 /usr/bin/composer /usr/bin/composer

WORKDIR /var/www/html

# Set user and permissions safely
RUN useradd -o -u 1000 -g www-data -m developer || true
RUN chown -R developer:www-data /var/www/html

# Set git safe directory to avoid permission issues
RUN git config --global --add safe.directory /var/www/html

USER developer

EXPOSE 9000

CMD ["php-fpm"]
