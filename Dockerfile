# ----------------------------
# Étape 1 : Utiliser PHP 8.3 avec Apache
# ----------------------------
FROM php:8.3-apache

# Installer les dépendances système nécessaires pour Laravel
RUN apt-get update && apt-get install -y \
    git unzip libzip-dev libpng-dev libonig-dev libxml2-dev curl \
    && docker-php-ext-install pdo_mysql zip exif pcntl gd

# Activer le module Apache rewrite (important pour Laravel routes)
RUN a2enmod rewrite

# ----------------------------
# Étape 2 : Installer Composer
# ----------------------------
COPY --from=composer:2.7 /usr/bin/composer /usr/bin/composer

# ----------------------------
# Étape 3 : Copier le projet Laravel
# ----------------------------
WORKDIR /var/www/html
COPY . .

# Installer les dépendances Laravel
RUN composer install --no-dev --optimize-autoloader

# ----------------------------
# Étape 4 : Configurer les permissions
# ----------------------------
RUN chown -R www-data:www-data /var/www/html/storage /var/www/html/bootstrap/cache

# ----------------------------
# Étape 5 : Exposer le port et lancer Apache
# ----------------------------
EXPOSE 80
CMD ["apache2-foreground"]
# Fin du Dockerfile