#!/usr/bin/env bash
set -e

php-fpm -D -R
nginx -g 'daemon off;'

# python /var/www/onch/docker/python/wsgi.py
