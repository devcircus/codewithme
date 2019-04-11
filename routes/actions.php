<?php

Route::redirect('/', '/dashboard');

Route::group(['middleware' => ['auth']], function ($route) {
    // Dashboard
    $route->get('/dashboard', Dashboard\Index::class)->name('dashboard');
});
