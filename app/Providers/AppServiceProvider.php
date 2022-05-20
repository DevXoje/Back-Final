<?php

namespace App\Providers;

use App\Models\Customer;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\ServiceProvider;
use Laravel\Cashier\Cashier;
use Stripe\Stripe;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        // disable mysql default limit
        Schema::defaultStringLength(191);
        // set Stripe userModel
        Cashier::useCustomerModel(Customer::class);
        // set Stripe taxes
        //Cashier::calculateTaxes();// aun solo para subscriptions
		Stripe::setApiKey(env('STRIPE_SECRET'));
	}
}
