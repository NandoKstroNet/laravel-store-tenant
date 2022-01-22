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
    Route::get('/', [\App\Http\Controllers\Front\StoresController::class, 'index'])->name('front.store');

    Route::name('sign.')->group(function() {
        Route::get('/sign-in', [\App\Http\Controllers\Front\SignUpInController::class, 'index'])->name('index');
        Route::post('/sign-in', [\App\Http\Controllers\Front\SignUpInController::class, 'signIn'])->name('in');
        Route::post('/sign-up', [\App\Http\Controllers\Front\SignUpInController::class, 'signUp'])->name('up');
    });
    Route::get('logout', [\App\Http\Controllers\Front\SignUpInController::class, 'logout'])->name('up');

    Route::prefix('cart')->name('cart.')->group(function(){
        Route::get('/', [\App\Http\Controllers\Front\CartController::class, 'index'])->name('index');
        Route::get('add/{product}', [\App\Http\Controllers\Front\CartController::class, 'add'])->name('add');
        Route::get('remove/{product}', [\App\Http\Controllers\Front\CartController::class, 'remove'])->name('remove');
        Route::get('cancel', [\App\Http\Controllers\Front\CartController::class, 'cancel'])->name('cancel');
    });

    Route::prefix('checkout')->middleware('auth.stores')->name('checkout.')->group(function(){
        Route::get('/', [\App\Http\Controllers\Front\CheckoutController::class, 'checkout'])->name('checkout');
        Route::post('/proccess', [\App\Http\Controllers\Front\CheckoutController::class, 'proccess'])->name('proccess');
        Route::get('/thanks', [\App\Http\Controllers\Front\CheckoutController::class, 'thanks'])->name('thanks');
    });


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
