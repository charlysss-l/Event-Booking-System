# Use official PHP image with Apache
FROM php:8.2-apache

# Copy project files into Apache webroot
COPY . /var/www/html/

# Copy CSS & images correctly
COPY css /var/www/html/css
COPY images /var/www/html/images

# Enable Apache rewrite module (optional if using URLs)
RUN a2enmod rewrite

# Set working directory
WORKDIR /var/www/html

# Expose port 80
EXPOSE 80
