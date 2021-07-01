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

Route::get('/', function () {
    return view('welcome');
});

Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard', function () {
    // Redirect the /dashboard route (which Jetstream uses) to the /admin (dashboard) route
    return redirect(route('dashboard'));
});

Route::prefix('admin')->group(function () {
    Route::view('/', 'admin.dashboard')->name('dashboard');

    Route::resource('/categories', '\App\Http\Controllers\CategoryController');
    Route::get('/categories/{category}/delete', '\App\Http\Controllers\CategoryController@delete')->name('categories.delete');

    Route::resource('/products', '\App\Http\Controllers\ProductController');
    Route::get('/products/{product}/delete', '\App\Http\Controllers\ProductController@delete')->name('products.delete');
});
