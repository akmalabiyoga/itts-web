FROM php:8.4-cli

RUN apt-get update && apt-get install -y \
    libicu-dev \
    g++ \
    curl \
    unzip \
    git \
    libpq-dev \
 && docker-php-ext-configure intl \
 && docker-php-ext-install intl \
 && docker-php-ext-configure pgsql \
 && docker-php-ext-install pgsql \
 && curl -sS https://getcomposer.org/installer | php \
    -- --install-dir=/usr/local/bin --filename=composer

RUN echo '#!/bin/bash\nphp spark serve --host 0.0.0.0 "$@"' > /usr/local/bin/pss \
 && chmod +x /usr/local/bin/pss