<?php

Route::redirect('/', '/dashboard');
Route::get('/dashboard', Dashboard\Index::class)->middleware(['auth']);
