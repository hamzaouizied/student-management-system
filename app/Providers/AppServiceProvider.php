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

        $this->app->singleton(
            \App\Contracts\Student\EditStudents::class,
            \App\Actions\Student\EditStudent::class
        );

        $this->app->singleton(
            \App\Contracts\Student\DeleteStudents::class,
            \App\Actions\Student\DeleteStudent::class
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
