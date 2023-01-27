# Project SAKERA

Rencana Kegiatan Tahunan KPPN Pamekasan

## Run Locally

Clone the project

```bash
  git clone https://github.com/farisulhaq/Sakera.git
```

Go to the project directory

```bash
  cd Sakera
```

Install dependencies

```bash
  composer install
```

If error

```bash
  composer update
```

Copy file .env.example menjadi .env

```bash
  cp .env.example .env
```

Generate Key

```bash
  php artisan key:generate
```

open file .env and edit databases

```bash
  DB_CONNECTION=mysql
  DB_HOST=127.0.0.1
  DB_PORT=3306
  DB_DATABASE=namadatabase
  DB_USERNAME=username -> default root
  DB_PASSWORD=password -> default kosong
```

Migrations

```bash
  php artisan migrate --seed
```

## Running Tests

To run tests, run the following command

```bash
  php artisan serve
```
