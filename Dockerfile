FROM php:8.3-apache
COPY ./ /var/www/html/
RUN apt-get install php8.43mysqli libmysqlclient-dev