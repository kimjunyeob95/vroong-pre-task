<?php

namespace App\Constants;

class SolutionConstant
{
    public const SOLUTION_DIET               = "DIET";
    public const SOLUTION_FITNESS            = "FITNESS";

    public const DIET_INTERMITTENT_FASTING = "Intermittent Fasting";
    public const DIET_LCHF                 = "LCHF";
    public const FITNESS_CROSSFIT          = "Crossfit";
    public const FITNESS_CARDIO_EXERCISE   = "Cardio Exercise";
    public const FITNESS_STRENGTH          = "Strength";
    public const FITNESS_SPINNING          = "Spinning";

    public const TAG_LIST = [
        self::DIET_INTERMITTENT_FASTING => ["enough_time", "strong_will"],
        self::DIET_LCHF                 => ["enough_money"],
        self::FITNESS_CROSSFIT          => ["enough_money", "strong_will"],
        self::FITNESS_CARDIO_EXERCISE   => ["strong_will"],
        self::FITNESS_STRENGTH          => ["strong_will", "enough_time"],
        self::FITNESS_SPINNING          => ["enough_money"]
    ];
}
