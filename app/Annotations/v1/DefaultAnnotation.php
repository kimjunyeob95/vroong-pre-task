<?php

namespace App\Annotations\v1;

/**
*
*
* @OA\Info(
*  title="mslabe API",
*  version="1.0",
* )
* @OA\Schema(
*     schema="getToken",
*     required={"member_id", "member_pw"},
*     @OA\Property(property="member_id", type="string", example="john_doe"),
*     @OA\Property(property="member_pw", type="string", example="password123")
* )
*
* 
*/

class DefaultAnnotation{
}
