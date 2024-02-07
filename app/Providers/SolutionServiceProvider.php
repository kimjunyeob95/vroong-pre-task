<?php

namespace App\Providers;

use App\Http\Controllers\SolutionController;
use Illuminate\Support\ServiceProvider;
use App\Interfaces\SolutionInterface;
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
        $type = Request::post("type", SolutionConstant::SOLUTION_DIET);

        $this->app->when(SolutionController::class)
            ->needs(SolutionInterface::class)
            ->give(function ($app) use ($type) {
                switch (strtoupper($type)) {
                    case SolutionConstant::SOLUTION_DIET:
                        return new DietExpertService();
                        break;
                    case SolutionConstant::SOLUTION_FITNESS:
                        return new FitnessCoachService();
                        break;
                    default:
                        return new DietExpertService();
                        break;
                };
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
