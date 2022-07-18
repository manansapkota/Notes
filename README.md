# Steps to run this project

## 1. Clone this Repo

## 2. Required Dependencies
- [Composer](https://getcomposer.org/download/)
- [PHP,Apache,MySQL](https://www.apachefriends.org/download.html)


## 3. After installing all the required dependencies
- Change directory to cloned project
- Run this command in terminal
    ```
    composer install
    ```
    This will installed all the necessary dependencies to run this project
- Create Database named "notes" in MySQL
- Run this command to migrate all tables in database
    ```
    php artisan migrate
    ```
- Now finally run the project, run this command
    ```
    php artisan serve
    ```
    This will run the project in http://127.0.0.1:8000.Use this link to see the run project in browser.
