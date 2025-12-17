<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        $this->app->singleton(
            \App\Contracts\User\LoginUsers::class,
            \App\Actions\User\LoginUser::class
        );

        $this->app->singleton(
            \App\Contracts\Student\StoreStudents::class,
            \App\Actions\Student\StoreStudent::class
        );
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        //
    }
}
