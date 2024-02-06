<?php

namespace App\Constants;

class SolutionErrorMessageConstant
{
    private static $defaultMsg         = "(을)를 전달해주세요.";
    private static $defaultTypeMsg     = "의 타입형식이 올바르지 않습니다.";
    private static $defaultNotHaveMsg  = "(은)는 없습니다.";

    public const ERROR_MESSAGE_USERLIFESTYLETAGS = "라이프 스타일 태그";

    public static function getErrorMessageNotDefault($constantName): string
    {
        $errorMessage = constant('self::ERROR_MESSAGE_' . $constantName);
        return $errorMessage;
    }

    public static function getErrorMessage($constantName): string
    {
        $errorMessage = constant('self::ERROR_MESSAGE_' . $constantName);
        return $errorMessage . self::$defaultMsg;
    }

    public static function getTypeErrorMessage($constantName): string
    {
        $errorMessage = constant('self::ERROR_MESSAGE_' . $constantName);
        return $errorMessage . self::$defaultTypeMsg;
    }

    public static function getNotHaveErrorMessage(string $constantName): string
    {
        $errorMessage = constant('self::ERROR_MESSAGE_' . $constantName);
        return "해당 " . $errorMessage . self::$defaultNotHaveMsg;
    }
}
