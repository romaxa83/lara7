FROM php:7.4-cli-alpine

# устанавливаем xdebug
RUN apk add --no-cache autoconf g++ make \
    && pecl install xdebug \
    && rm -rf /tmp/pear \
    && docker-php-ext-enable xdebug

RUN apk add --no-cache postgresql-dev bash coreutils \
    && docker-php-ext-configure pgsql -with-pgsql=/usr/local/pgsql \
    && docker-php-ext-install pdo_pgsql

# Redis
RUN pecl install -o -f redis \
    && rm -rf /tmp/pear \
    && docker-php-ext-enable redis

# AMQP для rabbitmq
RUN docker-php-ext-install bcmath sockets \
    # Amqp
    && apk add --no-cache --update rabbitmq-c-dev \
    && apk add --no-cache --update --virtual .phpize-deps $PHPIZE_DEPS \
    && pecl install -o -f amqp \
    && docker-php-ext-enable amqp \
    && apk del .phpize-deps

RUN apk update && apk add --no-cache unzip

RUN mv $PHP_INI_DIR/php.ini-development $PHP_INI_DIR/php.ini

COPY ./dev/php/conf.d /usr/local/etc/php/conf.d

# копируем и делаем исполняемым bash-скрипт, который будет ждать поднятие бд
# и после работать с ней
#COPY ./dev/php/wait-for-it.sh /usr/local/bin/wait-for-it
#RUN chmod 555 /usr/local/bin/wait-for-it

ENV COMPOSER_ALLOW_SUPERUSER 1

# устанавливаем пает hirak/prestissimo - чтоб ускорить работу composer
RUN curl -sS https://getcomposer.org/installer | php -- --install-dir=/bin --filename=composer --quiet \
    && rm -rf /root/.composer/cache

WORKDIR /app
