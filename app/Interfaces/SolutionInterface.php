<?php

namespace App\Interfaces;

interface SolutionInterface
{
    public function solutionResult(array $userLifeStyleTags): array;
}
