<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

// Route::get('/', function () {
//     return view('welcome');
// });

// Route::get('/about', function() {
//     return 'About Page';
// });

Route::get('/', function() {
    return 'Home page';
});

Route::get('/about', function() {
    return 'About page';
});

Route::get('/contact', function() {
    return 'Contact page';
});

Route::get('/our-team', function() {
    return 'Our Team page';
});
