<?php

namespace App\Providers;

use App\Abstracts\SolutionAdapter;
use Illuminate\Support\ServiceProvider;
use App\Constants\SolutionConstant;
use App\Services\DietExpertService;
use App\Services\FitnessCoachService;
use Illuminate\Support\Facades\Request;

class SolutionServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        $this->app->bind(SolutionAdapter::class, function ($app) {
            $type = Request::post("type", SolutionConstant::SOLUTION_DIET);

            switch (strtoupper($type)) {
                case SolutionConstant::SOLUTION_FITNESS:
                    return new FitnessCoachService();
                case SolutionConstant::SOLUTION_DIET:
                default:
                    return new DietExpertService();
            }
        });
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        //
    }
}
