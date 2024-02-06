<?php

namespace App\Abstracts;

use App\Interfaces\SolutionInterface;
use Exception;

abstract class SolutionAbstract implements SolutionInterface
{
    protected array $returnMsg;

    public function setLifeStyleTag(): array
    {
        return ["test"];
    }

}
