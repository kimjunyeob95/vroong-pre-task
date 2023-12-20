<?php

namespace App\Http\Middleware;

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

        $validate = true;
        switch ($routeName) {
            // 마지막 요청 시간 검사
            case 'v1.token.create':
                $validate = $this->checkValidateTime($request, 3.0);
                break;
            default:
                $validate = $this->checkValidateTime($request, 0.3);
                break;
        }

        if( $validate == false ){
            throw new ThrottleRequestsException();
        }

        return $next($request);
    }

    public function checkValidateTime(Request $request, float $seconds): bool
    {
        $bool = true;

        $lastRequestTime = $request->session()->get('last_request_time') ?? now()->timestamp + 20; // default로 20초 시간 +해줌
        $currentTime     = now()->timestamp;
        $timeDifference  = $currentTime - $lastRequestTime;

        if ($timeDifference < $seconds) { // n초 이내의 요청인 경우
            $bool = false;
        }

        // 현재 요청 시간을 세션에 저장
        $request->session()->put('last_request_time', now()->timestamp);

        return $bool;
    }
}
