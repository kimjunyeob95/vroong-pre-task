<?php

namespace Tests\Unit;

use App\Constants\SolutionConstant;
use App\Services\DietExpertService;
use App\Services\FitnessCoachService;
use Tests\TestCase;

class SolutionTest extends TestCase
{

    /**
     * 솔루션 추천 endPoint Test
     * php artisan test --filter=testSolutionListApi
     * @return void
     */
    public function testSolutionListApi()
    {
        $payload = [
            "type"              => SolutionConstant::SOLUTION_DIET,
            "userLifeStyleTags" => [
                "enough_money",
                "enough_time",
                "strong_will"
            ]
        ];
        $response = $this->post('/api/v1/how-to-lose-weight', $payload);
        $result   = $response->getData();
        
        $this->assertEquals(200, $result->status);
    }

    /**
     * 솔루션 추천 Service Test
     * php artisan test --filter=testSolutionListService
     * @return void
     */
    public function testSolutionListService()
    {
        $payload = [
            "type"              => SolutionConstant::SOLUTION_DIET,
            "userLifeStyleTags" => [
                "enough_money",
                "enough_time",
                "strong_will"
            ]
        ];

        $result = helpers_fail_message();
        if( $payload["type"] == SolutionConstant::SOLUTION_DIET ){
            $result = app(DietExpertService::class)->solutionResult($payload["userLifeStyleTags"]);
        }else if( $payload["type"] == SolutionConstant::SOLUTION_FITNESS ) {
            $result = app(FitnessCoachService::class)->solutionResult($payload["userLifeStyleTags"]);
        }

        $this->assertEquals(true, $result["isSuccess"]);
    }
}
