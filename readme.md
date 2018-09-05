# Site RP v1.1
### with RPX
> Version 1.0.4

Prepare your .env file there with database connection and other settings.

## Getting Started

```
composer install
php artisan migrate --seed
php artisan key:generate
php artisan passport:install
npm install
npm run dev
php artisan serve
```
if you use CKEditor fields, there are a few more commands to launch for Laravel Filemanager package:

```
php artisan vendor:publish --tag=lfm_config
php artisan vendor:publish --tag=lfm_public
```

### Login

Email: admin@admin.com
Password: password
