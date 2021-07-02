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

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::apiResource('categories', App\Http\Controllers\Api\CategoryController::class)
    ->names(apiRouteNames('categories'));

Route::apiResource('products', App\Http\Controllers\Api\ProductController::class)
    ->names(apiRouteNames('products'));

// Authentication routing
Route::post('auth/login', [AuthController::class, 'login']);
Route::group(['middleware' => ['auth:sanctum']], function () {
    Route::get('auth/user', function () {
        return auth()->user();
    });
    Route::post('auth/logout', [AuthController::class, 'logout']);
});
