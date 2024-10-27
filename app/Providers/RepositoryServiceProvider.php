<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Repositories\DashboardInterface;
use App\Repositories\DashboardRepository;

class RepositoryServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->bind(DashboardInterface::class,DashboardRepository::class);
    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }
}
