# Environnements

[Back to summary](index.md)

There are several different environments :

*   `local`: development environment
*   `prod`: production environment

The .env file defines the default values of the env vars needed by the application.

## Overriding environment values

For each environment, it will be necessary to create a local file containing the required environment variables (e.g. to define new values on your local machine).

*   `.env.local` : overrides the default values for all environments but only on the machine which contains the file.

## Environment values required

The current environment is `local` and we use `mysql` by default for the DBMS.

*   `APP_ENV` e.g. local
*   `DB_CONNECTION` e.g. mysql
*   `DB_HOST` e.g. 127.0.0.1
*   `DB_PORT` e.g. 3306
*   `DB_DATABASE` e.g. phpframework
*   `DB_USERNAME` e.g. root
*   `DB_PASSWORD` e.g. root
