## About Library Project

**Library project is a platform for books demonstration.**

## Installation

Clone the repository.

### Backend

Install all the dependencies using composer

```
composer install
```

Copy the example env file and make the required configuration changes in the .env file

```
cp .env.example .env
```

Generate a new application key

```
php artisan key:generate
```

Set the database connection in .env

Run the database migrations with seeds

```
php artisan migrate:fresh --seed
```

### Frontend

Install all packages using npm

```
npm install
```

Run

```
npm run dev
```

### Dependencies

- [datatables.net-dt": "^1.13.1](https://github.com/DataTables/Dist-DataTables-DataTables) - JQuery library for creating datatables

### Folders

- `app/Models` - Contains all the Eloquent models
- `app/Http/Controllers/Api` - Contains all controllers for api
- `app/Http/Controllers/Web` - Contains all controllers for web
