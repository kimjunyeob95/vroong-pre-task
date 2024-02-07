<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Constants\HttpConstant;
use App\Interfaces\SolutionInterface;
use Illuminate\Http\JsonResponse;
use App\Constants\SolutionErrorMessageConstant;
use Illuminate\Support\Facades\Validator;

class SolutionController extends Controller
{
    private Request $request;
    private SolutionInterface $solution;

    function __construct(Request $request, SolutionInterface $solution)
    {
        $this->request  = $request;
        $this->solution = $solution;
    }

    function solutionDiet(): JsonResponse
    {
        $validator = Validator::make($this->request->all(), [
            'userLifeStyleTags' => 'required|array',
        ], [
            'userLifeStyleTags.required' => SolutionErrorMessageConstant::getErrorMessage("USERLIFESTYLETAGS"),
            'userLifeStyleTags.array'    => SolutionErrorMessageConstant::getTypeErrorMessage("USERLIFESTYLETAGS"),
        ]);

        if ($validator->fails()) {
            return helpers_json_response(HttpConstant::BAD_REQUEST, [], $validator->errors()->first());
        }

        $userLifeStyleTags = $this->request->post("userLifeStyleTags");

        $result = $this->solution->solutionResult($userLifeStyleTags);
        if( $result["isSuccess"] == true ){
            return helpers_json_response(HttpConstant::OK, $result);
        } else {
            return helpers_json_response(HttpConstant::BAD_REQUEST, [], $result["msg"]);
        }
    }

}
