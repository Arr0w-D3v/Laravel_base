<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

/* Route::get(
    '/products', [\App\Http\Controllers\ProductsController::class, 'index']);
Route::post(
    '/products', [\App\Http\Controllers\ProductsController::class, 'store']); */

Route::resources([
    'products' => \App\Http\Controllers\ProductsController::class,
]);

//Route::get('/products/{product}/images', [\App\Http\Controllers\ProductsController::class, 'images']);
