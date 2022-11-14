#!/bin/bash

./vendor/bin/sail up -d

sleep 10

./vendor/bin/sail artisan migrate:fresh --force

sleep 10

./vendor/bin/sail stop