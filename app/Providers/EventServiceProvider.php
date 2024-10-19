<?php

namespace App\Providers;

use App\Events\UserSaved;
use App\Listeners\SaveUserAddress;
use Illuminate\Foundation\Support\Providers\EventServiceProvider as ServiceProvider;

class EventServiceProvider extends ServiceProvider
{
    protected $listen = [
        UserSaved::class => [
            SaveUserAddress::class,
        ],
    ];

    public function boot()
    {
        //
    }
}
