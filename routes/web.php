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


Route::domain('{domain}.localhost')->group(function() {
    Route::get('/', [\App\Http\Controllers\Front\StoresController::class, 'index']);
});

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth'])->name('dashboard');

Route::prefix('admin')->middleware('auth')->group(function() {
    Route::resource('products', \App\Http\Controllers\ProductsController::class);
    Route::resource('categories', \App\Http\Controllers\CategoriesController::class);
});


require __DIR__.'/auth.php';
