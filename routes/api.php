<?php

use App\Http\Controllers\Api\AuthController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

/**
 * Generates route names for api resource routes, prefixed with `api.` to
 * avoid name clashes with similar web resource routes.
 *
 * @param string $resource
 * @return string[]
 */
function apiRouteNames(string $resource) {
    return [
        'index'   => "api.$resource.index",
        'store'   => "api.$resource.store",
        'show'    => "api.$resource.show",
        'update'  => "api.$resource.update",
        'destroy' => "api.$resource.destroy",
    ];
}

// API routes protected by middleware that requires bearer access token in request headers
Route::group(['middleware' => ['auth:sanctum']], function () {
    // Show current user details
    Route::get('auth/user', function () {
        return auth()->user();
    });

    // Logout current user (revoke token)
    Route::post('auth/logout', [AuthController::class, 'logout']);

    // Routes for category feature
    Route::apiResource('categories', App\Http\Controllers\Api\CategoryController::class)
        ->names(apiRouteNames('categories'));

    // Routes for product feature
    Route::apiResource('products', App\Http\Controllers\Api\ProductController::class)
        ->names(apiRouteNames('products'));
});

// Login route (not protected by authentication middleware, instead users provide login credentials in request)
Route::post('auth/login', [AuthController::class, 'login']);
