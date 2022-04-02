# S2_PHP / Vanilla PHP API project

## How to install ?

1. Be sure that you have PHP >= 8.0 installed
2. Install https://getcomposer.org/download/
3. Place the repository in your server (wamp64/www/S2_PHP). Be sure that your link is starting with S2_PHP.
4. Start with a `composer install` to install the vendor
5. Go to http://localhost/S2_PHP/
6. Change `config/credentials.php` to match your database password
7. Import `data/php_imac_s2.php` in your database.
8. It should be working now !

## How to create a new CRUD ?

1. Create your new *entity* in `models/`
2. Upload your new *database* in `data/`
3. Create a new *controller* in `controller/`
4. Add your new *routes* to $router in `app/routes.php`

### Check the "Example" CRUD example.
