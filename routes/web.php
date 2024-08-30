<?php

use App\Http\Controllers\Admin\Auth\LoginController;
use App\Http\Controllers\Admin\AuthController;
use App\Http\Controllers\Admin\AuthorController;
use App\Http\Controllers\Admin\BookController;
use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\ProfileController;
use App\Http\Controllers\Admin\PublisherController;
use App\Http\Controllers\Admin\UserController;
use Illuminate\Support\Facades\Route;
use Spatie\FlareClient\View;

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
    return view('client.layouts.client_master');
});

Route::get('/home', function () {
    return view('client.home');
});


// Route::group(['prefix' => 'admin', 'as' => 'admin.'], function () {
//     Route::get('/', [LoginController::class, 'login'])->name('login');
//     Route::post('/', [LoginController::class, 'postLogin'])->name('login');
// });

Route::group(['prefix' => 'admin', 'as' => 'admin.'], function () {
    Route::get('/', [AuthController::class, 'login'])->name('login');
    Route::post('/', [AuthController::class, 'postLogin'])->name('login');
});

Route::group(['prefix' => 'admin', 'as' => 'admin.'], function () {
    Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

    //Profile
    Route::group(['prefix' => 'profile', 'as' => 'profile.'], function () {
        Route::get('/', [ProfileController::class, 'edit'])->name('edit');
        Route::post('/', [ProfileController::class, 'update'])->name('update');
        Route::get('/change-password', [ProfileController::class, 'edit'])->name('change-password');
        Route::post('/change-password', [ProfileController::class, 'updatePassword'])->name('change-password.update');
    });

    //Category
    Route::group(['prefix' => 'categories', 'as' => 'categories.'], function () {
        Route::get('/', [CategoryController::class, 'index'])->name('index');
        Route::get('/create', [CategoryController::class, 'create'])->name('create');
        Route::post('/', [CategoryController::class, 'store'])->name('store');
        Route::get('/{category}/edit', [CategoryController::class, 'edit'])->name('edit');
        Route::patch('/{category}', [CategoryController::class, 'update'])->name('update');
        Route::delete('/{category}', [CategoryController::class, 'destroy'])->name('destroy');
    });

    //Author
    Route::group(['prefix' => 'authors', 'as' => 'authors.'], function () {
        Route::get('/', [AuthorController::class, 'index'])->name('index');
        Route::get('/create', [AuthorController::class, 'create'])->name('create');
        Route::post('/', [AuthorController::class, 'store'])->name('store');
        Route::get('/{author}/edit', [AuthorController::class, 'edit'])->name('edit');
        Route::patch('/{author}', [AuthorController::class, 'update'])->name('update');
        Route::delete('/{author}', [AuthorController::class, 'destroy'])->name('destroy');
    });

    //Publisher
    Route::group(['prefix' => 'publishers', 'as' => 'publishers.'], function () {
        Route::get('/', [PublisherController::class, 'index'])->name('index');
        Route::get('/create', [PublisherController::class, 'create'])->name('create');
        Route::post('/', [PublisherController::class, 'store'])->name('store');
        Route::get('/{publisher}/edit', [PublisherController::class, 'edit'])->name('edit');
        Route::patch('/{publisher}', [PublisherController::class, 'update'])->name('update');
        Route::delete('/{publisher}', [PublisherController::class, 'destroy'])->name('destroy');
    });

    //Book
    Route::group(['prefix' => 'books', 'as' => 'books.'], function () {
        Route::get('/', [BookController::class, 'index'])->name('index');
        Route::get('/create', [BookController::class, 'create'])->name('create');
        Route::post('/', [BookController::class, 'store'])->name('store');
        Route::get('/{book}/edit', [BookController::class, 'edit'])->name('edit');
        Route::patch('/{book}', [BookController::class, 'update'])->name('update');
        Route::delete('/{book}', [BookController::class, 'destroy'])->name('destroy');
    });

    //User
    Route::group(['prefix' => 'users', 'as' => 'users.'], function () {
        Route::get('/', [UserController::class, 'index'])->name('index');
        Route::get('/create', [UserController::class, 'create'])->name('create');
        Route::post('/', [UserController::class, 'store'])->name('store');
        Route::get('/{user}/edit', [UserController::class, 'edit'])->name('edit');
        Route::patch('/{user}', [UserController::class, 'update'])->name('update');
        Route::delete('/{user}', [UserController::class, 'destroy'])->name('destroy');
    });
});
