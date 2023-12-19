<?php

namespace App\Constants;

class HttpConstant
{
    public const OK                    = 200; // 성공
    public const BAD_REQUEST           = 400; // 잘못된 요청
    public const UNAUTHORIZED          = 401; // 인증 오류
    public const FORBIDDEN             = 403; // 권한이 없는 오류
    public const NOT_FOUND             = 404; // 리소스 찾을 수 없음
    public const INTERNAL_SERVER_ERROR = 500; // 서버 오류

    public const ERRORS = [
        self::BAD_REQUEST,
        self::UNAUTHORIZED,
        self::FORBIDDEN,
        self::NOT_FOUND,
        self::INTERNAL_SERVER_ERROR
    ];
}
