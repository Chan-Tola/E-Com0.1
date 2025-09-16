<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\PageController;
use Illuminate\Support\Facades\Route;


//note: home page
Route::get('/', [PageController::class, 'home'])->name('index');
//note: about page
Route::get('/about', [PageController::class, 'about'])->name('about');
// note: Show the registration form
Route::get('/register', [AuthController::class, 'showRegisterForm'])->name('register.form');
// note: Handle the form submission;
Route::post('/register', [AuthController::class, 'register'])->name('register.store');
