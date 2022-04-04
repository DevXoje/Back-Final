<?php

use App\Http\Controllers\{AuthController, CartController, CategoryController, OrderController, ProductCategoriesController, ProductController};
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

Route::get('/', function () {
	return "<h1>Welcome to the API</h1>";
});

Route::get('auth', [AuthController::class, "index"])->name('auth');
Route::get('auth/{id}', [AuthController::class, "show"])->name('auth.show');
Route::post('auth/signup', [AuthController::class, "signup"])->name('auth.signup');

Route::post('auth/login', [AuthController::class, "login"])->name('auth.login');

Route::get('product', [ProductController::class, "index"])->name('product');
Route::get('product/{id}', [ProductController::class, "show"])->name('auth.show');

Route::get('category', [CategoryController::class, "index"])->name('category');



Route::get('category_product', [ProductCategoriesController::class, "index"])->name('category_product');

Route::get('cart/{id}', [CartController::class, "show"])->name('cart.show');
Route::get('cart', [CartController::class, "index"])->name('cart');
Route::get('order', [OrderController::class, "index"])->name('order');




/* Route::group([
	'prefix' => 'auth'
], function () {
	Route::post('login', [AuthController::class, "login"]);
	Route::post('signup', [AuthController::class, "signup"]);

	Route::group([
		'middleware' => 'auth:api'
	], function () {
		Route::get('logout', 'AuthController@logout');
		Route::get('user', 'AuthController@user');
	});
}); */
