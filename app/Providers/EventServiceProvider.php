<?php

namespace App\Providers;

use App\Events\OrderEvent;
use App\Listeners\OrderListener;
use Illuminate\Foundation\Support\Providers\EventServiceProvider as ServiceProvider;

class EventServiceProvider extends ServiceProvider
{
    /**
     * The event listener mappings for the application.
     *
     * @var array
     */
    protected $listen = [
        \Illuminate\Auth\Events\Registered::class => [
            \Illuminate\Auth\Listeners\SendEmailVerificationNotification::class,
        ],
        \App\Events\FeedbackSent::class => [
            \App\Listeners\SendFeedbackMessage::class,
        ],
        \App\Events\VerificationCreated::class => [
            \App\Listeners\SendVerificationCode::class,

            OrderEvent::class => [
                OrderListener::class,
            ]
        ],
    ];

    /**
     * Register any events for your application.
     *
     * @return void
     */
    public function boot()
    {
        parent::boot();
    }
}
