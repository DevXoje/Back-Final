<?php

use App\Http\Controllers\ApiController;
use App\Http\Controllers\{AuthController, CartController, ProductController, CustomerController, OrderController, OrderItemController};
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
    return view('welcome');
});

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

Route::group([
    'middleware' => 'api',
    'prefix' => 'auth'
], function ($router) {
    Route::post('/login', [AuthController::class, 'login']);
    Route::post('/register', [AuthController::class, 'register']);
    Route::post('/logout', [AuthController::class, 'logout']);
    Route::post('/refresh', [AuthController::class, 'refresh']);
    Route::get('/user-profile', [AuthController::class, 'userProfile']);
});
Route::group([
    'middleware' => 'api',
    'prefix' => 'admin'
], function ($router) {
    Route::get('/users', [CustomerController::class, 'index']);
    Route::apiResource(
        'products',
        ProductController::class
    )->except(['index', 'show']);
});



Route::apiResource(
    'products',
    ProductController::class
)->only(['index', 'show']);
Route::apiResource(
    'orders',
    OrderController::class
);

Route::apiResource(
    'orders/{orderId}/items',
    OrderItemController::class
);




/* Route::post('/order/{id}/add', [OrderItemController::class, 'store']); */

