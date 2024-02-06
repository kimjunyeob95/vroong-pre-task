<?php

namespace App\Http\Controllers;

use App\Services\ProductService;
use Illuminate\Http\Request;

class SolutionController extends Controller
{
    private Request $request;

    function __construct(Request $request)
    {
        $this->request = $request;
    }

    function solutionDiet($type)
    {
        // dd($type);
    }

}
