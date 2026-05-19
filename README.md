# stripeVC

A lightweight PHP REST API for creating and managing Stripe virtual cards, built with Slim Framework 3.

## Tech Stack

- **PHP** 7.4 / 8.x
- **Slim Framework** 3 — lightweight REST API routing
- **Stripe PHP SDK** — virtual card creation and management
- **Doctrine Migrations** — database schema versioning
- **Firebase JWT** — token-based authentication
- **Predis** — optional Redis caching layer
- **MySQL** — relational data persistence
- **PHPStan / Psalm / Rector** — static analysis and code quality

## Features

- Create and manage Stripe virtual cards via REST API
- JWT-based authentication
- Database migrations with Doctrine
- Optional Redis support for caching
- CORS support out of the box
- Input validation with Respect/Validation
- Static analysis configured (PHPStan + Psalm)

## Requirements

- PHP >= 7.4
- Composer
- MySQL
- A Stripe account with Issuing enabled
- Redis (optional)

## Installation

```bash
git clone https://github.com/Turendu/stripeVC.git
cd stripeVC
composer install
```

## Configuration

Copy the example environment file and fill in your values:

```bash
cp .env.example .env
```

```env
DB_HOST=127.0.0.1
DB_NAME=your_database
DB_USER=your_user
DB_PASS=your_password
DB_PORT=3306

APP_DOMAIN=localhost
SECRET_KEY=your_jwt_secret

REDIS_ENABLED=false
REDIS_URL=

DISPLAY_ERROR_DETAILS=true
```

> **Note:** You will also need to add your Stripe secret key. Make sure your Stripe account has the Issuing feature enabled to create virtual cards.

## Database Migrations

Run pending migrations:

```bash
php migrations.php migrations:migrate
```

## Running the App

```bash
php -S localhost:8080 -t public
```

The API will be available at `http://localhost:8080`.

## Project Structure

```
stripeVC/
├── src/                  # Application source code (PSR-4 autoloaded)
├── public/               # Entry point (index.php)
├── data/doctrine/        # Migration files
├── .env.example          # Environment variables template
├── composer.json
├── migrations.php        # Doctrine CLI config
├── phpstan.neon          # PHPStan config
└── rector.php            # Rector config
```

## License

MIT
