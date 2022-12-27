## Running
### 1. Clone the project
```shell
git clone git@github.com:fnematov/napa-test.git
```
### 2. Update composer dependencies
```shell
cd napa-test
composer update
```
### 3. Migrate database and seeders
```shell
php artisan migrate --seed
```
### 4. Run project
```shell
php artisan serve
```
Open from your browser [http://localhost:8000](http://localhost:8000)

## Additionally
1. Username will generate randomly
2. All passwords are `password`
3. Username for ADMIN is `administrator`
