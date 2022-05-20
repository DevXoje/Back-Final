<?php

use App\Http\Controllers\{CustomerController, OrderController, OrderItemController};
use Illuminate\Support\Facades\Route;


Route::group([
	'middleware' => 'api',
	'prefix' => 'auth'
], function ($router) {
	Route::get('/restore', [CustomerController::class, 'restore']);
});
Route::get('/customers/{customer_id}/orders/last',
	[CustomerController::class, 'lastOrder'])->where('name', '[A-Za-z]+');

Route::apiResources(
	[
		'customers' => CustomerController::class,
		'customers.orders' => OrderController::class,
		'customers.orders.items' => OrderItemController::class,
		//'users' => AuthController::class,
	]
);


