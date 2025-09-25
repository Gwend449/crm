<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Models\Deal;

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
        Deal::creating(function (Deal $deal) {
            if (!$deal->status) {
                $deal->status = 'new';
            }

            if(!$deal->date) {
                $deal->date = now();
            }
        });
    }
}
