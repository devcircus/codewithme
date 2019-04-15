<?php

use Illuminate\Support\Facades\Route;

Route::redirect('/', '/dashboard');

Route::group(['middleware' => ['auth']], function ($route) {
    // Dashboard
    $route->get('/dashboard', Dashboard\Index::class)->name('dashboard');
    // $route->get('/sessions', Sessions\Index::class)->name('sessions');
    // $route->get('/friends', Friends\Index::class)->name('friends');
});

// Authentication and Registration
// Auth - Login
Route::get('/login', Auth\Login\Show::class)->middleware('guest')->name('login');
Route::post('/login', Auth\Login\Store::class)->middleware('guest')->name('login.attempt');
Route::get('/logout', Auth\Logout\Store::class)->middleware('auth')->name('logout');

// Auth - Register
Route::get('/register', Auth\Register\Show::class)->middleware('guest')->name('register');
Route::post('/register', Auth\Register\Store::class)->middleware('guest')->name('register.attempt');

// Password Reset
Route::get('/password/reset/{token}', Auth\PasswordReset\Show::class)->middleware('guest')->name('password.reset');
Route::get('/password/reset', Auth\PasswordResetRequest\Show::class)->middleware('guest')->name('password.request');
Route::post('/password/email', Auth\PasswordResetRequest\SendEmail::class)->middleware('guest')->name('password.email');
Route::post('/password/reset', Auth\PasswordReset\Update::class)->middleware('guest')->name('password.update');

// Auth - Email Verification
// Route::get('/email/verify', 'Auth\Verification@show')->name('verification.notice');
// Route::get('/email/verify/{id}', 'Auth\Verification@verify')->name('verification.verify');
// Route::get('/email/resend', 'Auth\Verification@resend')->name('verification.resend');
