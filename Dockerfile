# =========================
# Base image PHP + Apache
# =========================
FROM php:8.3-apache

# =========================
# Installer les dépendances système
# =========================
RUN apt-get update && \
    apt-get install -y \
        git \
        unzip \
        zip \
        libpng-dev \
        libjpeg-dev \
        libfreetype6-dev \
        libonig-dev \
        libzip-dev \
        libpq-dev && \
    docker-php-ext-configure gd --with-freetype --with-jpeg && \
    docker-php-ext-install pdo_pgsql gd mbstring zip && \
    rm -rf /var/lib/apt/lists/*

# =========================
# Installer les extensions PHP nécessaires
# =========================
RUN docker-php-ext-configure gd --with-freetype --with-jpeg \
    && docker-php-ext-install gd pdo pdo_mysql mbstring zip bcmath

# =========================
# Installer Composer
# =========================
COPY --from=composer:latest /usr/bin/composer /usr/bin/composer

# =========================
# Copier le projet Laravel
# =========================
WORKDIR /var/www/html
COPY . /var/www/html

# =========================
# Installer les dépendances PHP avec Composer
# =========================
RUN composer install --no-dev --optimize-autoloader

# =========================
# Configurer les permissions
# =========================
RUN chown -R www-data:www-data /var/www/html \
    && chmod -R 755 /var/www/html \
    && chmod -R 775 /var/www/html/storage /var/www/html/bootstrap/cache

# =========================
# Configurer Apache
# =========================
RUN a2enmod rewrite
RUN sed -i 's|DocumentRoot /var/www/html|DocumentRoot /var/www/html/public|' /etc/apache2/sites-available/000-default.conf

# =========================
# Exposer le port 80
# =========================
EXPOSE 80

# =========================
# Commande par défaut
# =========================
CMD ["apache2-foreground"]
