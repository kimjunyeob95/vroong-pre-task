<?php

namespace App\Services;

use App\Abstracts\SolutionAdapter;
use App\Constants\SolutionConstant;

class FitnessCoachService extends SolutionAdapter
{
    public function __construct()
    {
        parent::__construct();
    }

    public function setSolutionTags(): void
    {
        $this->solutionLifeStyleTags = SolutionConstant::TAG_LIST[SolutionConstant::SOLUTION_FITNESS];
    }

    public function solutionResult(array $userLifeStyleTags): array
    {
        $this->setSolutionTags();
        return parent::solutionResult($userLifeStyleTags);
    }
}
