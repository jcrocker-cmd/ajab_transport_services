# Use the official PHP 8.1 image as the base image
FROM php:8.1-fpm

# Install system dependencies and PHP extensions
RUN apt-get update && apt-get install -y \
    libpng-dev \
    libjpeg-dev \
    libfreetype6-dev \
    libzip-dev \
    libpq-dev \
    libicu-dev \
    libonig-dev \
    libxml2-dev \
    git \
    unzip \
&& docker-php-ext-configure gd --with-freetype --with-jpeg \
&& docker-php-ext-install gd pdo pdo_mysql zip intl opcache mbstring bcmath

# Set working directory
WORKDIR /var/www/html

# Copy the application code
COPY . .

# Set proper permissions before running Composer
RUN chown -R www-data:www-data /var/www/html

# Install Composer
RUN curl -sS https://getcomposer.org/installer | php -- --install-dir=/usr/local/bin --filename=composer

# Switch to the www-data user to avoid permission issues during Composer install
USER www-data

# Increase memory limit and run composer install with no dev dependencies
RUN php -d memory_limit=-1 /usr/local/bin/composer install --no-dev --optimize-autoloader -vvv

# Expose port 9000 for PHP-FPM
EXPOSE 9000

# Start PHP-FPM server
CMD ["php-fpm"]
