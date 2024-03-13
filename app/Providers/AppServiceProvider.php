<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Models\Bid;
use App\Observers\BidObserver;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        Bid::observe(BidObserver::class);
    }
}
