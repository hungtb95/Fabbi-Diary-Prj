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
            \App\Repositories\UserRepository\UserRepositoryInterface::class,
            \App\Repositories\UserRepository\UserRepositoryClass::class
        );

        $this->app->singleton(
            \App\Repositories\DiaryRepository\DiaryRepositoryInterface::class,
            \App\Repositories\DiaryRepository\DiaryRepositoryClass::class
        );

        $this->app->singleton(
            \App\Repositories\CommentRepository\CommentRepositoryInterface::class,
            \App\Repositories\CommentRepository\CommentRepositoryClass::class
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
