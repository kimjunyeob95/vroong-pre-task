<?php

namespace App\Services;

use App\Interfaces\SolutionInterface;
use App\Constants\SolutionConstant;

class FitnessCoachService implements SolutionInterface
{
    private array $lifeStyleTags;

    public function __construct()
    {
        $this->setLifeStyleTag();
    }

    public function setLifeStyleTag(): void
    {
        $this->lifeStyleTags = [
            SolutionConstant::FITNESS_CROSSFIT        => SolutionConstant::TAG_LIST[SolutionConstant::FITNESS_CROSSFIT],
            SolutionConstant::FITNESS_CARDIO_EXERCISE => SolutionConstant::TAG_LIST[SolutionConstant::FITNESS_CARDIO_EXERCISE],
            SolutionConstant::FITNESS_STRENGTH        => SolutionConstant::TAG_LIST[SolutionConstant::FITNESS_STRENGTH],
            SolutionConstant::FITNESS_SPINNING        => SolutionConstant::TAG_LIST[SolutionConstant::FITNESS_SPINNING],
        ];
    }

    public function getLifeStyleTag(): array
    {
        return $this->lifeStyleTags;
    }
}
