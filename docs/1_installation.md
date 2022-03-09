# Installation

[Back to summary](index.md)

## Download the project

Consider reading the [contribution guide](/CONTRIBUTING.md).

```bash
cd your path (example : C:/wamp64/www)
git clone https://github.com/cdiot/php-framework.git
```

## Prerequisites

*   PHP >= 8.0
*   Enable URL rewriting on your web server
*   VirtualHost
*   Composer

## Install dependencies

To install dependencies typed the following commands :

```bash
composer install
```

## Environnements

To make the project work on your machine, remember to configure the environment. A documentation on this subject is present [here](2_environnements.md).

## Initialize the database

Configure the database by copying the last migrations file available [here](../database/migrations/) to your DBMS.

## Configure the routes

Routes are defined in route files, which are located in the [routes](../routes/web.php) directory. These files are automatically loaded. The routes defined in routes/web.php may be accessed by entering the defined route's URL in your browser.

