FROM webdevops/php-nginx:8.1-alpine

COPY --from=composer:latest /usr/bin/composer /usr/bin/composer

ENV COMPOSER_ALLOW_SUPERUSER 1
ENV WEB_DOCUMENT_ROOT /app/public

WORKDIR /app
COPY . .

RUN composer install --no-interaction --optimize-autoloader --no-dev

# Optimizing Configuration loading
RUN php artisan config:cache

# Optimizing Route loading
RUN php artisan route:cache

# Optimizing View loading
RUN php artisan view:cache

RUN chown -R application:application .
RUN chmod -R 775 /app/storage /app/bootstrap/cache
