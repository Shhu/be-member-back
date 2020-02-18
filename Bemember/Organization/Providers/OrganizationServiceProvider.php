<?php

namespace Bemember\Organization\Providers;

use Illuminate\Support\ServiceProvider;

class OrganizationServiceProvider extends ServiceProvider
{
    public function register(): void
    {
        app()->register(RouteServiceProvider::class);
    }

    protected function gate(): void
    {
    }
}
