FROM php:7.3-fpm
MAINTAINER Yoesoff <mhyusufibrahim@gmail.com>

# Update
RUN apt-get update
RUN apt-get install -y libbz2-dev unzip

# Install
RUN docker-php-ext-install opcache bcmath bz2 calendar dba mbstring

# Redis and MongoDB
RUN pecl install redis && docker-php-ext-enable redis
RUN pecl install mongodb && docker-php-ext-enable mongodb

# Install APCU
RUN pecl install apcu

# PHP.INI Settings
RUN echo 'memory_limit = 3G' >> /usr/local/etc/php/conf.d/memlimit.ini;
RUN echo 'max_execution_time = 18000' >> /usr/local/etc/php/conf.d/max_execution_time.ini;
RUN echo 'extension=apcu.so' >> /usr/local/etc/php/conf.d/apcu.ini

# Install Stuff
RUN echo 'debconf debconf/frontend select Noninteractive' | debconf-set-selections
RUN apt-get install -y --no-install-recommends apt-utils libcurl4 libcurl4-gnutls-dev
RUN apt-get install -y --no-install-recommends software-properties-common

RUN apt-get install -y --no-install-recommends libzip-dev build-essential gnupg2  snmpd snmp libsnmp-dev wget iputils-ping libicu-dev vim git 
RUN apt-get install -y --no-install-recommends libfreetype6-dev libjpeg62-turbo-dev libxpm-dev libpng-dev     

# PHP GD
RUN docker-php-ext-configure gd --with-freetype-dir=/usr/include/ --with-jpeg-dir=/usr/include/ --with-png-dir=/usr/include/ --with-xpm-dir=/usr/include/ --enable-gd-jis-conv
RUN docker-php-ext-install -j$(nproc) gd 
# END PHP GD

RUN apt-get install -y --no-install-recommends libxml2-dev libldb-dev libxml2-dev libssl-dev libxslt-dev libpq-dev libsqlite3-dev libsqlite3-0 libc-client-dev libkrb5-dev firebird-dev libpspell-dev aspell-en aspell-de libtidy-dev librecode0 librecode-dev
RUN curl -sS https://getcomposer.org/installer | php -- --install-dir=/usr/bin/ --filename=composer

RUN docker-php-ext-install -j$(nproc) soap ftp xsl ctype dom zip session
RUN docker-php-ext-install -j$(nproc) json hash sockets pdo tokenizer pgsql pdo_pgsql pdo_mysql pdo_sqlite intl mysqli
RUN docker-php-ext-configure imap --with-kerberos --with-imap-ssl
RUN docker-php-ext-install -j$(nproc) imap curl exif fileinfo gettext iconv interbase pdo_firebird pcntl phar posix pspell recode shmop simplexml snmp sysvmsg sysvsem sysvshm tidy wddx xml xmlrpc xmlwriter

# Install Node
RUN apt install -y nodejs npm
RUN npm i -g npm@latest
RUN npm i -g yarn@latest
RUN npm i -g foreman
RUN npm i -g webpack
RUN npm i -g webpack-cli

# Set Timezone
RUN rm /etc/localtime
RUN ln -s /usr/share/zoneinfo/Asia/Jakarta /etc/localtime
RUN "date"
# End Timezone

WORKDIR /var/www
