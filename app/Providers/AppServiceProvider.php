<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Events\UserSaved;
use App\Listeners\SaveUserAddress;

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
        //
    }
}
