FROM php:8.2-fpm

RUN apt-get update && apt-get install -y \
    zip unzip git \
    && docker-php-ext-install pdo pdo_mysql

COPY --from=composer:latest /usr/bin/composer /usr/bin/composer

WORKDIR /var/www/html

COPY composer.json ./

RUN composer install --no-interaction --no-scripts

# Затем копируем весь остальной код
COPY . .

CMD ["php-fpm"]
