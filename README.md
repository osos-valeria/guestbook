### Quick project start
Open project folder in terminal:
1. Run `composer install`.
2. Run `docker-compose up -d --build`. 
3. Run `docker-compose exec app php artisan migrate`.
4. If you want to add data to DB, you can run seeds with command: `docker-compose exec app php artisan db:seed`

The app is available at: http://localhost:80/ (If port was not changed).

-----

You can use the [postman collection](Guestbook.postman_collection.json) to check endpoints.

Use Bearer token for authorization (it can be obtained during registration or login).
