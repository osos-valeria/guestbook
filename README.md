Open project folder in terminal:
1. Run `composer install`.
2. Run `docker-compose up -d --build`. 
3. Run `docker-compose exec app php artisan migrate`.

The app is available at: http://localhost:80/ (If port was not changed).
