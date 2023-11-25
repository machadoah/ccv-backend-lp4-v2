# Use a imagem oficial do PHP 8.2 como base
FROM php:8.2

# Atualizar e instalar dependências necessárias
RUN apt-get update \
    && apt-get install -y \
        libzip-dev \
        unzip \
        libonig-dev \
        libxml2-dev \
        libpng-dev \
        libjpeg62-turbo-dev \
        libfreetype6-dev \
        libmcrypt-dev \
    && docker-php-ext-configure gd --with-freetype --with-jpeg \
    && docker-php-ext-install -j$(nproc) \
        zip \
        pdo \
        pdo_mysql \
        mysqli \
        mbstring \
        xml \
        gd

# Instalar o Composer
RUN curl -sS https://getcomposer.org/installer | php -- --install-dir=/usr/local/bin --filename=composer

# Configurar a aplicação Laravel
WORKDIR /var/www/html

# Copiar os arquivos do projeto para o contêiner
COPY . .

# Instalar as dependências do Composer
RUN composer install --no-interaction --optimize-autoloader

# Configurar as permissões de armazenamento (storage) e bootstrap/cache
RUN chown -R www-data:www-data storage bootstrap/cache
RUN chmod -R 775 storage bootstrap/cache

# Expor a porta 80 para acesso externo (ajuste conforme necessário)
EXPOSE 80

# Comando para iniciar o servidor Laravel (ajuste conforme necessário)
CMD php artisan serve --host=0.0.0.0 --port=80
