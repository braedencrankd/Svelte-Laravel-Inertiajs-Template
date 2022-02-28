# Svelte InertiaJS Laravel Template

This is a bare bones project template to get you up and runnign with a Svelte and Laravel Fullstack application.

## How to get started.

To get this project up and running, you first need to install [PHP](https://www.php.net/downloads.php), [Composer](https://getcomposer.org/download/) and [NodeJs](https://nodejs.org/en/download/).

Additonally to get up and running with the mysql database you need to install [mysql](https://dev.mysql.com/downloads/mysql/)

The easiet way to install these dependencies is using a package manager, as shown below for each target platform below:

-   **OSX**: [Homebrew](https://brew.sh/)
-   **WINDOWS**: [Chocolatly](https://chocolatey.org/)
-   **Linux**: apt _Installed on most linux distributions by default_

## How to setup a local dev environment

Clone the repo locally:

```sh
git clone https://github.com/braedencrankd/Laravel-Inertiajs-Template.git
cd Laravel-Inertiajs-Template
```

**Install PHP dependencies:**

```sh
composer install
```

**Install NPM dependencies:**

```sh
npm ci
```

**Build assets:**

```sh
npm run dev
```

**Run with hot module reloading:**

```sh
npm run hot
```

## Setup Database configuration

```sh
cp .env.example .env
```

_Edit the database configuration section in the .env file to connect to database of your choice_

**Generate a new application key**

```sh
php artisan key:generate
```

**Run the database migrations (Set the database connection in .env before migrating)**

```sh
php artisan migrate
```

**Finally run the dev server**

```sh
php artisan serve
```
