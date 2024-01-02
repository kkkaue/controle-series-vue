<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;

class EpisodesRepositoryProvider extends ServiceProvider
{
    public array $bindings = [
        \App\Repositories\Interfaces\EpisodesRepositoryInterface::class => \App\Repositories\EloquentEpisodesRepository::class,
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
