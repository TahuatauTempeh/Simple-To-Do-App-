# Todo App

A personal to-do list web app built with **Laravel**, **Blade** and **PostgreSQL**. Users can register, create categories, add tasks to each category, tick tasks off when done, and set a priority and due date.

## Features

- User accounts (register, log in, log out)
- Dashboard with task overview
- Categories, each with its own tasks
- View all tasks or filter by category
- Tick tasks as done
- Task priority (1 urgent, 2 normal, 3 laidback) and due date

## Tech Stack

- Laravel (PHP) with Blade templates
- Laravel Breeze for authentication
- Tailwind CSS compiled with Vite
- PostgreSQL (hosted on Aiven)

## Project Structure

```
todo-app/
├── backend/          # The whole Laravel application
│   ├── app/          # Models and controllers
│   ├── config/
│   ├── database/     # Migrations
│   ├── public/
│   ├── resources/    # Blade views, CSS and JS
│   ├── routes/
│   ├── storage/
│   ├── tests/
│   ├── artisan
│   ├── composer.json
│   ├── package.json
│   └── vite.config.js
│
├── .gitignore
└── README.md
```

Ignore the frontend folder since that was a mistake that I made and I can't be bothered to delete it.

## Database

| Table        | Purpose                                              |
|--------------|------------------------------------------------------|
| `users`      | Accounts (Laravel default)                           |
| `categories` | A user's categories (`category_name`, `colour`)      |
| `tasks`      | Tasks inside a category (`task_name`, `description`, `is_done`, `priority`, `due_date`, `completed_at`) |

All foreign keys cascade on delete, so deleting a category also deletes its tasks.

## Getting Started

Run everything from inside the `backend` folder.

```bash
cd backend

# Install PHP dependencies
composer install

# Copy the environment file and generate an app key
cp .env.example .env
php artisan key:generate
```

Open `.env` and fill in your PostgreSQL details:

```
DB_CONNECTION=pgsql
DB_HOST=
DB_PORT=
DB_DATABASE=
DB_USERNAME=
DB_PASSWORD=
DB_SSLMODE=require
```

Then:

```bash
# Create the tables
php artisan migrate

# Install JS dependencies and start Vite (keep this terminal open)
npm install
npm run dev
```

In a second terminal, start the Laravel server:

```bash
cd backend
php artisan serve
```


## Current Branches and Their Uses

| Branch           | Description              |
|------------------|--------------------------|
| `main`           | Stable production branch |
| `feat/database`  | Database feature branch  |
| `feat/models`    | Models for the thing     |