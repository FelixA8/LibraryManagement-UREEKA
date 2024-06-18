<p align="center"><a href="https://laravel.com" target="_blank"><img src="https://raw.githubusercontent.com/laravel/art/master/logo-lockup/5%20SVG/2%20CMYK/1%20Full%20Color/laravel-logolockup-cmyk-red.svg" width="400" alt="Laravel Logo"></a></p>

<p align="center">
<a href="https://github.com/laravel/framework/actions"><img src="https://github.com/laravel/framework/workflows/tests/badge.svg" alt="Build Status"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/dt/laravel/framework" alt="Total Downloads"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/v/laravel/framework" alt="Latest Stable Version"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/l/laravel/framework" alt="License"></a>
</p>

# LibraryManagement-UREEKA

## Overview

LibraryManagement-UREEKA is a backend API built with Laravel for managing a library system. This project allows for registering users, logging in, and performing CRUD operations on books. The API is designed to be used with a frontend interface or tested using tools like Postman.

## Requirements

-   PHP 7.4+
-   Composer
-   XAMPP for MySQL database

## Installation

### Step 1: Clone the Repository

```bash
git clone https://github.com/FelixA8/LibraryManagement-UREEKA.git
cd LibraryManagement-UREEKA
```

### Step 2: Install Dependencies

```bash
composer install
```

### Step 3: Configure Environment Variables

Rename `.env.example` to `.env` and configure your environment variables, especially the database settings.

```plaintext
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=your_database_name
DB_USERNAME=your_database_user
DB_PASSWORD=your_database_password
```

### Step 4: Generate Application Key

```bash
php artisan key:generate
```

### Step 5: Run Migrations

```bash
php artisan migrate
```

## Running the Server

Start the Laravel development server:

```bash
php artisan serve
```

Visit `http://127.0.0.1:8000` to access the application.

## Using XAMPP for MySQL

1. **Download and Install XAMPP**: [Download XAMPP](https://www.apachefriends.org/index.html)
2. **Start Apache and MySQL** from the XAMPP Control Panel.
3. **Create a Database**:
    - Open [phpMyAdmin](http://localhost/phpmyadmin/)
    - Create a new database for the project.

## Creating a User and Updating Role to Admin

1. **Register a User**:

    - Use Postman or a similar tool to send a POST request to `http://127.0.0.1:8000/api/register`.
    - **URL**: `http://127.0.0.1:8000/api/register`
    - **Method**: POST
    - **Body**:
        ```json
        {
            "name": "admin",
            "email": "admin@example.com",
            "password": "adminpassword"
        }
        ```

2. **Access phpMyAdmin**:

    - Open [phpMyAdmin](http://localhost/phpmyadmin/)
    - Navigate to the database you created for this project.

3. **Modify User Role**:
    - Find the `users` table.
    - Locate the user you just created (e.g., `admin@example.com`).
    - Change the `role` field to `admin`.

## API Endpoints

### Register User

-   **URL**: `http://127.0.0.1:8000/api/register`
-   **Method**: POST
-   **Body**:
    ```json
    {
        "name": "admin",
        "email": "admin@example.com",
        "password": "adminpassword"
    }
    ```

### Login User

-   **URL**: `http://127.0.0.1:8000/api/login`
-   **Method**: POST
-   **Body**:
    ```json
    {
        "email": "admin@example.com",
        "password": "adminpassword"
    }
    ```

### List Books

-   **URL**: `http://127.0.0.1:8000/api/books`
-   **Method**: GET

### Create Book

-   **URL**: `http://127.0.0.1:8000/api/books`
-   **Method**: POST
-   **Headers**:
    -   Authorization: Bearer `token`
-   **Body**:
    ```json
    {
        "judul": "buku",
        "isbn": "12345123",
        "penulis": "lisan al gaib",
        "tahun_terbit": 2024
    }
    ```

### Update Book

-   **URL**: `http://127.0.0.1:8000/api/books/1`
-   **Method**: PUT
-   **Headers**:
    -   Authorization: Bearer `token`
-   **Body**:
    ```json
    {
        "judul": "buku yang sudah diubah namanya",
        "isbn": "1234512369",
        "penulis": "lisan al gaib vq",
        "tahun_terbit": 2024
    }
    ```

### Delete Book

-   **URL**: `http://127.0.0.1:8000/api/books/1`
-   **Method**: DELETE
-   **Headers**:
    -   Authorization: Bearer `token`

## Testing with Postman

You can import the provided Postman collection to quickly test the API endpoints. Access it in root directory `postman_collection.json`.
