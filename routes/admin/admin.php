<?php

use App\Http\Controllers\{CustomerController, OrderController, OrderItemController, ProductController};
use Illuminate\Support\Facades\Route;


Route::group([
	'middleware' => 'api',
	'prefix' => 'admin'
], function ($router) {
	Route::get('orders/all', [OrderController::class, 'getAll']);
	Route::post('products/all', [ProductController::class, 'destroyAll']);


	Route::apiResources([
		'orders' => OrderController::class,
		'orders.items' => OrderItemController::class,
		'products' => ProductController::class,
		'customers' => CustomerController::class,
		'customers.orders' => OrderController::class,
		'customers.orders.items' => OrderItemController::class,

	], [
		'order' => [
			'except' => ['index', 'show']
		],
	]);
});
