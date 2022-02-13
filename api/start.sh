#!/bin/bash

while : ; do
    echo "Starting app"
    php artisan serve --port=10000
    echo "App crash :/"
    echo "Restarting laravel app in 5 seconds !"
    sleep 5
done
