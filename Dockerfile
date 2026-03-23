# ------------------------------
# Laravel Dockerfile for Render
# ------------------------------

# Base PHP + Apache image
FROM php:8.2-apache

# Set working directory
WORKDIR /var/www/html

# Install system dependencies
RUN apt-get update && apt-get install -y \
    git unzip zip libzip-dev \
    libpng-dev libjpeg-dev libfreetype6-dev \
    libonig-dev libpq-dev curl \
    && docker-php-ext-install pdo pdo_mysql pdo_pgsql zip gd mbstring exif pcntl \
    && a2enmod rewrite

# Install Composer
COPY --from=composer:2 /usr/bin/composer /usr/bin/composer

# Copy project files
COPY . .

# Install PHP dependencies
RUN composer install --no-dev --optimize-autoloader

# Create storage symlink for public (uploads)
RUN php artisan storage:link || true

# Set permissions
RUN chown -R www-data:www-data storage bootstrap/cache public \
    && chmod -R 775 storage bootstrap/cache public

# Point Apache to Laravel public folder
RUN sed -i 's|/var/www/html|/var/www/html/public|g' /etc/apache2/sites-available/000-default.conf

# If using Vite or Laravel Mix for assets (optional)
# Uncomment these lines if you have node_modules and package.json
RUN apt-get install -y nodejs npm
RUN npm install
RUN npm run build

# Expose port for Render
EXPOSE 10000

# Run migrations automatically, then start Apache
CMD php artisan migrate --force && apache2-foreground
