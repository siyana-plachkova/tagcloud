FROM textlab/ubuntu-essential:latest

# Install packages (one-liner to save device space)
RUN apt-get update && \
    apt-get -y install \
                git \
                curl \
                libmcrypt4 \
                php5-cli \
                php5-mcrypt \
                php5-curl \
                php5-json \
                php5-sqlite \
                sqlite3 && \
    apt-get -y autoremove && \
    apt-get clean && \
    php5enmod mcrypt && \
    /usr/bin/curl -sS https://getcomposer.org/installer | php && /bin/mv composer.phar /usr/local/bin/composer && \
    mkdir /var/www

# mkdir /var/www && git clone https://github.com/siyana-plachkova/tagcloud.git /var/www/tagcloud && chmod -R 0777 /var/www/tagcloud/app/storage

WORKDIR /var/www/tagcloud

ADD .env.php .env.php
COPY . .
RUN chmod -R 0777 /var/www/tagcloud/app/storage

# Composer update
RUN /usr/local/bin/composer update

EXPOSE 8000

CMD [ "php", "artisan", "serve", "--host", "0.0.0.0" ]