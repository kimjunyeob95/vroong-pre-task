<?php

namespace App\Http\Middleware;

use App\Constants\HttpConstant;
use Closure;
use Illuminate\Http\Request;
use Illuminate\Http\Exceptions\ThrottleRequestsException;

class RateLimitMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */
    public function handle(Request $request, Closure $next)
    {
        $routeName = $request->route()->getName();

        $validate   = true;
        $accessTime = 0.3;
        switch ($routeName) {
            // 마지막 요청 시간 검사
            case 'v1.token.create':
                $accessTime = 3.0;
                $validate = $this->checkValidateTime($request, $accessTime);
                break;
            default:
                $validate = $this->checkValidateTime($request, $accessTime);
                break;
        }

        if( $validate == false ){
            $message = HttpConstant::ERROR_MESSAGE_TOO_MANY_REQUEST . " ({$accessTime}초 이내에 최대 1번까지 호출가능)";
            throw new ThrottleRequestsException($message);
        }

        return $next($request);
    }

    public function checkValidateTime(Request $request, float $seconds): bool
    {
        $bool = true;

        $lastRequestTime = $request->session()->get('last_request_time');

        if( $lastRequestTime == null ){
            $bool = true;    
        } else {
            $lastRequestTime = $request->session()->get('last_request_time');
            $currentTime     = now()->timestamp;
            $timeDifference  = $currentTime - $lastRequestTime;

            if ((float)$timeDifference < $seconds) { // n초 이내의 요청인 경우
                $bool = false;
            }   
        }

        // 현재 요청 시간을 세션에 저장
        $request->session()->put('last_request_time', now()->timestamp);

        return $bool;
    }
}
