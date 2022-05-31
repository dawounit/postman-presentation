FROM ubuntu:20.04

ENV TERM=linux
ENV DEBIAN_FRONTEND noninteractive
ENV LC_ALL=C.UTF-8

RUN apt-get update && apt-get upgrade -y
RUN apt-get install -y nano wget curl software-properties-common

# Install newman
RUN curl -sL https://deb.nodesource.com/setup_18.x -o nodesource_setup.sh
RUN bash nodesource_setup.sh
RUN rm -rf nodesource_setup.sh
RUN apt-get install -y nodejs build-essential
RUN npm install -g newman

# Install supervisor
RUN apt-get install -y supervisor
RUN mkdir -p /var/log/supervisor
COPY ./supervisord.conf /etc/supervisor/conf.d/supervisord.conf
CMD supervisord -c /etc/supervisor/supervisord.conf

# Clean up and run!
RUN apt-get clean; rm -rf /var/lib/apt/lists/* /tmp/* /var/tmp/* /usr/share/doc/*
