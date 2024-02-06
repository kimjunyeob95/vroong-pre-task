<?php

namespace App\Services;

use App\Interfaces\SolutionInterface;
use App\Constants\SolutionConstant;
use App\Constants\SolutionErrorMessageConstant;
use Exception;

class FitnessCoachService implements SolutionInterface
{
    private array $lifeStyleTags = SolutionConstant::TAG_LIST[SolutionConstant::SOLUTION_FITNESS];
    private array $returnMsg;

    public function __construct()
    {
        $this->returnMsg = helpers_fail_message();
    }

    public function solutionResult(array $userLifeStyleTags): array
    {
        $returnMsg = $this->returnMsg;

        try {
            $tagRank = ['count' => []];

            # 1. 솔루션 별로 태그 카운트를 정리
            foreach ($userLifeStyleTags as $userLifeStyleTag) {
                foreach ($this->lifeStyleTags as $tagName => $lifeStyleTag) {
                    if (in_array($userLifeStyleTag, $lifeStyleTag)) {
                        if (!isset($tagRank[$tagName])) {
                            $tagRank[$tagName] = [];
                            $tagRank["count"][$tagName] = 0;
                        }
                        if (!in_array($userLifeStyleTag, $tagRank[$tagName])) {
                            $tagRank[$tagName][] = $userLifeStyleTag;
                            $tagRank["count"][$tagName] += 1;
                        }
                    }
                }
            }

            if( count($tagRank["count"]) < 1 ){
                throw new Exception(SolutionErrorMessageConstant::getNotHaveErrorMessage("USERLIFESTYLETAGS"));
            }

            # 2. 솔루션에 속한 태그 가운트 별로 정리 후 반환
            arsort($tagRank['count']); // 내림차순으로 정렬
            $result = [];
            foreach ($tagRank['count'] as $solutionName => $count) {
                $result["recomSolutionRank"][] = $solutionName;
                $result["includeTagCount"][$solutionName] = $count;
            }

            $returnMsg = helpers_success_message($result);
        } catch (Exception $e) {
            $returnMsg = helpers_fail_message(false, $e->getMessage());
        }

        return $returnMsg;
    }
}
