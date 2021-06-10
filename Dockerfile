FROM php:7.4
RUN apt-get update -y && apt-get install -y libpq-dev openssl zip unzip git
RUN curl -sS https://getcomposer.org/installer | php -- --install-dir=/usr/local/bin --filename=composer
RUN docker-php-ext-install pdo_pgsql
WORKDIR /app
COPY . /app
RUN composer install
RUN chown 777 /app/storage

RUN cp .env.example .env && php artisan key:generate 

CMD php artisan serve --host=0.0.0.0 --port=8181
EXPOSE 8181
