<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;

class SeriesRepositoryProvider extends ServiceProvider
{
    public array $bindings = [
        'App\Repositories\Interfaces\SeriesRepositoryInterface' => 'App\Repositories\EloquentSeriesRepository',
    ];

    /**
     * Register services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap services.
     */
    public function boot(): void
    {
        //
    }
}