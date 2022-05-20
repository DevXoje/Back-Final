<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Tymon\JWTAuth\Facades\JWTAuth;
use Tymon\JWTAuth\Http\Middleware\BaseMiddleware;
use Tymon\JWTAuth\Exceptions\{TokenInvalidException, TokenExpiredException};

class JwtMiddleware extends BaseMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param Request $request
     * @param  Closure  $next
     * @return mixed
     */
    public function handle(Request $request, Closure $next)
    {
        try {
            $user = JWTAuth::parseToken()->authenticate();
        } catch (TokenInvalidException $e) {
			return response()->json(['status' => 'Token is Invalid']);
		} catch (TokenExpiredException $e) {
			return response()->json(['status' => 'Token is Expired']);
		} catch (\Exception $e) {
			return response()->json(['status' => 'Authorization Token not found']);
		}
		return $next($request);
    }
}
