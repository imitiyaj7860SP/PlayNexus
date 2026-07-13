# Stage 1: Build frontend assets
FROM node:20 AS frontend
WORKDIR /app
COPY package*.json ./
RUN npm install
COPY . .
RUN npm run build
# Stage 2: PHP application
FROM php:8.2-apache
# Install system dependencies and PHP extensions
RUN apt-get update && apt-get install -y \
    libpq-dev \
    libzip-dev \
    unzip \
    git \
    && docker-php-ext-install pdo pdo_pgsql pgsql zip \
    && a2enmod rewrite
# Set Apache document root to Laravel's public folder
ENV APACHE_DOCUMENT_ROOT=/var/www/html/public
RUN sed -ri -e 's!/var/www/html!${APACHE_DOCUMENT_ROOT}!g' /etc/apache2/sites-available/*.conf
RUN sed -ri -e 's!/var/www/!${APACHE_DOCUMENT_ROOT}!g' /etc/apache2/apache2.conf /etc/apache2/conf-available/*.conf
# Install Composer
COPY --from=composer:latest /usr/bin/composer /usr/bin/composer
WORKDIR /var/www/html
# Copy application code
COPY . .
# Copy built frontend assets from the first stage
COPY --from=frontend /app/public/build ./public/build
# Install PHP dependencies
RUN composer install --no-dev --optimize-autoloader
# Set permissions
RUN chown -R www-data:www-data /var/www/html/storage /var/www/html/bootstrap/cache
EXPOSE 80
# Run migrations, seed, then start Apache
CMD php artisan migrate --force && php artisan db:seed --force && apache2-foreground