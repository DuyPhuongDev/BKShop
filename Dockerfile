FROM php:8.1-apache

# Cài đặt MySQL extension
RUN docker-php-ext-install mysqli pdo pdo_mysql

# Copy mã nguồn
COPY . /var/www/html/

# Cấp quyền
RUN chown -R www-data:www-data /var/www/html

# Mở cổng
EXPOSE 80
