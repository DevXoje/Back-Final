<?php

use App\Http\Controllers\{StripeController, WebhookController};
use Illuminate\Support\Facades\Route;


Route::get('/stripe', [StripeController::class, "hello"]);
Route::post('/stripe/payment', [StripeController::class, "paymentIntent"]);
Route::get('/stripe/users', [StripeController::class, "users"]);

Route::group([
	'middleware' => 'jwt.verify'
], function ($router) {
	Route::get('billing-portal', [StripeController::class, 'billingPortal']);

});


//Route::post('/create-checkout-session', [PaymentController::class, 'createCheckoutSession']);
//Route::post('/create-payment-intent', [PaymentController::class, 'createPaymentIntent']);
//Route::post('/create-verification-session', [PaymentController::class, 'createVerificationSession']);


// Cashier includes a Webhook controller that can easily cancel the customer's subscription for you
Route::post(
	'stripe/webhook',
	[WebhookController::class, 'handleWebhook']
);
