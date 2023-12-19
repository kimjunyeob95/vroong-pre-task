<?php

namespace App\Http\Controllers;

use App\Services\UserService;
use Illuminate\Http\Request;

class UserController extends Controller
{
    private Request $request;
    private UserService $userService;

    function __construct(Request $request, UserService $userService)
    {
        $this->request = $request;
        $this->userService = $userService;
    }

    function list()
    {
        $data = [
            "data" =>[
                [
                    "id" => 1,
                ],
                [
                    "id" => 2,
                ]
            ]
        ];
        return helpers_json_response(200, $data);
    }

}
