<?php

use Illuminate\Support\Facades\Route;

// get
// post
// put
// patch
// delete

// Route::get('uri', 'action');
// Route::post('uri', 'action');
// Route::put('uri', 'action');
// Route::patch('uri', 'action');
// Route::delete('uri', 'action');
// Route::options('uri', 'action');

// CRUD => Creat, Read, Update, Delete

// Create => get, post
// Read => get
// Read single => get
// Update => get, put
// Delete => delete


// Route::post('/', function() {
//     return 'Homepage';
// });

// Route::put('/', function() {
//     return 'Homepage';
// });

// Route::delete('/', function() {
//     return 'Homepage';
// });

// Route::get('/', function() {
//     return 'Homepage';
// });

// use
// namespace

// Route::get('/home', function() {
//     return 'Home Pgae';
// });

// Route::get('/about', function() {
//     return 'Home Pgae';
// });

// Route::get('/team', function() {
//     return 'Home Pgae';
// });


Route::get('/', function() {
    return route('admin.products');
});
