# Test

Please implement a system:
* where people can enter a shipping tracking code in a form
* as a result, they will see an estimated delivery date.
* The frontend is supposed to be connecting to the backend through a REST API.
* Please make sure that the data store in the backend can be replaced (e.g by a config).
  * Implement two storage solutions that can be plugged in.
  * Suggestions for data stores to implement are SQLite and file (CSV).

## Tasks breakdown

- [X] Create model, controller, migration and seeder.
- [X] Implement needed REST API methods.
- [X] Make storage flexible.
- [X] Add tests.
- [X] Implement front-end using Vue.js.
- [X] Connect front-end to the backend.
- [ ] Testare instalare nouă.

## Expectations

* Feel free to use libraries, when it makes sense.
* Please be careful about unit tests, commits and all those other pesky details. They matter!
* Deliver the results as a git repository with commit history.
* The implementation should be done in a half day (4h).

# Instalare

```
composer install

cp .env.example .env
./artisan key:generate

# generate the sqlite DB
touch database/database.sqlite
./artisan migrate:refresh --seed

# generate the CSV file
./artisan generator:csv

# generate the test db
touch database/database_test.sqlite
./artisan migrate --database=sqlite_test

npm install
npm run production
```

## Schimbare storage

Pentru a schimba storageul, aveţi două posibilităţi:

1. În fişierul `.env` schimbaţi valoarea cheii `STORAGE_TYPE` la una din următoarele valori: `db`, `csv`.
2. Schimbaţi valoarea implicită din fişierul `app/packagetracking.php` la `db` sau `csv`.

## Rularea testelor

```
./vendor/bin/phpunit tests/
```

# Pornire

```
./artisan serve
```

Începe [aici](http://localhost:8000).
