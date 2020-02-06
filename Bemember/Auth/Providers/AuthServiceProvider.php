<?php

namespace Bemember\Auth\Providers;

use Illuminate\Support\ServiceProvider;

class AuthServiceProvider extends ServiceProvider
{
    public function register(): void
    {
        app()->register(RouteServiceProvider::class);
    }

    protected function gate(): void
    {
    }
}
