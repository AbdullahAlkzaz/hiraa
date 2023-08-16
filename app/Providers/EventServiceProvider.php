<?php

namespace App\Providers;

use App\Events\SignUpVerificationMailEvent;
use App\Events\UserResetPasswordEvent;
use App\Listeners\SignUpVerificationListener;
use App\Listeners\UserResetPasswordListener;
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
        SignUpVerificationMailEvent::class=>[
            SignUpVerificationListener::class,
        ],
        UserResetPasswordEvent::class=>[
            UserResetPasswordListener::class,
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
