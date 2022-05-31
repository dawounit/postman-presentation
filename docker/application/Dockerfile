FROM ubuntu:20.04

ENV TERM=linux
ENV DEBIAN_FRONTEND noninteractive
ENV LC_ALL=C.UTF-8

RUN apt-get update && apt-get upgrade -y
RUN apt-get install -y nano wget curl software-properties-common

# Install nginx
RUN apt-get update && apt-get install -y nginx
RUN rm /etc/nginx/sites-enabled/*
RUN rm /etc/nginx/sites-available/*
COPY ./nginx.conf /etc/nginx/conf.d/default.conf
RUN mkdir -p /etc/ssl/nginx
RUN openssl req -x509 -nodes -days 365 -newkey rsa:2048 \
    -keyout /etc/ssl/nginx/postman-sandbox.local.key \
    -out /etc/ssl/nginx/postman-sandbox.local.crt \
    -subj "/C=AU/ST=Some-State/L=Some-City/O=Some-Organization/OU=Some-Department/CN=postman-sandbox.local"

# Install php
RUN apt-get install -y php7.4
RUN apt-get install -y 'php7.4-(common|cli|fpm|xdebug)'
RUN apt-get install -y 'php7.4-(apcu|apcu-bc|curl|gd|intl|json|memcache|mbstring|mcrypt|mysql|opcache|readline|tidy|xml|zip)'
RUN mkdir -p /var/run/php
RUN sed -i "/pid = .*/c\;pid = /run/php/php-fpm7.4.pid" /etc/php/7.4/fpm/php-fpm.conf
RUN sed -i "/listen = .*/c\listen = [::]:9000" /etc/php/7.4/fpm/pool.d/www.conf
RUN sed -i "/;clear_env = .*/c\clear_env = no" /etc/php/7.4/fpm/pool.d/www.conf
COPY ./php-cli.ini /etc/php/7.4/cli/conf.d/99-overrides.ini
COPY ./php-fpm.ini /etc/php/7.4/fpm/conf.d/99-overrides.ini
RUN usermod -u 1000 www-data

# Install supervisor
RUN apt-get install -y supervisor
RUN mkdir -p /var/log/supervisor
COPY ./supervisord.conf /etc/supervisor/conf.d/supervisord.conf
CMD supervisord -c /etc/supervisor/supervisord.conf

# Clean up and run!
RUN apt-get clean; rm -rf /var/lib/apt/lists/* /tmp/* /var/tmp/* /usr/share/doc/*
