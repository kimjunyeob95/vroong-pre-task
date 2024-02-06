<?php

namespace App\Providers;

use App\Http\Controllers\SolutionController;
use Illuminate\Support\ServiceProvider;

class SolutionServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        $this->app->when(SolutionController::class)
                //   ->needs(SolutionInterface::class)
                  ->give(function ($app) {
                      // 파라미터에 따라 결정 로직을 추가
                      dd(request());
                    //   if (request()->someCondition) {
                    //       return new FirstService();
                    //   } else {
                    //       return new SecondService();
                    //   }
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
