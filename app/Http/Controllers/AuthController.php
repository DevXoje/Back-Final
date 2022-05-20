<?php

namespace App\Http\Controllers;

use App\Http\Resources\CustomerResource;
use App\Models\Customer;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class AuthController extends ApiController
{
	/**
	 * Create a new AuthController instance.
	 *
	 * @return void
	 */
	public function __construct()
	{
		$this->middleware('auth:api', ['except' => ['login', 'register']]);
	}

	/**
	 * Get a JWT via given credentials.
	 *
	 * @return \Illuminate\Http\JsonResponse
	 */
	public function login(Request $request, string $extraAction = "")
	{
		$validator = Validator::make($request->all(), [
			'email' => 'required|email',
			'password' => 'required|string|min:6',
		]);
		if ($validator->fails()) {
			return response()->json($validator->errors(), 422);
		}

		if (!$token = auth()->attempt($validator->validated())) {
			//return response()->json(['error' => 'Unauthorized'], 401);
			return $this->errorResponse(['error' => 'Unauthorized'], 403);
		}

		$user = User::where('email', "=", $request->email)->firstOrFail();
		if ($user->role == 'customer') {
			$customer=Customer::find($user->id);
			$user = new CustomerResource($customer);
		}

		$response = [
			'token' => $token,
			'auth' => $user
		];

		return $this->successResponse('User successfully ' . $extraAction . ' logged-in.', $response);

	}

	/**
	 * Register a User.
	 *
	 * @return \Illuminate\Http\JsonResponse
	 */
	public function register(Request $request)
	{
		$validator = Validator::make($request->all(), [
			'name' => 'required|string|between:2,100',
			'email' => 'required|string|email|max:100|unique:users',
			'password' => 'required|string|confirmed|min:6',
			'address' => 'required|string|between:2,100',
			'phone' => 'required|between:2,100',
		]);
		if ($validator->fails()) {
			return $this->errorResponse('Validation error.', $validator->errors(), 400);
			//return response()->json($validator->errors()->toJson(), 400);
		}
		$data = array_merge(
			$validator->validated(),
			['password' => bcrypt($request->password)]
		);
		$user = Customer::create($data);

		return $this->login($request, 'registered');
		/* $response = [
			'token' => $user->createNewToken(),
			'name' => $user->name
		];
		return $this->successResponse('User created successfully.', $response);
		//$customer = $user->customer()->create();
		return response()->json([
			'message' => 'User successfully registered',
			'user' => $user,
			//'customer' => $customer,
		], 201); */
	}

	/**
	 * Log the user out (Invalidate the token).
	 *
	 * @return \Illuminate\Http\JsonResponse
	 */
	public function logout()
	{
		/*    if (auth()->check()) {
			return $this->errorResponse('Failed to logout.', ['error' => 'Failed to logout.'], 500);
		} */

		auth()->logout();
		return $this->successResponse('User successfully logged-out.', ['message' => 'User successfully logged-out.']);
	}

	/**
	 * Refresh a token.
	 *
	 * @return \Illuminate\Http\JsonResponse
	 */
	public function refresh()
	{
		return $this->createNewToken(auth()->refresh());
	}



	/**
	 * Get the token array structure.
	 *
	 * @param string $token
	 *
	 * @return \Illuminate\Http\JsonResponse
	 */
	protected function createNewToken($token)
	{
		return response()->json([
			'access_token' => $token,
			'token_type' => 'bearer',
			'expires_in' => auth()->factory()->getTTL() * 60,
			'user' => auth()->user()
		]);
	}


	public function show(int $id)
	{
		$code = 200;
		$message = "Product not found";
		$payload = ['message' => $message];
		$user = User::find($id);
		if ($user) {
			$payload = $user;
		} else {
			$code = 400;
		}
		return response()->json($payload, $code);
	}
	public function index()
	{

		return response()->json("hola", 500);
	}
}
