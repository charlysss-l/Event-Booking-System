FROM php:8.2-apache

# Enable mysqli extension
RUN docker-php-ext-install mysqli

# Optional: Enable mod_rewrite if you plan URL routing
RUN a2enmod rewrite
