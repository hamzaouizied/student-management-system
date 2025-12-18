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
            \App\Contracts\User\LogoutUsers::class,
            \App\Actions\User\LogoutUser::class
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


        $this->app->singleton(
            \App\Contracts\Course\StoreCourses::class,
            \App\Actions\Course\StoreCourse::class
        );

        $this->app->singleton(
            \App\Contracts\Course\EditCourses::class,
            \App\Actions\Course\EditCourse::class
        );

        $this->app->singleton(
            \App\Contracts\Course\DeleteCourses::class,
            \App\Actions\Course\DeleteCourse::class
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
