<?php

namespace Bemember\User\Providers;

use Illuminate\Support\ServiceProvider;

class UserServiceProvider extends ServiceProvider
{
    public function register(): void
    {
        app()->register(RouteServiceProvider::class);
    }

    protected function gate(): void
    {
    }
}
