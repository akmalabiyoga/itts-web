FROM php:8.4-cli

RUN apt-get update && apt-get install -y \
    libicu-dev \
    g++ \
    curl \
    unzip \
    git \
 && docker-php-ext-configure intl \
 && docker-php-ext-install intl \
 && curl -sS https://getcomposer.org/installer | php \
    -- --install-dir=/usr/local/bin --filename=composer

RUN echo '#!/bin/bash\nphp spark serve --host 0.0.0.0 "$@"' > /usr/local/bin/pss \
 && chmod +x /usr/local/bin/pss