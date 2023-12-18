FROM php:8.0-fpm
ARG ENV
# Install dependencies
RUN apt-get update && apt-get install -y \
    build-essential \
    libpng-dev \
    zlib1g-dev \
    g++ \
    libicu-dev \
    libmcrypt4 \
    libjpeg62-turbo-dev \
    libfreetype6-dev \
    locales \
    zip \
    jpegoptim optipng pngquant gifsicle \
    vim \
    unzip \
    git \
    curl \
    libzip-dev

RUN apt-get install -y nginx net-tools && apt-get install -y procps

# Clear cache
RUN apt-get clean && rm -rf /var/lib/apt/lists/*
# Install extensions
RUN docker-php-ext-install pdo pdo_mysql mysqli zip exif pcntl gd opcache sockets

# Install composer
RUN curl -sS https://getcomposer.org/installer | php -- --install-dir=/usr/local/bin --filename=composer

# Add user for laravel application
RUN groupadd -g 1000 www
RUN useradd -u 1000 -ms /bin/bash -g www www

ENV COMPOSER_ALLOW_SUPERUSER = 1

RUN curl -sL https://deb.nodesource.com/setup_lts.x | bash - && \
    apt-get install -y nodejs

RUN composer global require laravel/envoy

# Install rdkafka
RUN apt-get update -y && apt-get install -y librdkafka-dev && pecl install rdkafka
RUN pecl install redis && docker-php-ext-enable redis
RUN set -x \
&& { \
echo 'extension=rdkafka.so'; \
echo 'extension=redis.so'; \
echo 'extension=xdebug.so'; \
} > /etc/php.ini

# Python
RUN apt-get install -y python3 python3-pip
RUN apt-get install -y python3-confluent-kafka
RUN echo 'alias python=python3' >> ~/.bashrc
RUN pip3 install PyMySQL requests urllib3 certifi charset-normalizer flask_socketio flask_cors eventlet gunicorn
# RUN pip3 install confluent-kafka

# xdebug 설치 유무 인자
ARG WITH_XDEBUG=true

# xdebug 설치
RUN set -eux; \
   if [ $WITH_XDEBUG = "true" ] ; then \
       pecl install xdebug; \
       docker-php-ext-enable xdebug; \
       echo "error_reporting = E_ALL" >> /usr/local/etc/php/conf.d/docker-php-ext-xdebug.ini; \
       echo "display_startup_errors = On" >> /usr/local/etc/php/conf.d/docker-php-ext-xdebug.ini; \
       echo "display_errors = On" >> /usr/local/etc/php/conf.d/docker-php-ext-xdebug.ini; \
       echo "xdebug.remote_enable=1" >> /usr/local/etc/php/conf.d/docker-php-ext-xdebug.ini; \
       echo "xdebug.idekey=PHPSTORM" >> /usr/local/etc/php/conf.d/docker-php-ext-xdebug.ini; \
       echo "xdebug.remote_host=host.docker.internal" >> /usr/local/etc/php/conf.d/docker-php-ext-xdebug.ini; \
   fi ;

ENTRYPOINT ["./docker/entrypoint.sh"]
