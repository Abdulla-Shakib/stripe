### Installation
1. Run `composer install` <br>
2. Run `npm install` <br>
3. Create .env file copy all code from .env.example
4. Set up STRIPE_KEY and STRIPE_SECRET From your stripe account
5. Accordingly create a database and its name stripe_payment <br>
If DB_USERNAME and DB_PASSWORD necessary it is good enough. Otherwise root name remove <br>
6. Run `php artisan migrate:fresh --seed` <br>
7. Run `php artisan serve`
