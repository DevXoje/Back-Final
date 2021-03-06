<?php

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

@include(__DIR__ . '/stripe/stripe.php');
@include(__DIR__ . '/shop/shop.php');
@include(__DIR__ . '/login/login.php');
@include(__DIR__ . '/customer/customer.php');
@include(__DIR__ . '/admin/admin.php');


// Default route
Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
	return $request->user();
});




// Works
/* Route::post('login', [ApiController::class, 'authenticate'])->name('login');
Route::post('auth/create', [ApiController::class, 'register'])->name('register'); */

/* Route::group(['middleware' => ['jwt.verify']], function() {
    Route::get('logout', [ApiController::class, 'logout']);
    Route::get('get_user', [ApiController::class, 'get_user']);
    Route::get('products', [ProductController::class, 'index']);
    Route::get('products/{id}', [ProductController::class, 'show']);
    Route::post('create', [ProductController::class, 'store']);
    Route::put('update/{product}',  [ProductController::class, 'update']);
    Route::delete('delete/{product}',  [ProductController::class, 'destroy']);
}); */
