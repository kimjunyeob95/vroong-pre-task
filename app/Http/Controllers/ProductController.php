<?php

namespace App\Http\Controllers;

use App\Services\ProductService;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    private Request $request;
    private ProductService $productService;

    function __construct(Request $request, ProductService $productService)
    {
        $this->request = $request;
        $this->productService = $productService;
    }

    function list()
    {
        $data = [
            "data" =>[
                [
                    "id" => 1,
                    "name" => "과자",
                ],
                [
                    "id" => 2,
                    "name" => "음료",
                ]
            ]
        ];
        return helpers_json_response(200, $data);
    }

}
