## Setup
- Run the following commands to get a functional and seeded application:
  ```
  php artisan key:generate
  php artisan migrate:fresh
  php artisan db:seed
  npm install
  npm run dev
  php artisan serve
  ```

## About
Laravel/Vue/PostgreSQL MVP web application which manages all owners, addresses, cars.
Elegant examples of Vue.js components and interation between Laravel/Vue.
It manages/processes database records in 2 ways.
-Eloquent
-DB facade
Administrator can view/edit/delete owners, addresses, cars.

