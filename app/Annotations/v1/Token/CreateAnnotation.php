<?php

namespace App\Annotations\V1\Token;

/**
*
*
* @OA\Post(
*     path="/api/v1/token/create",
*     summary="토큰생성",
*     tags={"회원"},
*     @OA\Parameter(
*         name="member_id",
*         in="query",
*         description="할당받은 ID",
*         required=true,
*         @OA\Schema(
*             type="string",
*             example=""
*         )
*     ),
*     @OA\Parameter(
*         name="member_pw",
*         in="query",
*         description="비밀번호",
*         required=true,
*         @OA\Schema(
*             type="string",
*             example=""
*         )
*     ),
*     @OA\Response(
*         response=200,
*         description="Successful sign in",
*         @OA\JsonContent(
*             ref="#/components/schemas/getToken",
*             example={
*                 "code": 200,
*                 "Authorization": "xxxxxxxxxxxxx"
*             }
*         )
*     ),
*     @OA\Response(
*         response=400,
*         description="아이디 또는 비밀번호를 확인해주세요.",
*         @OA\JsonContent(
*             ref="#/components/schemas/getToken",
*             example={
*                 "code": 400,
*                 "error": "아이디를 입력하세요."
*             }
*         )
*     )
* )
* 
* 
*/

class CreateAnnotation{
}
