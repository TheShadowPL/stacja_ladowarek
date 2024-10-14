FROM alpine:3.17
WORKDIR /code
EXPOSE 8000
RUN apk add --no-cache \
    php81 \
    php81-session \
    php81-fileinfo \
    php81-tokenizer \
    php81-dom \
    php81-mbstring \
    php81-phar \
    php81-xml \
    php81-xmlwriter \
    php81-pdo \
    mysql-client \
    php81-fpm \
    php81-pdo_mysql \
    php81-mbstring \
    php81-openssl \
    php81-json \
    php81-tokenizer \
    php81-xml \
    php81-ctype \
    php81-dom \
    php81-session \
    php81-zlib \
    mysql-client \
    composer
COPY . .
RUN composer install
CMD ["php", "artisan", "serve", "--host=0.0.0.0", "--port=8000"]