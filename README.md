## JESPIRE - Jetstream Spatie Livewire
This is a roles and permissions boilerplate that allow you to jumpstart your application development without worrying about setting roles and permissions management. After clone this project please run the following command
```
composer install
cp .env.example .env
php artisan key:generate
php artisan db:seed
npm install && npm run dev
```
After change your .env config and create database accordingly please run migration and seed command
```
php artisan migrate
php artisan db:seed
```
Administrator user is:
username: admin@gmail.com
password: admin
# reservaITSTA
