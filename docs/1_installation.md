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
*   Composer

## Install dependencies

To install dependencies typed the following commands :

```bash
composer install
```

## Environnements

To make the project work on your machine, remember to configure the environment. A documentation on this subject is present [here](2_environnements.md).

## Initialize the databases

Configure the database by copying the last migrations file available [here](../tree/main/database/migrations/) to your DBMS.

