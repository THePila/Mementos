<?php

use Illuminate\Support\Facades\Route;
use PHPUnit\Framework\Attributes\Group;
use App\Http\Controllers\RegisterController;

Route::get('/', function () {
    return view('login');
});

Route::view('/login', 'login')->name('login');

Route::controller(RegisterController::class)->group(callback: function () {
    Route::get('/register', 'index')->name('register');
    Route::post('/register/store', action: 'store')->name('register.store');
    // Route::get('/register/verify/{token}', 'verify')->name('verify');
});
