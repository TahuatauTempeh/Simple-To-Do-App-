# Todo App

A fullstack Todo application with a **Laravel API backend** and a **standalone Tailwind CSS frontend**.

## Project Structure

```
todo-app/
├── backend/          # Laravel application (PHP + Composer)
│   ├── app/
│   ├── config/
│   ├── database/
│   ├── public/
│   ├── resources/
│   ├── routes/
│   ├── storage/
│   ├── tests/
│   ├── artisan
│   ├── composer.json
│   ├── package.json
│   └── vite.config.js
│
├── frontend/         # Standalone frontend (Vite + Tailwind CSS v4)
│   ├── src/
│   │   ├── css/app.css
│   │   ├── js/app.js
│   │   ├── views/
│   │   └── index.html
│   ├── public/
│   ├── package.json
│   └── vite.config.js
│
├── .gitignore
└── README.md
```

---

## Getting Started

### Backend (Laravel)

```bash
cd backend

# Install PHP dependencies
composer install

# Copy environment file and generate app key
cp .env.example .env
php artisan key:generate

# Run migrations
php artisan migrate

# Install JS dependencies and start Vite
npm install
npm run dev

# Start the Laravel dev server (in a separate terminal)
php artisan serve
```

The backend will be available at: `http://localhost:8000`

---

### Frontend

```bash
cd frontend

# Install dependencies
npm install

# Start Vite dev server
npm run dev
```

The frontend dev server will be available at: `http://localhost:5173`

To build for production:

```bash
npm run build
```

---

## Branches

| Branch           | Description              |
|------------------|--------------------------|
| `main`           | Stable production branch |
| `feat/database`  | Database feature branch  |
