FROM php:7.3-fpm

RUN apt-get update && apt-get install -y \
    git \
    libpng-dev \
    libonig-dev \
    libxml2-dev \
    # Clear cache
    && apt-get clean && rm -rf /var/lib/apt/lists/* \
    # Install PHP extensions
    && docker-php-ext-install pdo_mysql mbstring exif intl pcntl bcmath gd

# Get latest Composer
COPY --from=composer:latest /usr/bin/composer /usr/bin/composer

WORKDIR /var/www