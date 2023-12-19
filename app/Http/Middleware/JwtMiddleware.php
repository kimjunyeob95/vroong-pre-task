<?php

namespace App\Http\Middleware;

use App\Constants\HttpConstant;
use Closure;
use Exception;

use Illuminate\Support\Facades\Route;
use Firebase\JWT\JWT;
use Firebase\JWT\Key;

class JwtMiddleware
{
    public function handle($request, Closure $next)
    {
        try {
            $token     = $request->bearerToken();
            $path      = Route::currentRouteName();
            $skip_path = ["token.create", "v1.list"];
            if(in_array($path, $skip_path)){
                return $next($request);
            }
    
            if (!$token) {
                return response()->json(['code' => 401, 'error' => '토큰을 전달해주세요.'], HttpConstant::UNAUTHORIZED);
            }
    
            $decodedToken = JWT::decode($token, new Key(env('JWT_SECRET'), 'HS256'));
    
            // 토큰이 유효한지 확인
            if ($this->isTokenExpired($decodedToken)) {
                return response()->json(['code' => 401, 'error' => '토큰의 유효시간이 만료되었습니다.'], HttpConstant::UNAUTHORIZED);
            }
    
            return $next($request);
        } catch (Exception $e) {
            return helpers_json_response(HttpConstant::BAD_REQUEST, [], $e->getMessage());
        }
       
    }

    private function isTokenExpired($decodedToken)
    {
        $expirationTime = $decodedToken->exp;
        $currentTime = time();

        return $expirationTime < $currentTime;
    }
}
