FROM registry.gitlab.com/bryanmramsamy/icc-projetdeveloppementweb_2019-2020/phpfpm

RUN docker-php-ext-install pdo pdo_mysql

# RUN docker-php-ext-install mysqli pdo pdo_mysql
RUN apt-get update -y && apt-get install -y libwebp-dev libjpeg62-turbo-dev libpng-dev libxpm-dev \
    libfreetype6-dev
RUN apt-get update && \
    apt-get install -y \
        zlib1g-dev

RUN apt-get install -y libzip-dev
RUN docker-php-ext-install zip

RUN docker-php-ext-configure gd

RUN docker-php-ext-install gd