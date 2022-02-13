#!/usr/bin/bash

while :
do
    echo "Building app..."
    npm run build
    echo "Starting node app..."
    npm run production
    echo "App crash :/"
    echo "Restarting node app in 5 seconds !"
    sleep 5
done