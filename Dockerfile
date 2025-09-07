FROM php:8.3-apache

# Installer extensions PHP nécessaires
RUN apt-get update && apt-get install -y \
    libzip-dev zip unzip git && docker-php-ext-install pdo pdo_mysql

# Copier le code
COPY . /var/www/html

# Installer Composer
COPY --from=composer:latest /usr/bin/composer /usr/bin/composer

WORKDIR /var/www/html

# Installer les dépendances Laravel
RUN composer install --no-dev --optimize-autoloader

# Permissions
RUN chown -R www-data:www-data /var/www/html \
    && chmod -R 755 /var/www/html \
    && chmod -R 775 /var/www/html/storage /var/www/html/bootstrap/cache

# Apache : pointer sur le dossier public
RUN a2enmod rewrite
RUN sed -i 's|DocumentRoot /var/www/html|DocumentRoot /var/www/html/public|' /etc/apache2/sites-available/000-default.conf

# Exposer le port
EXPOSE 80

# Commande pour démarrer Apache
CMD ["apache2-foreground"]
