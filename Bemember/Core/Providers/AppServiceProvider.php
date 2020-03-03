<?php

namespace Bemember\Core\Providers;

use Illuminate\Support\ServiceProvider;
use Bemember\User\Providers\UserServiceProvider;
use Bemember\Auth\Providers\AuthServiceProvider;
use Bemember\Organization\Providers\OrganizationServiceProvider;
use Bemember\Subscription\Providers\SubscriptionServiceProvider;
use Laravel\Telescope\TelescopeServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    public function register(): void
    {
        if ($this->app->isLocal()) {
            $this->app->register(TelescopeServiceProvider::class);
        }

        $this->app->register(AuthServiceProvider::class);
        $this->app->register(UserServiceProvider::class);
        $this->app->register(OrganizationServiceProvider::class);
        $this->app->register(SubscriptionServiceProvider::class);
    }

    public function boot(): void
    {
        //
    }
}
