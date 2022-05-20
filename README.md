# S2_PHP / Vanilla PHP API project

## How to install ?

1. Be sure that you have PHP >= 8.0 installed
2. Install https://nodejs.org/en/download/
3. Install https://getcomposer.org/download/
4. Place the repository in your server (wamp64/www/S2_PHP). Be sure that your link is starting with S2_PHP.
5. Start with a `npm install` to install the node_modules folder
6. Then go into your api folder and install composer dependencies with a `cd api; composer install` to install the vendor folder
7. Change `api/config/credentials.php` to match your database password.
8. Import `api/data/php_imac_s2.php` in your database.
9. Go to http://localhost/S2_PHP/
11. It should be working now !

## How to create a new CRUD ?

1. Create your new *entity* in `api/models/`
2. Upload your new *database* in `api/data/`
3. Create a new *controller* in `api/controller/`
4. Add your new *routes* to $router in `api/app/routes.php`
