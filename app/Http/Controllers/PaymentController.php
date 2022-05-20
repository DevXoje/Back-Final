<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateStripeCheckoutRequest;
use Illuminate\Http\Request;
use Laravel\Cashier\Exceptions\{PaymentActionRequired, IncompletePayment, PaymentRequired};

class PaymentController extends ApiController
{
    # version 1
    public function setupIntent(Request $request)
    {
        try {
            $user = $request->user();
            $intent = $user->createSetupIntent();
            return $this->successResponse("success", ['intent' => $intent]);
        } catch (\Exception $e) {
            return $this->errorResponse($e->getMessage(), 200);
        }
    }


    public function capturePayment(Request $request)
    {
        try {
            $user = $request->user();
            $paymentMethod = $request->payment_method;
            $payableAmount = (int)100 * $request->amount;
            $payment = $user->charge($payableAmount, $paymentMethod);
            if (!isset($payment)) {
                throw new \Exception("Your payment is not deduct, Something went wrong.", 1);
            }
        } catch (IncompletePayment $ex) {
            $message = $ex->getMessage();
            $data = [];
            $code = 400;
            $intent = $ex->payment->asStripePaymentIntent();
            /* Deberia capturar todos las excepciones de Stripe y enviar un mensaje de error personalizado
             if ($ex instanceof PaymentActionRequired) {
                $message = "Payment action required";
                $data = [
                    'success' =>  false,
                    'user_id'  =>  $user->id,
                    'status'  =>  $intent->status,
                    'client_secret'  =>  $intent->client_secret,
                    'payment_method'  =>  $intent->payment_method,
                ];
                $code = 200;
            } */
            return $this->errorResponse($message, $data, $code);
        } catch (\Exception $e) {
            return response()->json($e->getMessage(), [], 400);
        }
        return $this->successResponse("Payment successfully.", ['payment' => $payment]);
    }



    # version 0
    function createCheckoutSession(Request $request)
    {
        //crear
        //$stripeCustomer = $user->createAsStripeCustomer();
        //transformar
        //$stripeCustomer = $user->asStripeCustomer();
        //buscar/crear
        //$stripeCustomer = $user->createOrGetStripeCustomer();
        //$balance = $user->balance();
        return [
            'payment_method_types' => $request->payment_method_types,
            'line_items' => $request->line_items,
            'success_url' => $request->success_url,
            'cancel_url' => $request->cancel_url,
            'mode' => $request->mode,
        ];
    }
    function createPaymentIntent()
    {
        $customer = auth()->user()->createOrGetStripeCustomer();
        return $customer->createSetupIntent();
        //$user->applyBalance(-500, 'Premium customer top-up.');
        //$user->applyBalance(300, 'Bad usage penalty.');
        // $user = Auth::user();

    }
    function createVerificationSession()
    {
        // $user = Auth::user();

    }
    function getTransactions()
    {
        /* // Retrieve all transactions...
        $transactions = $user->balanceTransactions();

        foreach ($transactions as $transaction) {
            // Transaction amount...
            $amount = $transaction->amount(); // $2.31

            // Retrieve the related invoice when available...
            $invoice = $transaction->invoice();
        } */
    }
}
