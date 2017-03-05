#!/bin/bash

# install php dependencies
composer install

cp .env.example .env
./artisan key:generate

# generate the sqlite DB
touch database/database.sqlite
./artisan migrate:refresh --seed

# generate the CSV file
./artisan generate:csv

# generate the test db
touch database/database_test.sqlite
./artisan migrate --database=sqlite_test

# install JS dependencies
npm install
# compile assets for production
npm run production