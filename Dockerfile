FROM php:8.2-fpm

# Install system dependencies
RUN apt-get update && apt-get install -y \
    git \
    curl \
    libpng-dev \
    libonig-dev \
    libxml2-dev \
    zip \
    cron \
    unzip \
    redis-tools

# Clear cache
RUN apt-get clean && rm -rf /var/lib/apt/lists/*

# Install PHP extensions
RUN docker-php-ext-install mysqli pdo pdo_mysql mbstring exif pcntl bcmath gd

#RUN mkdir -p /var/www
#WORKDIR /var/www
COPY ./app /var/app/
RUN chown -R www-data:www-data /var/app

# Get latest Composer
COPY --from=composer:latest /usr/bin/composer /usr/bin/composer

# Create system user to run Composer
#RUN useradd -G www-data,root -u www-data -d /home/dev dev
#RUN chown -R www-data:www-data /var/app \
#    chown -R www-data:www-data /var/www

## Set working directory
WORKDIR /var/app

RUN composer install --no-interaction

# Add xdebug
RUN pecl install xdebug \
 && docker-php-ext-enable xdebug

COPY ./containers-config/php /usr/local/etc/php/