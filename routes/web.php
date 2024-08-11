<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\BookCategoryController;
use App\Http\Controllers\BookController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::redirect('/', '/books')->name('home');

Route::group(['prefix' => 'books', 'middleware' => 'auth'], function () {
    Route::get('/', [BookController::class, 'index'])->name('books.index');
    Route::get('create', [BookController::class, 'create'])->name('books.create');
    Route::post('store', [BookController::class, 'store'])->name('books.store');
    Route::get('edit/{id}', [BookController::class, 'edit'])->name('books.edit');
    Route::post('update/{id}', [BookController::class, 'update'])->name('books.update');
    Route::get('delete/{id}', [BookController::class, 'delete'])->name('books.delete');
    Route::get('search', [BookController::class, 'search'])->name('books.search');
    Route::get('filter', [BookController::class, 'filter'])->name('books.filter');
});

Route::group(['prefix' => 'book-categories', 'middleware' => ['auth', 'admin']], function () {
    Route::get('/', [BookCategoryController::class, 'index'])->name('book-categories.index');
    Route::get('create', [BookCategoryController::class, 'create'])->name('book-categories.create');
    Route::post('store', [BookCategoryController::class, 'store'])->name('book-categories.store');
    Route::get('edit/{id}', [BookCategoryController::class, 'edit'])->name('book-categories.edit');
    Route::post('update/{id}', [BookCategoryController::class, 'update'])->name('book-categories.update');
    Route::get('delete/{id}', [BookCategoryController::class, 'delete'])->name('book-categories.delete');
    Route::get('search', [BookCategoryController::class, 'search'])->name('book-categories.search');
});

Route::group(['prefix' => 'auth'], function () {
    Route::get('login', [AuthController::class, 'login'])->name('login');
    Route::post('login/authenticate', [AuthController::class, 'authenticate'])->name('login.authenticate');
    Route::get('register', [AuthController::class, 'register'])->name('register');
    Route::post('register/store', [AuthController::class, 'store'])->name('register.store');
    Route::get('logout', [AuthController::class, 'logout'])->name('logout');
});
