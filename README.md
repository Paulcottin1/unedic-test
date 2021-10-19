# API Symfony Unedic Tests

## Prerequisites (Development environement) (You can use DockerFile)
    - Linux
    - Php 7.3
    - MySQL 5.7
    - Apache2
## Installation

Clone the repository Github

```
git clone https://github.com/Paulcottin1/unedic-test.git
```

Create file `.env.local` at the root of the project by making a copy of the file `.env` in order to configure the environment variables.

Install dependencies

```
composer install
```

Create the database

```
php bin/console doctrine:database:create
```

Create the different tables

```
php bin/console doctrine:schema:update -f
```

Install fixtures

```
php bin/console doctrine:fixtures:load
```

Generate the SSL Keys:
```
php bin/console lexik:jwt:generate-keypair
```

Run the project

```
symfony server:start
```

URL documentation
```
http://127.0.0.1:8000/docs
```

Use admin account to try request after login

> login: admin@gmail.com
>
> password: admin
