# KhmerMart24

**KhmerMart24** is a modern e-commerce web application built with **Laravel 11** and **Vue.js 3**. Users can register, browse products, and interact with the website. The project includes a homepage, about us page, user registration page, and handles post-registration actions.

---

## Table of Contents

-   [Features](#features)
-   [Installation & Setup](#installation--setup)
-   [Usage](#usage)
-   [Technologies](#technologies)
-   [Contributing](#contributing)
-   [License](#license)

---

## Features

The project currently includes the following completed tasks:

-   **Homepage** with a welcoming layout
-   **About Us page** describing the project/company
-   **User Registration page** for creating new accounts
-   **Post-registration handling** to store user data in the database
-   Responsive UI using Tailwind CSS
-   Clean and organized code structure using Laravel and Vue.js

---

## Installation & Setup

Follow these steps to get the project running on your local machine:

### 1. Clone the repository

```bash
git clone https://github.com/yourusername/khmermart24.git
cd khmermart24
```

### 2. Install backend dependencies

```bash
composer install
```

### 3. Configure environment

```bash
cp .env.example .env
php artisan key:generate
Open .env and update the following with your local settings:
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=your_database_name
DB_USERNAME=your_database_user
DB_PASSWORD=your_database_password
```

### 4. Run migrations

```bash
php artisan migrate
```

### 5. Install frontend dependencies

```bash
npm install
npm run dev
```

### 6.Start the development server

```bash
php artisan serve
```
