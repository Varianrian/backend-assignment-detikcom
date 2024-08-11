<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;

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

Route::get('/', function () {
    return view('pages.dashboard');
})->name('home')->middleware('auth');

Route::group(['prefix'=> 'books'], function () {
    Route::get('/', [BookController::class, 'index'])->name('books.index');
    Route::get('create', [BookController::class, 'create'])->name('books.create');
    Route::post('store', [BookController::class, 'store'])->name('books.store');
    Route::get('edit/{id}', [BookController::class, 'edit'])->name('books.edit');
    Route::post('update/{id}', [BookController::class, 'update'])->name('books.update');
    Route::get('delete/{id}', [BookController::class, 'delete'])->name('books.delete');
});

Route::group(['prefix' => 'auth'], function () {
    Route::get('login', [AuthController::class, 'login'])->name('login');
    Route::post('login/authenticate', [AuthController::class, 'authenticate'])->name('login.authenticate');
    Route::get('register', [AuthController::class, 'register'])->name('register');
    Route::post('register/store', [AuthController::class, 'store'])->name('register.store');
    Route::get('logout', [AuthController::class, 'logout'])->name('logout');
});
