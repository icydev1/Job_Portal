<?php

namespace App\Providers;

use App\Events\HireUserEvent;
use App\Events\RegisterUserEvent;
use App\Events\UserPostJob;
use App\Listeners\HireUserListener;
use App\Listeners\RegisterUserListener;
use App\Listeners\UserPostEmail;
use Illuminate\Auth\Events\Registered;
use Illuminate\Auth\Listeners\SendEmailVerificationNotification;
use Illuminate\Foundation\Support\Providers\EventServiceProvider as ServiceProvider;
use Illuminate\Support\Facades\Event;

class EventServiceProvider extends ServiceProvider
{
    /**
     * The event listener mappings for the application.
     *
     * @var array<class-string, array<int, class-string>>
     */
    protected $listen = [
        Registered::class => [
            SendEmailVerificationNotification::class,
        ],

        UserPostJob::class => [
            UserPostEmail::class,
        ],

        RegisterUserEvent::class => [
            RegisterUserListener::class,
        ],

        HireUserEvent::class => [
            HireUserListener::class,
        ]



    ];

    /**
     * Register any events for your application.
     *
     * @return void
     */
    public function boot()
    {
        //
    }
}
