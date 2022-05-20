<?php

namespace App\Http\Controllers;

use App\Http\Requests\PaymentIntentRequest;
use App\Models\Customer;
use App\Models\Product;
use Exception;
use Illuminate\Http\Request;
use Laravel\Cashier\Cashier;
use Laravel\Cashier\Exceptions\{PaymentActionRequired, PaymentRequired};
use Log;
use Stripe\{Exception\ApiErrorException};
use Symfony\Component\HttpFoundation\Response;


class StripeController extends ApiController
{
	private $stripe = "";

	public function __construct()
	{

		$this->stripe = Cashier::stripe();
		//$this->stripe = new StripeClient (env('STRIPE_SECRET'));

	}


	function users()
	{
		try {
			return $this->successResponse($this->stripe->customers->all()->data);
		} catch (ApiErrorException $e) {
			return $this->errorResponse(['message' => 'No stripe customers found. Exception ==> ' . $e->getMessage()], 404);
		}
	}


	function user($id)
	{
		try {
			return $this->successResponse($this->stripe->customers->retrieve($id));
		} catch (ApiErrorException $e) {
			return $this->errorResponse(['message' => 'No stripe customer found. Exception ==> ' . $e->getMessage()], 404);
		}
	}

	function paymentIntent(PaymentIntentRequest $request)
	{
		try {
			return $this->successResponse($this->stripe->paymentIntents->create($request->all()));

		} catch (ApiErrorException $e) {
			return $this->errorResponse(['message' => 'Payment Intent NOT Created. Exception ==> ' . $e->getMessage()], 404);

		}
	}


	public function retrievePaymentRecord(Request $request)
	{   //Just in case you need to query stripe to confirm from your server if a payment intent has made a successful payment or not
		$intent_id = $request->intent_id;
		$event = $this->stripe->paymentIntents->retrieve($intent_id);
	}

	//Create payment intent
	public function CreatePayIntent(Request $request)
	{
		$product = Product::find($request->product_id);
		$customer = Customer::find($request->customer_id);
		try {
			$itemId = $product->id;
			$itemName = $product->name;
			$itemPrice = $request->price;//Todo: order or product
			$itemDescription = $product->description;
			$itemCurrency = strtolower($request->currency);
			$buyerEmail = $customer->email;


			$intent = $this->stripe->paymentIntents->create([
				'amount' => round($itemPrice * 100),
				'currency' => $itemCurrency,
				'description' => '(' . $itemName . ')' . ' ' . $itemDescription
			]);

			return $this->successResponse(['$intent' => $intent]);

		} catch (Exception $e) {
			return $this->errorResponse(['message' => 'Payment Intent NOT Created. Exception ==> ' . $e->getMessage()], Response::HTTP_UNPROCESSABLE_ENTITY);

		}
	}

	public function storeStripePayment(Request $request)
	{
		try {
			$intentId = $request->intentId;
			$itemId = $request->itemId;
			$paymentOption = 'stripe';
			$currency = $request->currency;
			$itemPrice = $request->itemPrice;
			$buyerEmail = $request->buyerEmail;
			$itemDescription = $request->itemDescription;

			$payment = $this->stripe->paymentIntents->create(
				[
					'intent_id' => $intentId,
					'item_id' => $itemId,
					'payment_option' => $paymentOption,
					'currency' => $currency,
					'item_price' => $itemPrice,
					'buyer_email' => $buyerEmail,
					'item_description' => $itemDescription,
					'payment_completed' => true
				]
			);

			return $this->successResponse(['payment' => $payment]);

			return response(['payment' => $payment]);

		} catch (Exception $e) {
			return $this->errorResponse(['message' => 'Payment Intent NOT Created. Exception ==> ' . $e->getMessage()], Response::HTTP_UNPROCESSABLE_ENTITY);

		}
	}
}
