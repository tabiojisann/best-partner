#!/bin/bash

set -eux

cd ~/partner/best-partner
php artisan migrate --force
php artisan config:cache
