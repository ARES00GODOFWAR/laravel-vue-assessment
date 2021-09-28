# Laravel Vue Assessment

## Dependencies

- PHP (at least 7.4.22)
- [Composer](getcomposer.org)
- [Xampp](https://www.apachefriends.org/download.html)
- npm
- MySQL

## Setting up

- Copy `.env.example` to `.env`
- Modify values in `.env` if needed

### Run the following from the CLI
- `$ git checkout master`
- `$ git pull`
- `$ php artisan key:generate`
- `$ npm install`
- `$ composer install`
- `$ php artisan cache:clear`
- `$ php artisan config:clear`
- `$ composer dump-autoload`

Initialize and seed the database:

```php
php artisan migrate
```

Finally, start the project:

```php
php artisan serve
npm run watch
```
