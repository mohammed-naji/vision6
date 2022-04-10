<?php

use App\Http\Controllers\FormsController;
use App\Http\Controllers\ProductController;
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


Route::get('form1', [FormsController::class, 'form1'])->name('form1');
Route::post('form1', [FormsController::class, 'form1_submit'])->name('form1_submit');

Route::get('form2', [FormsController::class, 'form2'])->name('form2');
Route::post('form2', [FormsController::class, 'form2_submit'])->name('form2_submit');

Route::get('form3', [FormsController::class, 'form3'])->name('form3');
Route::post('form3', [FormsController::class, 'form3_submit'])->name('form3_submit');

Route::get('form4', [FormsController::class, 'form4'])->name('form4');
Route::post('form4', [FormsController::class, 'form4_submit'])->name('form4_submit');


Route::get('name', function() {
    $letters = range('a', 'h');
    dd($letters[ rand(0,  count($letters) - 1 ) ]);
});

Route::get('form5', [FormsController::class, 'form5'])->name('form5');
Route::post('form5', [FormsController::class, 'form5_submit'])->name('form5_submit');

Route::get('form6', [FormsController::class, 'form6'])->name('form6');
Route::post('form6', [FormsController::class, 'form6_submit'])->name('form6_submit');


// CRUD Application
// Route::get('products', [ProductController::class, 'index'])->name('products.index');
// Route::get('products/{id}', [ProductController::class, 'show'])->name('products.show');

// Route::get('products/create', [ProductController::class, 'create'])->name('products.create');
// Route::post('products/store', [ProductController::class, 'store'])->name('products.store');

// Route::get('products/{id}/edit', [ProductController::class, 'edit'])->name('products.edit');
// Route::put('products/{id}/update', [ProductController::class, 'update'])->name('products.update');

// Route::delete('products/{id}', [ProductController::class, 'destroy'])->name('products.destroy');



Route::resource('products', ProductController::class)->names([
    'index' => 'mohammed_naji'
]);


Route::get('show_msg', [ProductController::class, 'show_msg'])->name('show_msg');
