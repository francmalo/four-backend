# Money Tracker API (Laravel)

## Objective
Backend Money Tracker API built with Laravel.

## Features
- Create users
- Create multiple wallets per user
- Add income & expense transactions
- View user profile (wallets + balances + total balance)
- View wallet (balance + transactions)

## Tech Stack
- Laravel 12
- MySQL
- REST API

## Installation

```bash
git clone <https://github.com/francmalo/four-backend>
cd money-tracker-api
composer install
cp .env.example .env
php artisan key:generate
php artisan migrate
php artisan serve
