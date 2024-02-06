<?php

namespace App\Http\Controllers;

use App\Services\ProductService;
use Illuminate\Http\Request;
use App\Constants\SolutionConstant;
use App\Interfaces\SolutionInterface;

class SolutionController extends Controller
{
    private Request $request;
    private SolutionInterface $solution;

    function __construct(Request $request, SolutionInterface $solution)
    {
        $this->request  = $request;
        $this->solution = $solution;
    }

    function solutionDiet($type = SolutionConstant::SOLUTION_DIET)
    {
        dd($this->solution->getLifeStyleTag());
    }

}
