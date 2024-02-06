<?php

namespace App\Providers;

use App\Http\Controllers\SolutionController;
use Illuminate\Support\ServiceProvider;
use App\Interfaces\SolutionInterface;
use App\Constants\SolutionConstant;
use App\Services\DietExpertService;
use App\Services\FitnessCoachService;
use Illuminate\Support\Facades\Route;

class SolutionServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        $this->app->when(SolutionController::class)
            ->needs(SolutionInterface::class)
            ->give(function ($app) {
                $type = Route::input('type', SolutionConstant::SOLUTION_DIET);
                switch ($type) {
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
