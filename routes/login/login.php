<?php

use App\Http\Controllers\AuthController;
use Illuminate\Support\Facades\Route;


Route::group([
	'middleware' => 'api',
	'prefix' => 'auth'
], function ($router) {
	Route::post('/login', [AuthController::class, 'login']);
	Route::post('/register', [AuthController::class, 'register']);
	Route::post('/logout', [AuthController::class, 'logout']);
	Route::post('/refresh', [AuthController::class, 'refresh']);
});


// Autentication

Route::get('/auth/redirect', function () {
	return Socialite::driver('github')->redirect();
});


Route::get('/auth/callback', function () {
	$githubUser = Socialite::driver('github')->user();

	$user = User::updateOrCreate([
		'github_id' => $githubUser->id,
	], [
		'name' => $githubUser->name,
		'email' => $githubUser->email,
		'github_token' => $githubUser->token,
		'github_refresh_token' => $githubUser->refreshToken,
	]);

	Auth::login($user);

	return redirect('/dashboard');
	/*
	 $user = Socialite::driver('github')->user();

    // OAuth 2.0 providers...
    $token = $user->token;
    $refreshToken = $user->refreshToken;
    $expiresIn = $user->expiresIn;

    // OAuth 1.0 providers...
    $token = $user->token;
    $tokenSecret = $user->tokenSecret;

    // All providers...
    $user->getId();
    $user->getNickname();
    $user->getName();
    $user->getEmail();
    $user->getAvatar();
	 */
});

//Route::get('/redirect', [LoginController::class, 'redirectToProvider']);
//Route::get('/callback', [LoginController::class, 'handleProviderCallback']);
