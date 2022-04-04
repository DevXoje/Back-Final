<?php

namespace App\Http\Controllers;

use App\Domain\Tienda\Customer\Customer;
use App\Http\Requests\{LoginReq, SignUpReq};
use App\Infrastructure\Persistance\Auth\AuthEloquent;
use App\Infrastructure\Persistance\Auth\Customer\CustomerEloquent;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
	public function index()
	{
		return AuthEloquent::all();
	}
	public function show($id)
	{
		return AuthEloquent::find($id);
	}
	/**
	 * Registro de usuario
	 */
	public function signup(SignUpReq $request)
	{
		$hasData = $request->has('name') && $request->has('user_name') && $request->has('password');
		if ($hasData) {
			$user = AuthEloquent::create($request->name, $request->user_name, $request->password);
			if ($user->id) {
				$customer = CustomerEloquent::create($user->id);
			}
			#$user->remember_token = $user->createToken('authToken')->accessToken;
		}
		
		
		/*$request->validate();

		 $user = AuthEloquent::create(
			$request->name,
			$request->email,
			bcrypt($request->password)
		);
		$accessToken = $user->createToken('authToken')->accessToken;*/



		#return response()->json(['message' => 'Successfully created user!'], 201);
		return $customer ? response([
			'customer' => $customer,
			'access_tokken' => $user->remember_token,
		]) : response(['message' => 'Error al crear el usuario'], 500);
	}

	/**
	 * Inicio de sesión y creación de token
	 */
	public function login(LoginReq $loginReq)
	{
		#$request->validate();
		$credentials = $loginReq->only('email', 'password');
		$message = "";
		$code = 200;

		if (Auth::attempt($credentials)) {
			request()->session()->regenerate();
			$message = "Successfully logged in";
			$code = 200;
		} else {
			$message = "Error al iniciar sesión";
			$code = 401;
		}
		return Auth::user();

		/* if (!Auth::attempt($credentials))
			return response()->json([
				'message' => 'Unauthorized'
			], 401);

		$user = $loginReq->user();
		$tokenResult = $user->createToken('Personal Access Token');

		$token = $tokenResult->token;
		if ($loginReq->remember_me)
			$token->expires_at = Carbon::now()->addWeeks(1);
		$token->save();

		return response()->json([
			'access_token' => $tokenResult->accessToken,
			'token_type' => 'Bearer',
			'expires_at' => Carbon::parse($token->expires_at)->toDateTimeString()
		]); */
	}

	/**
	 * Cierre de sesión (anular el token)
	 */
	public function logout(Request $request)
	{
		$request->user()->token()->revoke();

		return response()->json([
			'message' => 'Successfully logged out'
		]);
	}

	/**
	 * Obtener el objeto User como json
	 */
	public function user(Request $request)
	{
		return response()->json($request->user());
	}
}
