# SLB
&copy; Simple Laravel Bookstore &copy; 
## Install Composer
Install composer from [Composer](https://getcomposer.org/) and 
add the path to system environment.

### 1. Clone GitHub repo for this project locally
```sh
git clone https://github.com/iamnoyon/SLB.git
```
### 2. cd into your project
```sh
cd SLB
```
### 3. Open Terminal On Project Folder
### 4. Install Composer Dependencies
```sh
composer install
```
### 5. Create a copy of your .env file
```sh
cp .env.example .env
```
### 6. Generate an app encryption key
```sh
php artisan key:generate
```
### 7. Create an empty database
I used xampp (mysql)
### 8. Edit the .env file
In the .env file, add database information. i.e:
```sh
DB_HOST,
DB_PORT,
DB_DATABASE,
DB_USERNAME, and
DB_PASSWORD
```
### 9. Migrate the database
```sh
php artisan migrate
```
### 10. [Op]: Seed the database
```sh
php artisan db:seed
```
### 11. Run Laravel App
```sh
php artisan serve
```

### 12. Test App
```sh
http://127.0.0.1:8000/
```
