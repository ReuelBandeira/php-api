FROM php:8.2-fpm

# Instalar dependências do sistema
RUN apt-get update && apt-get install -y \
    git \
    curl \
    libpng-dev \
    libonig-dev \
    libxml2-dev \
    zip \
    unzip \
    libpq-dev

# Limpar cache
RUN apt-get clean && rm -rf /var/lib/apt/lists/*

# Instalar extensões PHP
RUN docker-php-ext-install pdo_pgsql mbstring exif pcntl bcmath gd

# Obter a versão mais recente do Composer
COPY --from=composer:latest /usr/bin/composer /usr/bin/composer

# Definir diretório de trabalho
WORKDIR /var/www/html

# Copiar arquivos do composer
COPY composer.json composer.lock ./

# Instalar dependências
RUN composer install --no-scripts --no-autoloader

# Copiar o restante da aplicação
COPY . .

# Gerar o autoloader otimizado
RUN composer dump-autoload --optimize

# Configurar permissões (usando www-data que é o usuário padrão para PHP-FPM)
RUN chown -R www-data:www-data /var/www/html/storage /var/www/html/bootstrap/cache
RUN chmod -R 775 /var/www/html/storage /var/www/html/bootstrap/cache

# Garantir que o diretório de storage existe e tem permissões corretas
RUN mkdir -p /var/www/html/storage/logs /var/www/html/storage/framework/sessions /var/www/html/storage/framework/views /var/www/html/storage/framework/cache
RUN chown -R www-data:www-data /var/www/html/storage

# Expor porta 8000 (PHP artisan serve)
EXPOSE 8000

# Usar o servidor PHP embutido (como usuário www-data para evitar problemas de permissão)
CMD php artisan serve --host=0.0.0.0 --port=8000
