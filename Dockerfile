FROM php:8.2-apache

RUN docker-php-ext-install pdo pdo_mysql

# Configurar Apache para Railway
RUN sed -i 's/80/${PORT}/g' /etc/apache2/sites-available/000-default.conf
RUN sed -i 's/80/${PORT}/g' /etc/apache2/ports.conf

COPY . /var/www/html/

EXPOSE 8080
