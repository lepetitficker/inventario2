#!/bin/sh
php8.1 artisan config:clear
php8.1 artisan cache:clear
php8.1 artisan view:clear
php8.1 artisan route:clear
php8.1 artisan config:cache
php8.1 artisan clear-compiled
php8.1 composer.phar dump-autoload
php8.1 artisan migrate
php8.1 artisan migrate:refresh --seed
php8.1 artisan optimize
