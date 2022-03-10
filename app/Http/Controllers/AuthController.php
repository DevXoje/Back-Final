<?php

namespace App\Http\Controllers;

use App\Http\Requests\{LoginReq, SignUpReq};
use App\Infrastructure\Persistance\Auth\AuthEloquent;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth as FacadesAuth;

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
	public function signUp(SignUpReq $request)
	{
		$user = new AuthEloquent();
		$hasData = $request->has('name') && $request->has('email') && $request->has('password');
		if ($hasData) {
			$user->name = $request->name;
			$user->email = $request->email;
			$user->password = bcrypt($request->password);
			$user->remember_token = $user->createToken('authToken')->accessToken;
		}
		/*$request->validate();

		 $user = AuthEloquent::create(
			$request->name,
			$request->email,
			bcrypt($request->password)
		);
		$accessToken = $user->createToken('authToken')->accessToken;*/



		#return response()->json(['message' => 'Successfully created user!'], 201);
		return $user->save() ? response([
			'user' => $user,
			'access_tokken' => $user->remember_token,
		]) : response(['message' => 'Error al crear el usuario'], 500);
	}

	/**
	 * Inicio de sesión y creación de token
	 */
	public function login(LoginReq $request)
	{
		#$request->validate();

		$credentials = request(['email', 'password']);

		if (!FacadesAuth::attempt($credentials))
			return response()->json([
				'message' => 'Unauthorized'
			], 401);

		$user = $request->user();
		$tokenResult = $user->createToken('Personal Access Token');

		$token = $tokenResult->token;
		if ($request->remember_me)
			$token->expires_at = Carbon::now()->addWeeks(1);
		$token->save();

		return response()->json([
			'access_token' => $tokenResult->accessToken,
			'token_type' => 'Bearer',
			'expires_at' => Carbon::parse($token->expires_at)->toDateTimeString()
		]);
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
