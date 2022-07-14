<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->singleton(
            \App\Repositories\Grade\GradeRepositoryInterface::class,
            \App\Repositories\Grade\GradeRepository::class,
        );

        $this->app->singleton(
            \App\Repositories\Classroom\ClassroomRepositoryInterface::class,
            \App\Repositories\Classroom\ClassroomRepository::class,
        );
    }


    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }
}
