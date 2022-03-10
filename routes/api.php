<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\ProductController;
#use BoundedContent\Tienda\Product\Infrastructure\Eloquent\ProductController;
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
Route::post('auth/signup', [AuthController::class, "signUp"])->name('auth.signUp');
Route::post('auth/login', [AuthController::class, "login"])->name('auth.login');
Route::get('product', [ProductController::class, "index"])->name('product');
Route::get('product/{id}', [ProductController::class, "show"])->name('auth.show');


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
