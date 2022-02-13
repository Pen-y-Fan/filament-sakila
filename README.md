# Filament Sakila

This project has been created to practice using [Filament](https://filamentphp.com/docs/2.x/tables/installation), the
Sakila database I created [Pen-y-Fan/sakila](https://github.com/Pen-y-Fan/sakila) has been used as test data.

## Requirements

This is a Laravel 9 project. The requirements are the same as a
new [Laravel 9 project](https://laravel.com/docs/9.x/installation).

- [8.0+](https://www.php.net/downloads.php)
- [Composer](https://getcomposer.org)

Recommended:

- [Git](https://git-scm.com/downloads)

## Clone

See [Cloning a repository](https://help.github.com/en/articles/cloning-a-repository) for details on how to create a
local copy of this project on your computer.

e.g.

```sh
git clone git@github.com:Pen-y-Fan/filament-sakila.git
```

## Install

Install all the dependencies using composer

```sh
cd sakila
composer install
```

## Create .env

Create an `.env` file from `.env.example`

```shell script
composer post-root-package-install
```

## Generate APP_KEY

Generate an APP_KEY using the artisan command

```shell script
php artisan key:generate
```

## Configure Laravel

This experiment uses models and seeders to generate the tables for the database. Tests will use the seeded data, which
is based on the Sakila database. configure the Laravel **.env** file with the **database**, updating **username** and
**password** as per you local setup.

```text
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=filament_sakila
DB_USERNAME=YourDatabaseUserName
DB_PASSWORD=YourDatabaseUserPassword
```

## Create the database

The database will need to be manually created e.g.

```shell
mysql -u YourDatabaseUserName
CREATE DATABASE filament_sakila CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci;
exit
```

Although Laravel is compatible with different database servers, some fields used in this database will only work on
MySQL servers.

## Install Database

This project uses models and seeders to generate the tables for the database. Tests will use the seeded data, which is
based on the Sakila database.

```shell
php artisan migrate
php artisan db:seed
```

## Run tests

To make it easy to run all the PHPUnit tests a composer script has been created in **composer.json**. From the root of
the projects, run:

```shell script
composer tests
```

You should see the results in testDoc format:

```text
PHPUnit 9.5.13 by Sebastian Bergmann and contributors.

Example (Tests\Unit\Example)
 ✔ That true is true

Example (Tests\Feature\Example)
 ✔ The application returns a successful response

User (Tests\Feature\User)
 ✔ A user can be created
```

## Code standard

Easy Coding Standard (ECS) is used to check for style and code standards, [PSR-12](https://www.php-fig.org/psr/psr-12/) 
is used. Regularly run code standard checks to automatically clean up your code. In particular run before committing any 
code.

To make it easy to run Easy Coding Standard (ECS) a composer script has been created in **composer.json**. From the 
root of the projects, run:

```shell script
composer check-cs
```

You should see the results:

```text
                                                                                                                        
 [OK] No errors found. Great job - your code is shiny in style!                                                         
                                                                                                                        
```

If there are any warning, ECS will advise you to run --fix to fix them, this also has a composer script:

```shell
composer fix-cs
```

Sometimes the fix command needs to be run several times, as one fix will identify more problems, keep running the fix-cs 
until you get the OK message.

## Static Analysis

PhpStan is used to run static analysis checks. Larastan has been installed, which is PhpStan and Laravel rules. 
Regularly run static analysis checks to help identify problems. In particular run before committing any code.

To make it easy to run PhpStan a composer script has been created in **composer.json**. From the
root of the projects, run:

```shell script
composer check-cs
```

You should see the results:

```text
                                                                                                                        
 [OK] No errors                                                                                                         
                                                                                                                                                                                                                                           
```

If PhpStan identifies any problems then review and fix them one by one.

## Filament

To access the Filament dashboard you will need to create a filament user:

```shell
php artisan make:filament-user
```

Follow the prompts for name, email and password

Once created navigate to: /admin and login. You will see the admin portal.

## Contributing

This is a **personal project**. Contributions are **not** required. Anyone interested in developing this project are
welcome to fork or clone for your own use.

## Credits

- [Michael Pritchard \(AKA Pen-y-Fan\)](https://github.com/pen-y-fan).

## License

MIT License (MIT). Please see [License File](LICENSE.md) for more information.

The contents of the Sakila database, namely the **sakila-schema.sql** and **sakila-data.sql** files form the basis of
this project. The Sakila database is licensed under the New BSD license, the Sakila database does not need to be
downloaded. Laravel will migrate and seed the database.

