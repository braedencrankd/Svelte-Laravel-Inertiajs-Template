# Svelte InertiaJS Laravel Template

This is a bare bones project template to get you up and runnign with a Svelte and Laravel Fullstack application.

## How to get started.

To get this project up and running, you first need to install [PHP](https://www.php.net/downloads.php), [Composer](https://getcomposer.org/download/) and [NodeJs](https://nodejs.org/en/download/).

Additonally to get up and running with the mysql database you need to install [mysql](https://dev.mysql.com/downloads/mysql/)

The easiet way to install these dependencies is using a package manager, as shown below for each target platform below:

-   **OSX**: [Homebrew](https://brew.sh/)
-   **WINDOWS**: [Chocolatly](https://chocolatey.org/)
    -- **Linux**: apt _Installed on most linux distributions by default_

## How to run locally

Clone the repo locally:

```sh
git clone https://github.com/braedencrankd/laravel-inertiajs-template.git
cd laravel-inertiajs-template
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

**Setup Database configuration:**

```sh
cp .env.example .env
```

Edit the database configuration section in the .env file to connect to database of your choice
