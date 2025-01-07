# Setup Guide

## Prerequisites

Ensure that you have the following installed on your machine:

- PHP (>=8.2 recommended)
- Composer
- MySQL (or another database supported by Laravel)
- Node.js and npm (optional, for frontend assets)

## Installation Steps

### 1. Clone the Repository

Clone this repository to your local machine:

```bash
git clone git@github.com:RomanFedorov03/w-net-test.git
cd w-net-test
```

### 2. Set Up Environment Variables

Copy the `.env.example` file to create a new `.env` file:

```bash
cp .env.example .env
```

Update the `.env` file with your local environment settings, including:

- **Database credentials**
    - `DB_CONNECTION`, `DB_HOST`, `DB_PORT`, `DB_DATABASE`, `DB_USERNAME`, `DB_PASSWORD`
- Other necessary configurations (e.g., application key, cache, queue, mail settings).

Generate an application key:

```bash
php artisan key:generate
```

### 3. Install Dependencies

Install the required PHP dependencies using Composer:

```bash
composer install
```

### 4. Run Database Migrations

Run the migrations to set up the database schema:

```bash
php artisan migrate
```

### 5. Seed the Database (Optional)

If the project includes seeders for sample data, you can seed the database:

```bash
php artisan db:seed
```

### 6. Generate API Documentation

Generate the API documentation (if applicable):

```bash
php artisan scribe:generate
```

### 7. Serve the Application

Start the development server:

```bash
php artisan serve
```

Visit the application in your browser at `http://127.0.0.1:8000`.


### 8. Access API Documentation

The API documentation is available at: `http://127.0.0.1:8000/docs`
