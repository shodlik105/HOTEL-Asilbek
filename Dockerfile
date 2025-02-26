FROM php:8.1-fpm

# Kerakli PHP kengaytmalarini o'rnatish
RUN docker-php-ext-install mysqli pdo pdo_mysql

# Ishchi katalogni o'rnatish
WORKDIR /var/www/html

# Fayllarni ko'chirish
COPY . .

# Ruxsatlarni to'g'ri sozlash
RUN chown -R www-data:www-data /var/www/html

# PHP-FPMni ishga tushirish
CMD ["php-fpm"]
