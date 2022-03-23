<?php

use App\Http\Controllers\Site1Controller;
use App\Http\Controllers\Site2Controller;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TestController;

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


// Route::get('/', function() {
//     return route('admin.products');
// });

// Route::get('blog', function() {
//     return 'Blog Page';
// });

// Route::get('/blog/{id?}', function($id = '') {
//     return 'Blog Page '. $id;
// });

// Route::get('blog/{id}/{name}', function($hfhfhfhf, $name) {
//     return 'Blog Page #' . $hfhfhfhf . ' | ' . $name;
// // })->whereNumber('id');
// });

// use
// namespace

Route::get('/', [TestController::class, 'index'])->name('home.index');
Route::get('/about', [TestController::class, 'about'])->name('home.about');
Route::get('/contact', [TestController::class, 'contact'])->name('home.contact');

Route::get('user/aaaa/{name}/post/test/{id}/new/comments', function($name, $id) {
    return 'rrrrr';
})->name('user.posts');

Route::get('test', function() {
    $name = 'Ahmed';
    $id = 12;

    // return url('user/'.$name.'/post/'.$id.'/comments');
    return route('user.posts', [$name, $id]);
});

// Route::view('ffff', )

// Route::match(
//     ['put', 'patch'], 'test' , function() {

//     }
// );

// Route::any('one')


Route::prefix('site1')->controller(Site1Controller::class)->name('site1.')->group(function() {
    Route::get('/', 'index')->name('index');
    Route::get('/about', 'about')->name('about');
    Route::get('/contact-us', 'contact')->name('contact');
    Route::get('/post', 'post')->name('post');

    // Route::get('/', [Site1Controller::class, 'index'])->name('index');
    // Route::get('/about', [Site1Controller::class, 'about'])->name('about');
    // Route::get('/contact-us', [Site1Controller::class, 'contact'])->name('contact');
    // Route::get('/post', [Site1Controller::class, 'post'])->name('post');


});


// Route::get('admin', function() {});

Route::prefix('site2')->name('site2.')->controller(Site2Controller::class)->group(function() {
    Route::get('/', 'index')->name('index');
    Route::get('/portfolio', 'portfolio')->name('portfolio');
    Route::get('/about', 'about')->name('about');
    Route::get('/contact', 'contact')->name('contact');
    // Route::get('site2/contact', [Site1Controller::class, 'contact'])->name('contact');
});

