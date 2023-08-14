<?php

use App\Http\Controllers\UserController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\OrderController;
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

Route::resource('/users', UserController::class)->middleware(['auth']);
Route::get('/users/{user}/products', [UserController::class, 'showUserProducts'])
    ->name('user.products')->middleware(['auth', 'checkSalesman']);

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::resource('/contacts', ContactController::class)->middleware(['auth', 'verified']);

Route::resource('/products', ProductController::class);
Route::resource('/cart', CartController::class);
Route::resource('/orders', OrderController::class);

require __DIR__ . '/auth.php';
