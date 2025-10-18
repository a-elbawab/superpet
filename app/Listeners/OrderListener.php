<?php

namespace App\Listeners;

use App\Events\OrderEvent;
use App\Models\Admin;
use App\Notifications\NotifyMailNotification;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Support\Facades\Notification;
use App\Models\Order;

class OrderListener
{
    /**
     * Create the event listener.
     */
    public function __construct()
    {
        //
    }

    /**
     * @var OrderEvent $order
     * Handle the event.
     */
    public function handle(OrderEvent $event): void
    {
        //@var Order $order
        $order = $event->order;
        dd(3223);

        Notification::send(Admin::query(), new NotifyMailNotification($order));
    }
}
