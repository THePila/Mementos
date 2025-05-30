<?php

use Illuminate\Support\Facades\Route;
use PHPUnit\Framework\Attributes\Group;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\LoginController;

Route::get('/', function () {
    return view('login');
});

Route::view('/login', 'login')->name('login');

Route::controller(RegisterController::class)->group(callback: function () {
    Route::get('/register', 'index')->name('register');
    Route::post('/register/store', action: 'store')->name('register.store');
});

Route::controller(LoginController::class)->group(callback: function () {
    Route::post('/login/authenticate', 'authenticate')->name('login.authenticate');
    Route::get('/logout', 'logout')->name('logout');
    Route::post('/forgot-password', 'forgotPassword')->name('forgot.password');

});

Route::get('/home', function () {
    return view('home');
})->middleware('auth');

Route::get('/forgot', function () {
    return view('forgot_password');
})->name('forgot.password.view');