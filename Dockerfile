#
# PHP Dependencies
#
FROM composer:1.7 as vendor

WORKDIR /app

COPY composer.json /app/composer.json
COPY composer.lock /app/composer.lock
COPY database/ /app/database/

RUN composer install \
    --ignore-platform-reqs \
    --no-interaction \
    --no-plugins \
    --no-scripts \
    --no-dev \
    --no-autoloader \
    --verbose

FROM php:7.3-fpm-alpine

#
# Install extensions
#
RUN docker-php-ext-install pdo_mysql opcache
RUN curl -sS https://getcomposer.org/installer | php -- --install-dir=/usr/local/bin --filename=composer

# Change default directory
WORKDIR /app

#
# Copy all dependencies
#
COPY --from=vendor /app/vendor /app/vendor

# Copy files with existing permissions
COPY --chown=www-data:www-data . /app
RUN chmod -R 0777 /app/storage

# Finish installation
RUN composer dump-autoload --no-scripts --no-dev --optimize

# Expose port 9000 and start php-fpm server
EXPOSE 9000
CMD ["php-fpm"]
