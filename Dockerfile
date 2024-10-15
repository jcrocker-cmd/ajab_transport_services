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
    libssl-dev \
    libcurl4-openssl-dev \
    zip unzip \
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

# Diagnose Composer issues before attempting installation
RUN composer diagnose

# Install Composer dependencies with increased memory limit and as root user to avoid permissions issues
USER root
RUN php -d memory_limit=-1 /usr/local/bin/composer install --no-dev --optimize-autoloader --prefer-dist --ignore-platform-reqs -vvv
USER www-data

# Now copy the rest of the application code into the container
COPY . /var/www/html

# Set proper permissions for the application files
RUN chown -R www-data:www-data /var/www/html

# Expose port 9000 for PHP-FPM
EXPOSE 9000

# Start PHP-FPM server
CMD ["php-fpm"]
