<?php

namespace App\Constants;

class UserErrorMessageConstant
{
    private static $defaultMsg     = "(을)를 전달해주세요.";
    private static $defaultTypeMsg = "의 타입형식이 올바르지 않습니다.";

    public const ERROR_MESSAGE_TOKEN               = "토큰";
    public const ERROR_MESSAGE_SUPP_SEC            = "공급업체";
    public const ERROR_MESSAGE_PRODUCT_NM          = "상품명";
    public const ERROR_MESSAGE_PRD_CHAR1           = "미성년자 판매금지 여부";
    public const ERROR_MESSAGE_TRANS_INFO          = "배송마감시간/발송처/발송일";
    public const ERROR_MESSAGE_SEND_CHECK          = "배송비 타입";
    public const ERROR_MESSAGE_SEND_PRICE          = "배송비";
    public const ERROR_MESSAGE_JEJU_SEND_PRICE     = "제주 배송비";
    public const ERROR_MESSAGE_ETC_SEND_PRICE      = "도서상간지역 배송비";
    public const ERROR_MESSAGE_TRANS_NM            = "택배사";
    public const ERROR_MESSAGE_PRD_CHANNEL         = "상품채널";
    public const ERROR_MESSAGE_RETURN_COMMENT      = "반품,교환 안내 문구";
    public const ERROR_MESSAGE_SEC_TAX             = "비과세여부";
    public const ERROR_MESSAGE_SUBJECT             = "상품 노출 제목 및 키워드";
    public const ERROR_MESSAGE_CONTENTS            = "상세 내용";
    public const ERROR_MESSAGE_IMG_URL             = "썸네일 이미지";
    public const ERROR_MESSAGE_OPTIONS             = "옵션";
    public const ERROR_MESSAGE_OPTIONS_ARRAY       = "옵션 타입 배열";
    public const ERROR_MESSAGE_OPTIONS_MIN         = "옵션 최소 1개";
    public const ERROR_MESSAGE_OPTIONS_OP_RANK     = "옵션 순서";
    public const ERROR_MESSAGE_OPTIONS_OPTION_NM   = "옵션명";
    public const ERROR_MESSAGE_OPTIONS_CUS_PRICE   = "소비자가(오픈마켓에 판매할 가격)";
    public const ERROR_MESSAGE_OPTIONS_OPTIN_PRICE = "온채널 판매사가";
    public const ERROR_MESSAGE_CATE_NUM            = "정보고시 번호";
    public const ERROR_MESSAGE_STORE_CODE          = "스마트스토어 카테고리 번호";
    public const ERROR_MESSAGE_NOT_HAVE_STORE_CODE = "등록되지 않은 스마트스토어 카테고리 번호 입니다. 다시 확인 해주세요.";

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
}
