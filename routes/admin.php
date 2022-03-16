<?php

use Illuminate\Support\Facades\Route;

Route::prefix('admin')->name('admin.')->group(function() {
    Route::get('/users', function() { return 'Admin Users'; })->name('users');
    Route::get('/products', function() { return 'Admin Users'; })->name('products');
    Route::get('/comments', function() { return 'Admin Users'; })->name('comments');
    Route::get('/posts', function() { return 'Admin Users'; })->name('posts');
    Route::get('/orders', function() { return 'Admin Users'; })->name('orders');
});
