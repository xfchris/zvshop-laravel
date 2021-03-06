<?php

namespace App\Providers;

use App\Events\BanUnbanUserEvent;
use App\Events\LogGeneralEvent;
use App\Events\LogUserActionEvent;
use App\Listeners\LogGeneralListener;
use App\Listeners\LogUserActionListener;
use App\Listeners\SendEmailBanUnbanListener;
use App\Models\Order;
use App\Models\Payment;
use App\Models\Product;
use App\Observers\OrderObserver;
use App\Observers\PaymentObserver;
use App\Observers\ProductObserver;
use Illuminate\Auth\Events\Registered;
use Illuminate\Auth\Listeners\SendEmailVerificationNotification;
use Illuminate\Foundation\Support\Providers\EventServiceProvider as ServiceProvider;

class EventServiceProvider extends ServiceProvider
{
    protected $listen = [
        Registered::class => [
            SendEmailVerificationNotification::class,
        ],
        BanUnbanUserEvent::class => [
            SendEmailBanUnbanListener::class,
        ],
        LogGeneralEvent::class => [
            LogGeneralListener::class,
        ],
        LogUserActionEvent::class => [
            LogUserActionListener::class,
        ],
    ];

    public function boot(): void
    {
        Order::observe(OrderObserver::class);
        Product::observe(ProductObserver::class);
        Payment::observe(PaymentObserver::class);
    }
}
