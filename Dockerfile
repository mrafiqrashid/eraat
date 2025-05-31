FROM php:8.2.0-apache
WORKDIR /var/www/html

# Mod Rewrite
RUN a2enmod rewrite

# Linux Libraries (including wkhtmltopdf dependencies)
RUN apt-get update -y && apt-get install -y \
    libicu-dev \
    libmariadb-dev \
    unzip zip \
    zlib1g-dev \
    libpng-dev \
    libjpeg-dev \
    libfreetype6-dev \
    libjpeg62-turbo-dev \
    libzip-dev \
    libxml2-dev \
    libonig-dev \
    libxslt1-dev \
    git \
    wget \
    xvfb \
    libfontconfig1 \
    libxrender1 \
    libxtst6 \
    libxi6 \
    libgconf-2-4 \
    fontconfig \
    libjpeg62-turbo \
    libx11-6 \
    libxcb1 \
    libxext6 \
    xfonts-75dpi \
    xfonts-base \
    && rm -rf /var/lib/apt/lists/*

# Install wkhtmltopdf
RUN wget https://github.com/wkhtmltopdf/packaging/releases/download/0.12.6.1-3/wkhtmltox_0.12.6.1-3.bullseye_amd64.deb \
    && dpkg -i wkhtmltox_0.12.6.1-3.bullseye_amd64.deb \
    && apt-get install -f -y \
    && rm wkhtmltox_0.12.6.1-3.bullseye_amd64.deb


RUN wkhtmltopdf --version

# Install Composer
COPY --from=composer:latest /usr/bin/composer /usr/bin/composer

# PHP Extensions
RUN docker-php-ext-install gettext intl pdo_mysql gd zip mbstring xml

# Configure and install GD extension
RUN docker-php-ext-configure gd --enable-gd --with-freetype --with-jpeg \
    && docker-php-ext-install -j$(nproc) gd

# Set proper permissions for Apache
RUN chown -R www-data:www-data /var/www/html \
    && chmod -R 755 /var/www/html

# Enable Apache modules
RUN a2enmod headers

EXPOSE 80