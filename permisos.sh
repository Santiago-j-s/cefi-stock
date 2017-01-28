#!/usr/bin/env bash
chown -R santiago:www-data ./views ./controllers ./models ./vendor
find ./views ./controllers ./models ./vendor -type d -execdir chmod 770 {} \;
find ./views ./controllers ./models ./vendor -type f -execdir chmod 760 {} \;