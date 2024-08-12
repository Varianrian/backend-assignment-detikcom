# Digital Perpustakaan berbasis Website

## Project Description:

Aplikasi ini merupakan aplikasi CMS (Content Management System) yang berfungsi sebagai perpustakaan digital. Aplikasi ini memungkinkan pengguna untuk menambahkan, mengedit, dan menghapus buku. Hak akses pengguna dibagi menjadi dua, yaitu admin dan user. User dapat melihat menambahkan, mengedit, dan menghapus buku yang ditambahkan user sendiri. Sedangkan admin dapat melihat, menambahkan, mengedit, dan menghapus buku yang ditambahkan oleh semua user.

<strong>Aplikasi ini dibangun menggunakan framework Laravel 10 dan MySQL sebagai database. Aplikasi yang dibuat tidak akan menggunakan template dari luar, melainkan dibuat dari awal dan tidak menggunakan library atau package yang tidak diperlukan seperti `filament`, `jetstream`, `livewire`, dsb.</strong>

## Technologies:

1.  Main Framework: Laravel 10
2.  Database: MySQL
3.  CSS Framework: Tailwind CSS

## Project Requirements:

Aplikasi ini di-develop menggunakan beberapa teknologi berikut:

1. PHP v8.1^
2. Composer
3. Node.js v20^
4. NPM v10^
5. MySQL
6. Git

## Project Features:

- Login (Admin & User)
- Register (Admin & User)
- Logout
- Add Book (Admin & User)
  - Upload Book Cover (image)
  - Upload Book File (pdf)
- Edit Book (Admin & User)
- Delete Book (Admin & User)
- View Book (Admin & User)
- Search Book (Admin & User)
- Pagination
- Upload Book Cover (image)
- Upload Book File (pdf)

## Project Scope:

- Admin

  - Login
  - Add Book
  - Edit Book
  - Delete Book
  - View Book
  - Search Book

- User
  - Login
  - Register
  - Add Book
  - Edit Book
  - Delete Book
  - View Book
  - Search Book

## Project Installation:

1. Clone this repository

```bash
git clone
```

2. Install composer dependencies

```bash
composer install
```

3. Install NPM dependencies

```bash
npm install
```

4. Create a copy of your .env file

```bash
cp .env.example .env
```

5. Generate an app encryption key

```bash
php artisan key:generate
```

6. Create an empty database for our application and import the database using the file `backend_detik.sql`

```bash
mysql -u username -p database_name < backend_detik.sql
```

7. In the .env file, add database information to allow Laravel to connect to the database
8. Migrate the database

```bash
php artisan migrate
```

9. Config storage link using this command

```bash
php artisan storage:link
```

10. Now you can run the project using this command

```bash
php artisan serve
```

11. You can add admin user using this command

```bash
php artisan app:create-admin
```
