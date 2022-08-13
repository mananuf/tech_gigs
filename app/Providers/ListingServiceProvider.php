<?php

namespace App\Providers;

use App\Repositories\Listings\ListingContract;
use App\Repositories\Listings\ListingEloquentRepository;
use Illuminate\Support\ServiceProvider;

class ListingServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        //
        $this->app->bind(ListingContract::class, ListingEloquentRepository::class);
    }
}
