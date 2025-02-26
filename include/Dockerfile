# PHP 8.1 FPM bilan boshlaymiz
FROM php:8.1-fpm

# Muhim PHP kengaytmalarini o‘rnatamiz
RUN docker-php-ext-install mysqli pdo pdo_mysql

# Ishchi katalogni o‘rnatamiz
WORKDIR /var/www/html

# Fayllarni konteyner ichiga ko‘chirish (agar kerak bo‘lsa)
COPY . /var/www/html

# FPM-ni ishga tushiramiz
CMD ["php-fpm"]