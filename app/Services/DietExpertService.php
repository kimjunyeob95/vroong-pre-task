<?php

namespace App\Services;

use App\Interfaces\SolutionInterface;
use App\Constants\SolutionConstant;

class DietExpertService implements SolutionInterface
{
    private array $lifeStyleTags;

    public function __construct()
    {
        $this->setLifeStyleTag();
    }

    public function setLifeStyleTag(): void
    {
        $this->lifeStyleTags = [
            SolutionConstant::DIET_INTERMITTENT_FASTING => SolutionConstant::TAG_LIST[SolutionConstant::DIET_INTERMITTENT_FASTING],
            SolutionConstant::DIET_LCHF                 => SolutionConstant::TAG_LIST[SolutionConstant::DIET_LCHF],
        ];
    }

    public function getLifeStyleTag(): array
    {
        return $this->lifeStyleTags;
    }
}
