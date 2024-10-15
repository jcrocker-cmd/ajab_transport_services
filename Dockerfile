# Use the official PHP 8.0 image as the base image
FROM php:8.0-fpm

# Install required system dependencies
RUN apt-get update && apt-get install -y --no-install-recommends \
    apt-transport-https \
    ca-certificates \
    git \
    unzip \
    libpng-dev \
    libjpeg-dev \
    libfreetype6-dev \
    libzip-dev \
    libicu-dev \
    libonig-dev \
    libxml2-dev \
    && docker-php-ext-configure gd --with-freetype --with-jpeg \
    && docker-php-ext-install gd pdo pdo_mysql zip intl opcache mbstring bcmath \
    && apt-get clean \
    && rm -rf /var/lib/apt/lists/*

# Set the working directory
WORKDIR /var/www/html

# Copy Composer files separately to leverage Docker caching
COPY composer.json composer.lock ./

# Install Composer
RUN curl -sS https://getcomposer.org/installer | php -- --install-dir=/usr/local/bin --filename=composer

# Install Composer dependencies as root to avoid permission issues later
RUN composer install --no-dev --optimize-autoloader --prefer-dist -vvv

# Now copy the rest of the application code into the container
COPY . /var/www/html

# Set proper permissions for the application files
RUN chown -R www-data:www-data /var/www/html

# Switch to the www-data user for security reasons
USER www-data

# Expose port 9000 for PHP-FPM
EXPOSE 9000

# Start PHP-FPM server
CMD ["php-fpm"]
