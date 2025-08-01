# Use an official PHP Apache image as the base image
FROM php:8.2-fpm

# Set the working directory inside the container
WORKDIR /var/www

# Install system dependencies required for Symfony (e.g., MySQL client, Git)
RUN apt-get update && apt-get install -y \
    git \
    libpq-dev \
    libzip-dev \
    unzip \
    && docker-php-ext-install pdo pdo_pgsql



COPY --from=composer:latest /usr/bin/composer /usr/local/bin/composer

# Copy the Symfony project files into the container
COPY . .

# Install Composer

# Install PHP dependencies using Composer
RUN composer install