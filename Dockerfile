# Use official PHP 8.2 image with Apache
FROM php:8.2-apache

# Set working directory
WORKDIR /var/www/html

# Install system dependencies
RUN apt-get update && apt-get install -y \
    git unzip libzip-dev libonig-dev \
    && docker-php-ext-install pdo pdo_mysql zip \
    && a2enmod rewrite

# Copy project files
COPY . .

# Install Composer
COPY --from=composer:latest /usr/bin/composer /usr/bin/composer

# Install PHP dependencies
RUN composer install --optimize-autoloader --no-dev

# Cache Laravel configs
RUN php artisan config:cache
RUN php artisan route:cache
RUN php artisan view:cache

# Expose the port Render expects
EXPOSE 10000

# Start Laravel
CMD php artisan serve --host 0.0.0.0 --port 10000
