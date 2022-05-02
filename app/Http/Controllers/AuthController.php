<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use Tymon\JWTAuth\Facades\JWTAuth;

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
        //$user = User::where('email', '=', $request->email)->first();
        //if (!$token = JWTAuth::fromUser($user, ['user_id' => $user->id]))
        if (!$token = auth()->attempt($validator->validated())) {
            //return response()->json(['error' => 'Unauthorized'], 401);
            return $this->errorResponse(['error' => 'Unauthorized'], 403);
        }
        $user = Auth::user();
        /*$response['token'] =  $user->createToken($request->device_name)->plainTextToken;
            $response['name'] =  $user->name;*/
        $response = [
            'token' => $token,
            'auth' => $user
        ];

        return $this->successResponse('User successfully ' . $extraAction . ' logged-in.', $response);
        //return $this->createNewToken($token);

        /* if(Auth::attempt(['email' => $request->email, 'password' => $request->password])) {
            $user = Auth::user();

            $response['token'] =  $user->createToken($request->device_name)->plainTextToken;
            $response['name'] =  $user->name;

            return $this->successResponse('User successfully logged-in.', $response);
        }
        else {
            return $this->errorResponse('Unauthorized.', ['error'=>'Unauthorized'], 403);
        }  */
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
        ]);
        if ($validator->fails()) {
            return $this->errorResponse('Validation error.', $validator->errors(), 400);
            //return response()->json($validator->errors()->toJson(), 400);
        }
        $data = array_merge(
            $validator->validated(),
            ['password' => bcrypt($request->password)]
        );
        $user = User::create($data);
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
     * Get the authenticated User.
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function userRole()
    {
        return response()->json(auth()->user());
    }
    /**
     * Get the token array structure.
     *
     * @param  string $token
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
            $payload =  $user;
        } else {
            $code = 400;
        }
        return response()->json($payload, $code);
    }
}
