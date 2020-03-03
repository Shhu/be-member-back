<?php

namespace Bemember\Subscription\Providers;

use Illuminate\Support\ServiceProvider;

class SubscriptionServiceProvider extends ServiceProvider
{
    public function register(): void
    {
        app()->register(RouteServiceProvider::class);
    }

    protected function gate(): void
    {
    }
}
