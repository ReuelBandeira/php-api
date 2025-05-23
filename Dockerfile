FROM php:8.2-fpm

# Definir diretório de trabalho ANTES de copiar arquivos
WORKDIR /var/www/html

# Instalar dependências do sistema
RUN apt-get update && apt-get install -y \
    git \
    curl \
    libpng-dev \
    libonig-dev \
    libxml2-dev \
    zip \
    unzip \
    libpq-dev \
    && apt-get clean \
    && rm -rf /var/lib/apt/lists/*

# Instalar extensões PHP
RUN docker-php-ext-install pdo_pgsql mbstring exif pcntl bcmath gd

# Obter a versão mais recente do Composer
COPY --from=composer:latest /usr/bin/composer /usr/bin/composer

# Copiar APENAS os arquivos necessários primeiro
COPY composer.json composer.lock ./

# Instalar dependências
RUN composer install --no-scripts --no-autoloader

# Copiar o restante da aplicação
COPY . .

# Criar diretórios necessários com permissões corretas
RUN mkdir -p storage/logs storage/framework/cache storage/framework/sessions storage/framework/views storage/app/public bootstrap/cache \
    && chmod -R 755 storage bootstrap/cache \
    && chown -R www-data:www-data storage bootstrap/cache

# Gerar o autoloader otimizado
RUN composer dump-autoload --optimize

# 👉 Criar o link do storage manualmente (sem artisan)
RUN mkdir -p public && ln -sf /var/www/html/storage/app/public /var/www/html/public/storage

# Expor porta 8000
EXPOSE 8000

# Usar o servidor PHP embutido
CMD ["php", "artisan", "serve", "--host=0.0.0.0", "--port=8000"]
