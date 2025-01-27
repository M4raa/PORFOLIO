# Usa la imagen oficial de PHP con Apache
FROM php:8.2-apache

# Instala las extensiones necesarias para Symfony
RUN apt-get update && apt-get install -y \
    libicu-dev \
    libonig-dev \
    libzip-dev \
    unzip \
    git \
    && docker-php-ext-install intl opcache pdo pdo_mysql zip

# Instala Composer
COPY --from=composer:2.6 /usr/bin/composer /usr/bin/composer

# Copia el código de tu aplicación al contenedor
COPY . /var/www/html

# Establece los permisos
RUN chown -R www-data:www-data /var/www/html \
    && a2enmod rewrite

# Establece el directorio de trabajo
WORKDIR /var/www/html

# Instala las dependencias de Symfony
RUN composer install --no-dev --optimize-autoloader

# Configura el puerto de la aplicación
EXPOSE 80

# Comando para iniciar Apache
CMD ["apache2-foreground"]
