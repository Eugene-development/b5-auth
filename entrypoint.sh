#!/bin/sh

# Экспортируем secrets как переменные окружения, если файлы существуют
[ -f /run/secrets/db_host ] && export DB_HOST=$(cat /run/secrets/db_host)
[ -f /run/secrets/db_database ] && export DB_DATABASE=$(cat /run/secrets/db_database)
[ -f /run/secrets/db_username ] && export DB_USERNAME=$(cat /run/secrets/db_username)
[ -f /run/secrets/db_password ] && export DB_PASSWORD=$(cat /run/secrets/db_password)

[ -f /run/secrets/app_key ] && export APP_KEY=$(cat /run/secrets/app_key)
[ -f /run/secrets/app_url ] && export APP_URL=$(cat /run/secrets/app_url)
[ -f /run/secrets/mail_username ] && export MAIL_USERNAME=$(cat /run/secrets/mail_username)
[ -f /run/secrets/mail_password ] && export MAIL_PASSWORD=$(cat /run/secrets/mail_password)
[ -f /run/secrets/FRONTEND_URL ] && export FRONTEND_URL=$(cat /run/secrets/FRONTEND_URL)

# CORS и Sanctum configuration
[ -f /run/secrets/cors_origins ] && export CORS_ORIGINS=$(cat /run/secrets/cors_origins)
[ -f /run/secrets/sanctum_domains ] && export SANCTUM_STATEFUL_DOMAINS=$(cat /run/secrets/sanctum_domains)

# Session configuration
[ -f /run/secrets/SESSION_DOMAIN ] && export SESSION_DOMAIN=$(cat /run/secrets/SESSION_DOMAIN)
[ -f /run/secrets/SESSION_COOKIE ] && export SESSION_COOKIE=$(cat /run/secrets/SESSION_COOKIE)

# Добавьте другие secrets по аналогии, если нужно

# Очистка кеша Laravel при запуске
echo "🧹 Clearing Laravel cache..."
php artisan config:clear
php artisan cache:clear
php artisan route:clear
php artisan view:clear

# Запуск php-fpm (или другой вашей команды)
exec php-fpm
