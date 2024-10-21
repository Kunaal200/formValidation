FROM php:8.3-apache

RUN apt-get update && apt-get upgrade -y

COPY . /var/php
