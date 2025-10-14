# Imagem base
FROM php:8.2-fpm

# Instala extensões do PHP necessárias
RUN apt-get update && apt-get install -y \
    git \
    unzip \
    libpng-dev \
    libonig-dev \
    libxml2-dev \
    && docker-php-ext-install pdo_mysql mbstring exif pcntl bcmath gd

# Define diretório de trabalho
WORKDIR /var/www/html

# Copia arquivos do projeto
COPY . .

# Instala Composer
COPY --from=composer:2 /usr/bin/composer /usr/bin/composer

# Instala dependências do PHP
RUN composer install

# Dá permissão para storage e cache
RUN chown -R www-data:www-data storage bootstrap/cache

# Exposição da porta
EXPOSE 9000

CMD ["php-fpm"]
