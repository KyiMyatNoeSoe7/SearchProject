# Search Project
## Requirements

- PHP 7
- Apache 
- MySQL 8
- Composer 2.1.6
- Laravel 8

## Installation

Please check the official laravel installation guide for server requirements before you start.
[Official Documentation](https://laravel.com/docs/8.x)

Clone the repository
```
git clone https://github.com/KyiMyatNoeSoe7/SearchProject.git
```
Switch to the repo folder
```
cd SearchProject
```
Install all the dependencies using composer
```
composer install
```
Copy the example env file and make the required configuration changes in the .env file
```
cp .env.example .env
```
Generate a new application key
```
php artisan key:generate
```
Run the database migrations (Set the database connection in .env before migrating)
```
php artisan migrate
```
Start the local development server
```
php artisan serve
```
