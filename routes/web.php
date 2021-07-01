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

/* Customer routes */
Route::get('/', '\App\Http\Controllers\CustomerController@home')->name('home');
Route::view('/blog', 'customer.blog')->name('blog');
Route::view('/contact', 'customer.contact')->name('contact');
Route::get('/products', '\App\Http\Controllers\CustomerController@products')->name('products');

/* Admin portal routes */
Route::middleware(['auth:sanctum', 'verified'])->prefix('admin')->group(function () {
    Route::view('/', 'admin.dashboard')->name('dashboard');

    Route::resource('/categories', '\App\Http\Controllers\CategoryController');
    Route::get('/categories/{category}/delete', '\App\Http\Controllers\CategoryController@delete')->name('categories.delete');

    Route::resource('/products', '\App\Http\Controllers\ProductController');
    Route::get('/products/{product}/delete', '\App\Http\Controllers\ProductController@delete')->name('products.delete');
});

/* Redirect the `/dashboard` route (which Jetstream uses) to the `/admin` route (the actual admin dashboard)
 * In the future, when there are both admin and regular users, this route could be used as a general user dashboard.
 */
Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard', function () {
    return redirect(route('dashboard'));
});
