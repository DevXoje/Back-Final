<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateStripeCheckoutRequest;
use Illuminate\Http\Request;
use Laravel\Socialite\Facades\Socialite;
use Laravel\Cashier\Exceptions\{PaymentActionRequired, IncompletePayment, PaymentRequired};

class LoginController extends ApiController
{
	/**
	 * Redirect the user to the Google authentication page.
	 *
	 * @return \Illuminate\Http\Response
	 */
	public function redirectToProvider()
	{
		return Socialite::driver('google')->redirect();
	}

	function handleProviderCallback()
	{

		try {
			$user = Socialite::driver('google')->user();
		} catch (\Exception $e) {
			return redirect('/login');
		}
		// only allow people with @company.com to login
		if (explode("@", $user->email)[1] !== 'company.com') {
			return redirect()->to('/');
		}
		// check if they're an existing user
		$existingUser = User::where('email', $user->email)->first();
		if ($existingUser) {
			// log them in
			auth()->login($existingUser, true);
		} else {
			// create a new user
			$newUser = new User;
			$newUser->name = $user->name;
			$newUser->email = $user->email;
			$newUser->google_id = $user->id;
			$newUser->avatar = $user->avatar;
			$newUser->avatar_original = $user->avatar_original;
			$newUser->save();
			auth()->login($newUser, true);
		}
		return redirect()->to('/home');
	}
}
