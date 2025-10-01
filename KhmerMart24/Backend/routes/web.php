<?php

use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\ListingController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\PageController;
use Illuminate\Support\Facades\Route;

Route::controller(AuthController::class)->group(function () {
    // note: how the login Form
    Route::get('/login', 'showLoginForm')->name('login.form');
    // note: Handel the form submission
    Route::post('/login', 'login')->name('login');
    // note: how the registration form
    Route::get('/register', 'showRegisterForm')->name('register.form');
    // note: Handle the form submission;
    Route::post('/register', 'register')->name('register.store');
    Route::post('/logout', 'logout')->name('logout');
});


Route::controller(PageController::class)->group(function () {
    //note: home page
    Route::get('/', 'home')->name('index');
    //note: about page
    Route::get('/about', 'about')->name('about');
    Route::get('/user', 'user')->name('user');
});


Route::prefix('admin')->group(function () {
    Route::get('dashboard', [AdminController::class, 'index'])->name('admin.dashboard');
    Route::resource('category', CategoryController::class);
    Route::resource('listing', ListingController::class);
});
