#!/bin/bash

sleep 10

./vendor/bin/sail artisan migrate:fresh

sleep 10

./vendor/bin/sail artisan test --recreate-databases